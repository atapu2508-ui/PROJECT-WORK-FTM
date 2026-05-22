<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Attendance;
use Carbon\Carbon;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * === PRIMARY KEY FIX UNTUK FILAMENT ===
     * Filament WAJIB menggunakan kolom 'id' sebagai primary key.
     * Jika sebelumnya kamu menggunakan 'user_id', ubah tabelnya menjadi:
     *   user_id → id (auto increment)
     */
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'avatar_path',
        'program',
        'quota',
        'password',
        'birth_date',
        'goals',
        'kondisi_khusus',
        'referensi',
        'pengalaman',
        'package_id',
        'is_muslim',
        'voucher_code',
        'is_verified',
        'force_password_change',
        'qr_token',
        'qr_generated_at',
        'qr_active',
        'notify_whatsapp_booking',
        'notify_whatsapp_payment',
        'notify_email_marketing',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'quota' => 'integer',
        'birth_date' => 'date',
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
        'force_password_change' => 'boolean',
        'qr_generated_at' => 'datetime',
        'qr_active' => 'boolean',
        'notify_whatsapp_booking' => 'boolean',
        'notify_whatsapp_payment' => 'boolean',
        'notify_email_marketing'  => 'boolean',
    ];

    /**
     * Accessor: avatar URL (return placeholder kalau tidak ada upload)
     */
    public function getAvatarUrlAttribute(): ?string
    {
        if (!empty($this->avatar_path)) {
            return asset('storage/' . ltrim($this->avatar_path, '/'));
        }
        return null;
    }

    // =====================================================
    // ================      RELASI        =================
    // =====================================================

    /**
     * Relasi Customer -> Package (Belongs To)
     * Customer membeli 1 package
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    /**
     * Relasi Customer -> Schedule (Many to Many)
     */
    public function schedules()
    {
        return $this->belongsToMany(
            Schedule::class,
            'customer_schedules',
            'customer_id',
            'schedule_id'
        )->withTimestamps();
    }

    /**
     * Relasi Customer -> Order (One to Many)
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    /**
     * Relasi Customer -> Transaction (One to Many)
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'id');
    }

    /**
     * Relasi Customer -> Attendance (One to Many)
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'customer_id', 'id');
    }

    // =====================================================
    // ================      ACCESSOR      =================
    // =====================================================

    /**
     * Accessor: Mendapatkan umur customer dari birth_date
     * 
     * Usage: $customer->age
     * 
     * @return int|null
     */
    public function getAgeAttribute(): ?int
    {
        if (!$this->birth_date || !($this->birth_date instanceof Carbon)) {
            return null;
        }
        
        return $this->birth_date->age;
    }

    /**
     * Accessor: Check apakah customer sudah beli package
     * 
     * Usage: $customer->has_package
     * 
     * @return bool
     */
    public function getHasPackageAttribute(): bool
    {
        return !is_null($this->package_id);
    }

    /**
     * Accessor: Check apakah quota masih tersedia
     * 
     * Usage: $customer->has_quota
     * 
     * @return bool
     */
    public function getHasQuotaAttribute(): bool
    {
        return (int)$this->quota > 0;
    }

    // =====================================================
    // ================      SCOPES        =================
    // =====================================================

    /**
     * Scope: Customer yang sudah verified
     * 
     * Usage: Customer::verified()->get()
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope: Customer yang belum verified
     * 
     * Usage: Customer::unverified()->get()
     */
    public function scopeUnverified($query)
    {
        return $query->where('is_verified', false);
    }

    /**
     * Scope: Customer yang masih punya quota
     * 
     * Usage: Customer::hasQuota()->get()
     */
    public function scopeHasQuota($query)
    {
        return $query->where('quota', '>', 0);
    }

    /**
     * Scope: Customer yang quota habis
     * 
     * Usage: Customer::quotaEmpty()->get()
     */
    public function scopeQuotaEmpty($query)
    {
        return $query->where('quota', '<=', 0);
    }

    /**
     * Scope: Customer yang sudah beli package
     * 
     * Usage: Customer::hasPackage()->get()
     */
    public function scopeHasPackage($query)
    {
        return $query->whereNotNull('package_id');
    }

    /**
     * Scope: Customer yang belum beli package
     * 
     * Usage: Customer::noPackage()->get()
     */
    public function scopeNoPackage($query)
    {
        return $query->whereNull('package_id');
    }

    /**
     * Scope: Customer dengan membership tertentu
     * 
     * Usage: Customer::membership('Premium')->get()
     */
    public function scopeMembership($query, string $membership)
    {
        return $query->where('membership', $membership);
    }

    // =====================================================
    // ================      METHODS       =================
    // =====================================================

    /**
     * Check-in customer (decrement quota)
     * 
     * @return bool
     */
    public function checkIn(): bool
    {
        if ($this->quota <= 0) {
            return false;
        }

        $this->decrement('quota');
        return true;
    }

    /**
     * Add quota to customer
     * 
     * @param int $amount
     * @return void
     */
    public function addQuota(int $amount = 1): void
    {
        $this->increment('quota', $amount);
    }

    /**
     * Get formatted phone number untuk WhatsApp
     * 
     * @return string|null
     */
    public function getWhatsAppNumber(): ?string
    {
        if (empty($this->phone_number)) {
            return null;
        }

        // Remove leading 0 and add 62
        return '62' . ltrim($this->phone_number, '0');
    }

    /**
     * Get WhatsApp link
     * 
     * @param string|null $message
     * @return string|null
     */
    public function getWhatsAppLink(?string $message = null): ?string
    {
        $number = $this->getWhatsAppNumber();
        
        if (!$number) {
            return null;
        }

        $url = "https://wa.me/{$number}";
        
        if ($message) {
            $url .= '?text=' . urlencode($message);
        }

        return $url;
    }

    /**
     * Get formatted birth date
     * 
     * @param string $format
     * @return string|null
     */
    public function getFormattedBirthDate(string $format = 'd/m/Y'): ?string
    {
        if (!$this->birth_date || !($this->birth_date instanceof Carbon)) {
            return null;
        }

        return $this->birth_date->format($format);
    }

    /**
     * Get birth date with age
     * 
     * @return string|null
     */
    public function getBirthDateWithAge(): ?string
    {
        if (!$this->birth_date || !($this->birth_date instanceof Carbon)) {
            return null;
        }

        $age = $this->birth_date->age;
        return $this->birth_date->format('d/m/Y') . ' (' . $age . ' tahun)';
    }

    // ==================== QR CODE METHODS ====================

    /**
     * Generate unique QR token untuk customer
     * 
     * @return string
     */
    public function generateQRToken(): string
    {
        // Format: MEMBER_{ID}_{RANDOM_TOKEN}
        $token = 'MEMBER_' . $this->id . '_' . \Str::random(16);
        
        $this->update([
            'qr_token' => $token,
            'qr_generated_at' => now(),
            'qr_active' => true,
        ]);
        
        return $token;
    }

    /**
     * Regenerate QR token (invalidate yang lama)
     * 
     * @return string
     */
    public function regenerateQRToken(): string
    {
        return $this->generateQRToken();
    }

    /**
     * Get QR code data (untuk encode ke QR image)
     * 
     * @return string
     */
    public function getQRData(): string
    {
        return $this->qr_token ?? $this->generateQRToken();
    }

    /**
     * Validate QR token
     * 
     * @param string $token
     * @return bool
     */
    public static function validateQRToken(string $token): bool
    {
        $customer = self::where('qr_token', $token)
            ->where('qr_active', true)
            ->first();
        
        return $customer !== null;
    }

    /**
     * Find customer by QR token
     * 
     * @param string $token
     * @return Customer|null
     */
    public static function findByQRToken(string $token): ?self
    {
        return self::where('qr_token', $token)
            ->where('qr_active', true)
            ->first();
    }

    /**
     * Disable QR token (untuk password reset, etc)
     */
    public function disableQR(): void
    {
        $this->update(['qr_active' => false]);
    }

    /**
     * Enable QR token
     */
    public function enableQR(): void
    {
        if (!$this->qr_token) {
            $this->generateQRToken();
        } else {
            $this->update(['qr_active' => true]);
        }
    }

    /**
     * Check if customer's package is still active
     * 
     * @return bool
     */
    public function isPackageActive(): bool
    {
        // Cek active order dengan status 'active' atau 'paid'
        $activeOrder = $this->orders()
            ->whereIn('status', ['active', 'paid'])
            ->where(function ($query) {
                $query->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->exists();

        return $activeOrder;
    }

    /**
     * Get expiration date dari active order
     * 
     * @return \Carbon\Carbon|null
     */
    public function getPackageExpiredAt(): ?\Carbon\Carbon
    {
        $order = $this->orders()
            ->whereIn('status', ['active', 'paid'])
            ->orderBy('expired_at', 'desc')
            ->first();

        return $order?->expired_at;
    }
}