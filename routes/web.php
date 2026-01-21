<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// --- HALAMAN PUBLIK ---
Route::get('/', function () {
    return view('welcome');
});

// --- HALAMAN VERIFIKASI EMAIL (Hanya butuh Login, TIDAK butuh Verified) ---
Route::middleware('auth')->group(function () {
    
    // 1. Tampilkan Halaman "Silakan Cek Email"
    Route::get('/email/verify', function () {
        return view('auth.verify-email'); 
    })->name('verification.notice');

    // 2. Proses saat Link di Email diklik (Handler)
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); // Tandai user sudah verifikasi
        return redirect('/home'); // Lempar ke dashboard
    })->middleware('signed')->name('verification.verify');

    // 3. Tombol "Kirim Ulang Email"
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi baru telah dikirim!');
    })->middleware('throttle:6,1')->name('verification.send');
});


// --- HALAMAN UTAMA (Wajib Login DAN Wajib Verified) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Dashboard / Home
    // Saya pilih yang pakai Controller karena lebih rapi & logic ada di sana
    Route::get('/home', [ProgressController::class, 'home'])->name('home');

    // 2. Materi Hangeul
    Route::get('/hangeul', function () {
        return view('hangeul.hangeul');
    })->name('hangeul');

    // 3. Lessons
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');

    // 4. Quizzes
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::post('/quizzes/{id}/submit', [QuizController::class, 'store'])->name('quizzes.store');

    // 5. Progress
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');

    // 6. Payment (Premium)
    Route::get('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/success/{payment}', [PaymentController::class, 'success'])->name('payment.success');
    
    // 7. Profile & Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // 8. Halaman Tambahan Profile
    Route::get('/profile/about', [ProfileController::class, 'about'])->name('profile.about');
    Route::get('/profile/help', [ProfileController::class, 'help'])->name('profile.help');
});

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// --- PAYMENT CALLBACK (Tanpa Auth) ---
Route::post('/payment/callback', [PaymentController::class, 'callback']);

require __DIR__.'/auth.php';