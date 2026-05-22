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

        // Record login log (tidak fatal kalau gagal)
        try {
            \App\Models\CustomerLoginLog::create([
                'customer_id'  => $customer->id,
                'ip_address'   => $request->ip(),
                'user_agent'   => substr((string) $request->userAgent(), 0, 500),
                'device_type'  => $this->detectDeviceType($request->userAgent()),
                'logged_in_at' => now(),
            ]);
        } catch (\Throwable $e) {
            \Log::warning('[LoginLog] '.$e->getMessage());
        }

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
     * STEP 1: User input email + nomor HP → kita verifikasi & kirim OTP via WhatsApp.
     */
    public function showForgotPasswordForm()
    {
        return view('member.forgot-password');
    }

    /**
     * STEP 1 SUBMIT: Verifikasi identitas (email + phone harus cocok),
     * generate OTP 6 digit, kirim via Fonnte WhatsApp.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email'        => 'required|email',
            'phone_number' => 'required|string',
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

        // Cek cooldown — apakah baru saja kirim OTP?
        $latestOtp = \App\Models\OtpVerification::where('customer_id', $customer->id)
            ->where('purpose', 'password_reset')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if ($latestOtp && !$latestOtp->canResend()) {
            return back()
                ->withErrors([
                    'email' => 'OTP baru saja dikirim. Mohon tunggu '
                        . $latestOtp->secondsUntilResend() . ' detik sebelum mencoba lagi.'
                ])
                ->withInput($request->only('email', 'phone_number'));
        }

        // Generate OTP
        $code = \App\Models\OtpVerification::generateCode();

        if ($latestOtp) {
            // Reuse existing record (reset attempts)
            $latestOtp->update([
                'code'         => $code,
                'attempts'     => 0,
                'expires_at'   => now()->addMinutes(\App\Models\OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
                'resend_count' => $latestOtp->resend_count + 1,
            ]);
            $otp = $latestOtp;
        } else {
            $otp = \App\Models\OtpVerification::create([
                'customer_id'  => $customer->id,
                'phone_number' => $customer->phone_number,
                'code'         => $code,
                'purpose'      => 'password_reset',
                'expires_at'   => now()->addMinutes(\App\Models\OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
            ]);
        }

        // Kirim OTP via Fonnte
        $message = $this->buildPasswordResetOtpMessage($customer->name, $code);

        try {
            $waService = app(\App\Services\WhatsAppService::class);
            $result = $waService->send($customer->phone_number, $message);

            if (!($result['success'] ?? false)) {
                Log::warning('[forgotPassword] Gagal kirim OTP', [
                    'customer_id' => $customer->id,
                    'result'      => $result,
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('[forgotPassword] WhatsApp error: ' . $e->getMessage());
        }

        // Simpan customer_id ke session untuk step verifikasi & reset
        session([
            'reset_password_customer_id' => $customer->id,
        ]);

        return redirect()->route('member.forgot-password.otp.form')
            ->with('success', 'Kode OTP telah dikirim ke WhatsApp di nomor ' . $this->maskPhone($customer->phone_number) . '. Berlaku 5 menit.');
    }

    /**
     * STEP 2: Tampilkan form input OTP untuk reset password.
     */
    public function showResetPasswordOtpForm()
    {
        $customerId = session('reset_password_customer_id');

        if (!$customerId) {
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Sesi reset password telah berakhir. Silakan mulai dari awal.']);
        }

        $customer = Customer::find($customerId);
        if (!$customer) {
            session()->forget('reset_password_customer_id');
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Data tidak ditemukan. Silakan coba lagi.']);
        }

        $otp = \App\Models\OtpVerification::where('customer_id', $customer->id)
            ->where('purpose', 'password_reset')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        return view('member.forgot-password-otp', [
            'customer'        => $customer,
            'phoneMasked'     => $this->maskPhone($customer->phone_number),
            'cooldownSeconds' => $otp ? $otp->secondsUntilResend() : 0,
            'expiresAt'       => $otp?->expires_at,
            'codeLength'      => \App\Models\OtpVerification::CODE_LENGTH,
        ]);
    }

    /**
     * STEP 2 SUBMIT: Verifikasi kode OTP. Jika valid → tandai verified & arahkan ke form password baru.
     */
    public function verifyResetPasswordOtp(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:' . \App\Models\OtpVerification::CODE_LENGTH,
        ], [
            'code.size' => 'Kode OTP harus ' . \App\Models\OtpVerification::CODE_LENGTH . ' digit.',
        ]);

        $customerId = session('reset_password_customer_id');
        if (!$customerId) {
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Sesi reset password telah berakhir. Silakan mulai dari awal.']);
        }

        $otp = \App\Models\OtpVerification::where('customer_id', $customerId)
            ->where('purpose', 'password_reset')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$otp) {
            return back()->withErrors(['code' => 'Tidak ada OTP aktif. Silakan minta OTP baru.']);
        }

        if ($otp->isExpired()) {
            return back()->withErrors(['code' => 'OTP sudah kadaluarsa. Silakan minta OTP baru.']);
        }

        if ($otp->isMaxedOut()) {
            return back()->withErrors([
                'code' => 'Kode OTP salah terlalu banyak kali. Silakan minta OTP baru.',
            ]);
        }

        if (!hash_equals($otp->code, $request->code)) {
            $otp->increment('attempts');
            $remaining = \App\Models\OtpVerification::MAX_ATTEMPTS - $otp->attempts;

            return back()->withErrors([
                'code' => $remaining > 0
                    ? "Kode OTP salah. Sisa percobaan: {$remaining}."
                    : 'Kode OTP salah. Silakan minta OTP baru.',
            ]);
        }

        // OTP valid → tandai verified
        $otp->update(['verified_at' => now()]);

        // Tandai session bahwa OTP sudah lulus → boleh akses form password baru
        session(['reset_password_otp_verified' => true]);

        return redirect()->route('member.forgot-password.reset.form')
            ->with('success', 'Verifikasi berhasil. Silakan buat password baru Anda.');
    }

    /**
     * STEP 2 RESEND: Kirim ulang OTP (rate-limited).
     */
    public function resendResetPasswordOtp(Request $request)
    {
        $customerId = session('reset_password_customer_id');
        if (!$customerId) {
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Sesi reset password telah berakhir.']);
        }

        $customer = Customer::find($customerId);
        if (!$customer) {
            return redirect()->route('member.forgot-password.form');
        }

        $otp = \App\Models\OtpVerification::where('customer_id', $customer->id)
            ->where('purpose', 'password_reset')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if ($otp && !$otp->canResend()) {
            return back()->withErrors([
                'code' => 'Mohon tunggu ' . $otp->secondsUntilResend() . ' detik sebelum kirim ulang.',
            ]);
        }

        $code = \App\Models\OtpVerification::generateCode();

        if ($otp) {
            $otp->update([
                'code'         => $code,
                'attempts'     => 0,
                'expires_at'   => now()->addMinutes(\App\Models\OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
                'resend_count' => $otp->resend_count + 1,
            ]);
        } else {
            $otp = \App\Models\OtpVerification::create([
                'customer_id'  => $customer->id,
                'phone_number' => $customer->phone_number,
                'code'         => $code,
                'purpose'      => 'password_reset',
                'expires_at'   => now()->addMinutes(\App\Models\OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
            ]);
        }

        $message = $this->buildPasswordResetOtpMessage($customer->name, $code);

        try {
            $waService = app(\App\Services\WhatsAppService::class);
            $waService->send($customer->phone_number, $message);
        } catch (\Throwable $e) {
            Log::error('[resendResetPasswordOtp] WhatsApp error: ' . $e->getMessage());
        }

        return back()->with('success', 'Kode OTP baru telah dikirim ke WhatsApp Anda.');
    }

    /**
     * STEP 3: Tampilkan form set password baru (hanya bisa diakses setelah OTP verified).
     */
    public function showResetPasswordForm()
    {
        if (!session('reset_password_otp_verified') || !session('reset_password_customer_id')) {
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Anda harus verifikasi OTP terlebih dahulu.']);
        }

        return view('member.reset-password');
    }

    /**
     * STEP 3 SUBMIT: Set password baru.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.min'       => 'Password baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if (!session('reset_password_otp_verified') || !session('reset_password_customer_id')) {
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Sesi reset password telah berakhir. Silakan mulai dari awal.']);
        }

        $customer = Customer::find(session('reset_password_customer_id'));
        if (!$customer) {
            session()->flush();
            return redirect()->route('member.forgot-password.form')
                ->withErrors(['email' => 'Data tidak ditemukan.']);
        }

        $customer->password = Hash::make($request->new_password);
        if (isset($customer->force_password_change)) {
            $customer->force_password_change = false;
        }
        $customer->save();

        Log::info("[resetPassword] Password reset berhasil untuk customer ID: {$customer->id}");

        // Kirim notifikasi WA bahwa password berhasil diubah
        try {
            $waService = app(\App\Services\WhatsAppService::class);
            $waService->send(
                $customer->phone_number,
                "Halo {$customer->name},\n\n"
                . "Password akun FTM Society Anda baru saja berhasil diubah pada "
                . now()->format('d M Y, H:i') . " WIB.\n\n"
                . "Jika Anda merasa tidak melakukan perubahan ini, segera hubungi admin kami.\n\n"
                . "Terima kasih,\n*FTM Society*"
            );
        } catch (\Throwable $e) {
            Log::warning('[resetPassword] Gagal kirim notifikasi WA: ' . $e->getMessage());
        }

        // Bersihkan session reset
        session()->forget([
            'reset_password_customer_id',
            'reset_password_otp_verified',
        ]);

        return redirect()->route('member.login.form')
            ->with('success', 'Password berhasil direset. Silakan login menggunakan password baru Anda.');
    }

    /**
     * Helper: format pesan OTP untuk WhatsApp.
     */
    private function buildPasswordResetOtpMessage(string $name, string $code): string
    {
        $minutes = \App\Models\OtpVerification::VALIDITY_MINUTES;

        return "Assalamu'alaikum {$name},\n\n"
            . "Kami menerima permintaan reset password untuk akun FTM Society Anda.\n\n"
            . "*Kode OTP Anda:*\n"
            . "*{$code}*\n\n"
            . "Berlaku selama {$minutes} menit. Jangan bagikan kode ini kepada siapa pun, termasuk admin.\n\n"
            . "Jika Anda tidak meminta reset password, abaikan pesan ini dan password Anda tetap aman.\n\n"
            . "Terima kasih,\n*FTM Society*";
    }

    /**
     * Helper: mask nomor HP untuk display.
     * Misal 081234567890 → 0812****7890
     */
    private function maskPhone(string $phone): string
    {
        $clean = preg_replace('/\D/', '', $phone);
        $len = strlen($clean);
        if ($len < 8) return $phone;
        return substr($clean, 0, 4) . str_repeat('*', $len - 8) . substr($clean, -4);
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

    /**
     * Detect device type from User-Agent string (simple heuristic).
     */
    protected function detectDeviceType(?string $ua): string
    {
        if (!$ua) return 'unknown';
        $ua = strtolower($ua);
        if (str_contains($ua, 'mobile') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
            return 'mobile';
        }
        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) {
            return 'tablet';
        }
        return 'desktop';
    }
}
