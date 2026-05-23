<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Filament\Facades\Filament;
use Midtrans\Config;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\CustomerSchedule;
use App\Models\Booking;
use App\Models\Attendance;
use App\Observers\CustomerObserver;
use App\Observers\OrderObserver;
use App\Observers\TransactionObserver;
use App\Observers\CustomerScheduleObserver;
use App\Observers\BookingObserver;
use App\Observers\AttendanceObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

         if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
    
        // Midtrans Configuration
        Config::$serverKey     = config('midtrans.server_key');
        Config::$clientKey     = config('midtrans.client_key');

        // Pastikan boolean, bukan string
        Config::$isProduction  = filter_var(config('midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);

        // Keamanan & 3DS wajib true
        Config::$isSanitized   = true;
        Config::$is3ds         = true;

        // FTM Society — Filament v2 Custom Theme
        Filament::serving(function () {
            Filament::registerStyles([
                asset('css/ftm-filament-v2-theme.css'),
            ]);
        });

        // ─────────────────────────────────────────────
        // Admin Notification Observers
        // ─────────────────────────────────────────────
        Customer::observe(CustomerObserver::class);
        Order::observe(OrderObserver::class);
        Transaction::observe(TransactionObserver::class);
        CustomerSchedule::observe(CustomerScheduleObserver::class);
        Booking::observe(BookingObserver::class);
        Attendance::observe(AttendanceObserver::class);
    }
}