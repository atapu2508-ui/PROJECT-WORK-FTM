<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_follow_ups', function (Blueprint $table) {
            $table->id();
            
            // Foreign Keys
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onDelete('cascade');
            
            $table->foreignId('followed_up_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
            
            // Follow-up Details
            $table->enum('follow_up_type', ['whatsapp', 'call', 'email', 'visit'])
                ->default('whatsapp');
            
            $table->enum('template_used', ['default', 'promotion', 'newclass', 'checkup'])
                ->default('default');
            
            // Message & Notes
            $table->text('message_sent')->nullable();
            $table->longText('notes')->nullable();
            
            // Result Tracking
            $table->enum('result', ['success', 'no_response', 'reopened', 'pending'])
                ->default('pending');
            
            // Timestamps
            $table->timestamp('followed_up_at')->nullable();
            $table->timestamps();
            
            // Indices for faster queries
            $table->index('customer_id');
            $table->index('followed_up_by');
            $table->index('follow_up_type');
            $table->index('result');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_follow_ups');
    }
};
