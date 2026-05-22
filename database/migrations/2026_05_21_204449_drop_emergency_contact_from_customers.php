<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'emergency_contact_name')) {
                $table->dropColumn('emergency_contact_name');
            }
            if (Schema::hasColumn('customers', 'emergency_contact_phone')) {
                $table->dropColumn('emergency_contact_phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable()->after('avatar_path');
            }
            if (!Schema::hasColumn('customers', 'emergency_contact_phone')) {
                $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
            }
        });
    }
};
