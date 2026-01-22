<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;

// --- HALAMAN PUBLIK ---
Route::get('/', function () {
    return view('welcome');
});

// --- HALAMAN UTAMA (Hanya Wajib Login) ---
// Note: 'verified' sudah dihapus, jadi user baru daftar bisa langsung masuk sini.
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard / Home
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
    Route::get('/admin/home', function () {
        return view('admin.home');
    })->name('admin.home');
});

// --- PAYMENT CALLBACK (Tanpa Auth - Biar Midtrans bisa akses) ---
Route::post('/payment/callback', [PaymentController::class, 'callback']);

require __DIR__.'/auth.php';