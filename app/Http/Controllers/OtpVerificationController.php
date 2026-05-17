<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OtpVerification;
use App\Services\WhatsAppService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class OtpVerificationController extends Controller
{
    /**
     * Tampilkan halaman input OTP.
     * Customer ID disimpan di session setelah signup.
     */
    public function show(Request $request): View|RedirectResponse
    {
        $customerId = $request->session()->get('otp_customer_id');

        if (!$customerId) {
            return redirect()->route('home')
                ->with('error', 'Sesi verifikasi tidak ditemukan. Silakan daftar kembali.');
        }

        $customer = Customer::find($customerId);
        if (!$customer) {
            $request->session()->forget('otp_customer_id');
            return redirect()->route('home')
                ->with('error', 'Akun tidak ditemukan. Silakan daftar kembali.');
        }

        // Kalau sudah verified, langsung redirect ke login
        if ($customer->is_verified) {
            $request->session()->forget('otp_customer_id');
            return redirect()->route('member.login.form')
                ->with('success', 'Akun Anda sudah aktif. Silakan login.');
        }

        $otp = OtpVerification::where('customer_id', $customer->id)
            ->where('purpose', 'registration')
            ->latest()
            ->first();

        return view('member.verify-otp', [
            'customer'         => $customer,
            'maskedPhone'      => $this->maskPhoneNumber($customer->phone_number),
            'cooldownSeconds'  => $otp ? $otp->secondsUntilResend() : 0,
            'expiresAt'        => $otp?->expires_at,
            'codeLength'       => OtpVerification::CODE_LENGTH,
        ]);
    }

    /**
     * Verifikasi kode OTP yang diinput user.
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|size:' . OtpVerification::CODE_LENGTH,
        ], [
            'code.size' => 'Kode OTP harus ' . OtpVerification::CODE_LENGTH . ' digit.',
        ]);

        $customerId = $request->session()->get('otp_customer_id');
        if (!$customerId) {
            return redirect()->route('home')
                ->with('error', 'Sesi verifikasi tidak ditemukan.');
        }

        $otp = OtpVerification::where('customer_id', $customerId)
            ->where('purpose', 'registration')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$otp) {
            return back()->withErrors([
                'code' => 'Kode OTP tidak ditemukan. Silakan minta kirim ulang.',
            ]);
        }

        if ($otp->isExpired()) {
            return back()->withErrors([
                'code' => 'Kode OTP sudah kedaluwarsa. Silakan minta kirim ulang.',
            ]);
        }

        if ($otp->isMaxedOut()) {
            return back()->withErrors([
                'code' => 'Anda telah salah memasukkan kode terlalu banyak kali. Silakan minta OTP baru.',
            ]);
        }

        if (!hash_equals($otp->code, $request->code)) {
            $otp->increment('attempts');
            $remaining = OtpVerification::MAX_ATTEMPTS - $otp->attempts;

            return back()->withErrors([
                'code' => $remaining > 0
                    ? "Kode OTP salah. Sisa percobaan: {$remaining}."
                    : 'Anda telah salah memasukkan kode terlalu banyak kali. Silakan minta OTP baru.',
            ]);
        }

        // Sukses — tandai OTP terverifikasi dan aktifkan akun customer
        $otp->update(['verified_at' => now()]);

        $customer = Customer::find($customerId);
        $customer->is_verified = true;
        $customer->save();

        Log::info("[OTP] Customer ID {$customer->id} verified successfully via OTP");

        $request->session()->forget('otp_customer_id');

        return redirect()->route('member.login.form', [
                'welcome' => 1,
                'name'    => $customer->name,
                'email'   => $customer->email,
            ])
            ->with('success', 'Verifikasi berhasil! Akun Anda sudah aktif. Silakan login.')
            ->with('otp_just_verified', true)
            ->with('verified_name', $customer->name)
            ->with('verified_email', $customer->email);
    }

    /**
     * Kirim ulang OTP (dengan cooldown).
     */
    public function resend(Request $request): RedirectResponse
    {
        $customerId = $request->session()->get('otp_customer_id');
        if (!$customerId) {
            return redirect()->route('home')
                ->with('error', 'Sesi verifikasi tidak ditemukan.');
        }

        $customer = Customer::find($customerId);
        if (!$customer) {
            return redirect()->route('home')
                ->with('error', 'Akun tidak ditemukan.');
        }

        $otp = OtpVerification::where('customer_id', $customer->id)
            ->where('purpose', 'registration')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        // Cek cooldown
        if ($otp && !$otp->canResend()) {
            $wait = $otp->secondsUntilResend();
            return back()->withErrors([
                'code' => "Mohon tunggu {$wait} detik sebelum minta kirim ulang.",
            ]);
        }

        // Generate OTP baru (overwrite kode lama, reset attempts)
        $code = OtpVerification::generateCode();

        if ($otp) {
            $otp->update([
                'code'         => $code,
                'attempts'     => 0,
                'expires_at'   => now()->addMinutes(OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
                'resend_count' => $otp->resend_count + 1,
            ]);
        } else {
            $otp = OtpVerification::create([
                'customer_id'  => $customer->id,
                'phone_number' => $customer->phone_number,
                'code'         => $code,
                'purpose'      => 'registration',
                'expires_at'   => now()->addMinutes(OtpVerification::VALIDITY_MINUTES),
                'last_sent_at' => now(),
            ]);
        }

        $sent = $this->sendOtpViaWhatsApp($customer, $code);

        if (!$sent['success']) {
            return back()->withErrors([
                'code' => 'Gagal mengirim OTP via WhatsApp. ' . ($sent['message'] ?? 'Silakan coba lagi.'),
            ]);
        }

        return back()->with('success', 'Kode OTP baru sudah dikirim ke WhatsApp Anda.');
    }

    /**
     * Kirim OTP via WhatsApp (Fonnte).
     * Public supaya bisa dipanggil dari CustomerSignupController saat first signup.
     */
    public function sendOtpViaWhatsApp(Customer $customer, string $code): array
    {
        $service = app(WhatsAppService::class);

        $message = $this->buildOtpMessage($customer->name, $code);

        $result = $service->send($customer->phone_number, $message);

        Log::info('[OTP] WhatsApp send result', [
            'customer_id' => $customer->id,
            'phone'       => $customer->phone_number,
            'success'     => $result['success'] ?? false,
            'message'     => $result['message'] ?? null,
        ]);

        return $result;
    }

    /**
     * Template pesan OTP.
     */
    private function buildOtpMessage(string $name, string $code): string
    {
        $minutes = OtpVerification::VALIDITY_MINUTES;

        return "Assalamu'alaikum {$name},\n\n"
            . "Kode OTP FTM Society Anda:\n"
            . "*{$code}*\n\n"
            . "Berlaku {$minutes} menit. JANGAN bagikan kode ini kepada siapapun, termasuk admin FTM Society.\n\n"
            . "Jika Anda tidak melakukan pendaftaran, abaikan pesan ini.";
    }

    /**
     * Mask nomor HP untuk ditampilkan: 0812****5678
     */
    private function maskPhoneNumber(string $phone): string
    {
        $len = strlen($phone);
        if ($len <= 8) {
            return $phone;
        }
        $start = substr($phone, 0, 4);
        $end   = substr($phone, -4);
        $mask  = str_repeat('*', max(0, $len - 8));
        return $start . $mask . $end;
    }
}
