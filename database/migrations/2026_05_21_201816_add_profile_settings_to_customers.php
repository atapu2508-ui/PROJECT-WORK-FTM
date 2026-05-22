<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'avatar_path')) {
                $table->string('avatar_path')->nullable()->after('phone_number');
            }
            if (!Schema::hasColumn('customers', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable()->after('avatar_path');
            }
            if (!Schema::hasColumn('customers', 'emergency_contact_phone')) {
                $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
            }
            if (!Schema::hasColumn('customers', 'notify_whatsapp_booking')) {
                $table->boolean('notify_whatsapp_booking')->default(true)->after('emergency_contact_phone');
            }
            if (!Schema::hasColumn('customers', 'notify_whatsapp_payment')) {
                $table->boolean('notify_whatsapp_payment')->default(true)->after('notify_whatsapp_booking');
            }
            if (!Schema::hasColumn('customers', 'notify_email_marketing')) {
                $table->boolean('notify_email_marketing')->default(false)->after('notify_whatsapp_payment');
            }
        });

        // Tabel login history (untuk security)
        if (!Schema::hasTable('customer_login_logs')) {
            Schema::create('customer_login_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id');
                $table->string('ip_address', 45)->nullable();
                $table->string('user_agent', 500)->nullable();
                $table->string('device_type', 30)->nullable();
                $table->timestamp('logged_in_at')->useCurrent();

                $table->index('customer_id');
                $table->index('logged_in_at');
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $cols = [
                'avatar_path',
                'emergency_contact_name',
                'emergency_contact_phone',
                'notify_whatsapp_booking',
                'notify_whatsapp_payment',
                'notify_email_marketing',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('customers', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
        Schema::dropIfExists('customer_login_logs');
    }
};
