<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtpVerification extends Model
{
    protected $fillable = [
        'customer_id',
        'phone_number',
        'code',
        'purpose',
        'attempts',
        'resend_count',
        'expires_at',
        'verified_at',
        'last_sent_at',
    ];

    protected $casts = [
        'expires_at'   => 'datetime',
        'verified_at'  => 'datetime',
        'last_sent_at' => 'datetime',
        'attempts'     => 'integer',
        'resend_count' => 'integer',
    ];

    /* ===========================================================
     | Konstanta — sumber kebenaran kebijakan OTP
     |=========================================================== */
    public const VALIDITY_MINUTES   = 5;   // OTP valid 5 menit
    public const RESEND_COOLDOWN    = 60;  // detik antar kirim ulang
    public const MAX_ATTEMPTS       = 5;   // max salah input sebelum hangus
    public const CODE_LENGTH        = 6;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /* ===========================================================
     | Status helpers
     |=========================================================== */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isVerified(): bool
    {
        return $this->verified_at !== null;
    }

    public function isMaxedOut(): bool
    {
        return $this->attempts >= self::MAX_ATTEMPTS;
    }

    public function canResend(): bool
    {
        if (!$this->last_sent_at) {
            return true;
        }
        return $this->last_sent_at->diffInSeconds(now()) >= self::RESEND_COOLDOWN;
    }

    public function secondsUntilResend(): int
    {
        if ($this->canResend()) {
            return 0;
        }
        $diff = self::RESEND_COOLDOWN - $this->last_sent_at->diffInSeconds(now());
        return max(0, $diff);
    }

    /* ===========================================================
     | Generator
     |=========================================================== */
    public static function generateCode(): string
    {
        return str_pad((string) random_int(0, 999999), self::CODE_LENGTH, '0', STR_PAD_LEFT);
    }
}
