<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// 👇 1. PENTING: Panggil file middleware admin di sini
use App\Http\Middleware\AdminMiddleware; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 👇 2. Bagian ini untuk mendaftarkan nama 'admin'
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);

        // Bagian ini settingan Payment kamu yang lama (Tetap dipertahankan)
        $middleware->validateCsrfTokens(except: [
            'payment/callback', 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();