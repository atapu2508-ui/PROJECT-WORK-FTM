<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('phone_number', 20);
            $table->string('code', 10);                 // 6 digit OTP (string biar leading zero aman)
            $table->enum('purpose', ['registration', 'password_reset', 'phone_verification'])
                  ->default('registration');
            $table->unsignedSmallInteger('attempts')->default(0);    // berapa kali user salah input
            $table->unsignedSmallInteger('resend_count')->default(0); // total kali resend
            $table->timestamp('expires_at');
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('last_sent_at')->nullable(); // untuk hitung cooldown
            $table->timestamps();

            $table->index(['customer_id', 'purpose']);
            $table->index('phone_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_verifications');
    }
};
