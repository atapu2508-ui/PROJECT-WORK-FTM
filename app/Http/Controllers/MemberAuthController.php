<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Helpers\WhatsAppHelper;

class MemberAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('member.login');
    }

    public function showRegisterForm(Request $request)
    {
        // Jika user memilih paket sebelum login/daftar
        if ($request->has('package')) {
            session(['after_register_package' => $request->package]);
        }

        return view('member.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|unique:customers,phone_number',
            'password'     => 'required|string|min:6|confirmed',
        ]);

        // Buat akun member
        Customer::create([
            'name'           => strip_tags($request->name),
            'email'          => strtolower(trim($request->email)),
            'phone_number'   => $request->phone_number,
            'password'       => Hash::make($request->password),
            'is_verified'    => false,
            'credit_balance' => 0,
        ]);

        // Jika register karena ingin membeli paket
        if (session('after_register_package')) {
            $package = session('after_register_package');
            session()->forget('after_register_package');

            return redirect()->route('member.login.form')
                ->with('success', 'Pendaftaran berhasil. Silakan login untuk melanjutkan pembayaran.')
                ->with('redirect_after_login', route('guest.checkout.show', [
                    'package' => $package
                ]));
        }

        return redirect()->route('member.login.form')
            ->with('success', 'Pendaftaran berhasil. Silakan menunggu verifikasi admin.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Bisa login pakai email atau no HP
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'phone_number';

        $customer = Customer::where($loginField, $request->login)->first();

        if (!$customer) {
            return back()->withErrors(['login' => 'Akun tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $customer->password)) {
            return back()->withErrors(['login' => 'Email/No HP atau password salah'])->withInput();
        }

        if (!$customer->is_verified) {
            return back()->withErrors(['login' => 'Akun Anda belum diverifikasi admin'])->withInput();
        }

        Auth::guard('customer')->login($customer);
        $request->session()->regenerate();

        // Jika login setelah register untuk checkout
        if ($request->session()->has('redirect_after_login')) {
            $redirect = $request->session()->get('redirect_after_login');
            $request->session()->forget('redirect_after_login');
            return redirect($redirect);
        }

        // Jika wajib ganti password — logout & arahkan ke halaman lupa password
        if ($customer->force_password_change ?? false) {
            Auth::guard('customer')->logout();
            return redirect()->route('member.forgot-password.form')
                ->with('warning', 'Silakan reset password Anda terlebih dahulu melalui form Lupa Password.');
        }

        return redirect()->route('member.dashboard')->with('success', 'Login berhasil.');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil logout.');
    }

    public function profile()
    {
        $customer = Auth::guard('customer')->user();
        $schedules = $customer->schedules;

        return view('member.profile', [
            'customer'  => $customer,
            'credit'    => $customer->credit_balance ?? 0,
            'packages'  => $customer->memberships ?? [],
            'schedules' => $schedules,
        ]);
    }

    public function storeByAdmin(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|unique:customers,phone_number',
        ]);

        $defaultPassword = 'member123!';

        Customer::create([
            'name'         => $request->name,
            'email'        => strtolower(trim($request->email)),
            'phone_number' => $request->phone_number,
            'password'     => Hash::make($defaultPassword),
            'is_verified'  => true,
            'credit_balance' => 0,
        ]);

        return redirect()->back()->with('success', 'Akun member berhasil dibuat. Password default: ' . $defaultPassword);
    }

    /**
     * Tampilkan form Lupa Password (public, tanpa login).
     */
    public function showForgotPasswordForm()
    {
        return view('member.forgot-password');
    }

    /**
     * Proses reset password tanpa perlu login.
     * Verifikasi identitas: email + nomor HP harus cocok di satu akun yang sama.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email',
            'phone_number'          => 'required|string',
            'new_password'          => 'required|string|min:8|confirmed',
        ], [
            'new_password.min'       => 'Password baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $email = strtolower(trim($request->email));
        $phone = preg_replace('/\s+/', '', $request->phone_number);

        $customer = Customer::where('email', $email)
            ->where('phone_number', $phone)
            ->first();

        if (!$customer) {
            return back()
                ->withErrors(['email' => 'Data tidak cocok. Pastikan email dan nomor HP terdaftar pada akun yang sama.'])
                ->withInput($request->only('email', 'phone_number'));
        }

        if (!$customer->is_verified) {
            return back()
                ->withErrors(['email' => 'Akun Anda belum diverifikasi admin. Silakan hubungi admin terlebih dahulu.'])
                ->withInput($request->only('email', 'phone_number'));
        }

        $customer->password = Hash::make($request->new_password);
        if (isset($customer->force_password_change)) {
            $customer->force_password_change = false;
        }
        $customer->save();

        Log::info("[forgotPassword] Password reset berhasil untuk customer ID: {$customer->id}");

        return redirect()->route('member.login.form')
            ->with('success', 'Password berhasil direset. Silakan login menggunakan password baru Anda.');
    }

    public function sendLogin($id)
    {
        Log::info("[sendLogin] Dipanggil untuk ID: $id");

        $customer = Customer::findOrFail($id);
        Log::info("[sendLogin] Customer ditemukan: {$customer->name}");

        $plainPassword = '69kfqymY';
        $customer->password = Hash::make($plainPassword);
        $customer->is_verified = true;
        $customer->save();

        $message = "Assalamu'alaikum, {$customer->name}.\n\n" .
            "Akun Anda telah diaktifkan.\n\n" .
            "🔐 *Login Info:*\n" .
            "📧 Email: {$customer->email}\n" .
            "🔑 Password: {$plainPassword}\n\n" .
            "Silakan login:\n" .
            url('/login');

        try {
            WhatsAppHelper::send($customer->phone_number, $message);
        } catch (\Throwable $e) {
            Log::error("[sendLogin] Gagal mengirim WA: " . $e->getMessage());
        }

        return back()->with('success', 'Akses login dikirim via WhatsApp!');
    }
}
