<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use App\Models\LoginHistory;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    Event::listen(Login::class, function ($event) {
        $today = Carbon::today();
        
        // Cek apakah hari ini user sudah login? Kalau belum, catat.
        // (Agar tidak duplikat record jika user login berkali-kali di hari yang sama)
        // Jika kamu ingin menghitung frekuensi login, hapus bagian "!exists"
        
        $logExists = LoginHistory::where('user_id', $event->user->id)
                        ->where('login_date', $today)
                        ->exists();

        if (!$logExists) {
            LoginHistory::create([
                'user_id' => $event->user->id,
                'login_date' => $today
            ]);
        }
    });
}
}
