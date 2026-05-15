<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OtpVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CustomerSignupController extends Controller
{
    public function store(Request $request, OtpVerificationController $otpController)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'phone_number'          => 'required|string|max:20|unique:customers,phone_number',
            'email'                 => 'required|email|unique:customers,email',
            'birth_date'            => 'required|date',
            'password'              => 'required|string|min:8|confirmed',
            'goals'                 => 'nullable|string',
            'kondisi_khusus'        => 'nullable|string',
            'referensi'             => 'nullable|string',
            'pengalaman'            => 'nullable|string',
            'is_muslim'             => 'required|string',
            'voucher'               => 'nullable|string|max:50',
            'agree'                 => 'nullable',
        ], [
            'phone_number.unique'   => 'Nomor HP ini sudah terdaftar.',
            'email.unique'          => 'Email ini sudah terdaftar.',
            'password.min'          => 'Password minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
        ]);

        // Normalisasi
        $validated['is_muslim']     = $validated['is_muslim'] === 'ya';
        $validated['phone_number']  = preg_replace('/\s+/', '', $validated['phone_number']);

        // Data customer
        $customerData = [
            'name'           => $validated['name'],
            'phone_number'   => $validated['phone_number'],
            'email'          => strtolower(trim($validated['email'])),
            'birth_date'     => $validated['birth_date'],
            'password'       => Hash::make($validated['password']),
            'goals'          => $validated['goals'] ?? null,
            'kondisi_khusus' => $validated['kondisi_khusus'] ?? null,
            'referensi'      => $validated['referensi'] ?? null,
            'pengalaman'     => $validated['pengalaman'] ?? null,
            'is_verified'    => false,
        ];

        if (Schema::hasColumn('customers', 'is_muslim')) {
            $customerData['is_muslim'] = $validated['is_muslim'];
        }

        if (Schema::hasColumn('customers', 'voucher_code')) {
            $customerData['voucher_code'] = $validated['voucher'] ?? null;
        }

        $customer = Customer::create($customerData);

        // Generate dan simpan OTP
        $code = OtpVerification::generateCode();

        OtpVerification::create([
            'customer_id'  => $customer->id,
            'phone_number' => $customer->phone_number,
            'code'         => $code,
            'purpose'      => 'registration',
            'expires_at'   => now()->addMinutes(OtpVerification::VALIDITY_MINUTES),
            'last_sent_at' => now(),
        ]);

        // Kirim OTP via WhatsApp
        $sent = $otpController->sendOtpViaWhatsApp($customer, $code);

        // Simpan customer_id ke session untuk halaman verifikasi
        $request->session()->put('otp_customer_id', $customer->id);

        if (!$sent['success']) {
            Log::warning('[Signup] Customer dibuat tapi OTP gagal terkirim', [
                'customer_id' => $customer->id,
                'reason'      => $sent['message'] ?? 'unknown',
            ]);

            return redirect()->route('member.otp.form')
                ->with('warning', 'Akun berhasil dibuat tapi OTP gagal terkirim. Silakan klik "Kirim Ulang" pada halaman verifikasi.');
        }

        return redirect()->route('member.otp.form')
            ->with('success', 'Kode OTP telah dikirim ke nomor WhatsApp Anda.');
    }
}
