<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController; 
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- HALAMAN PUBLIK ---
Route::get('/', function () {
    return view('welcome');
});

// --- HALAMAN UTAMA (Hanya Wajib Login) ---
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard / Home User
    Route::get('/home', [ProgressController::class, 'home'])->name('home');

    // 2. Materi Hangeul
    Route::get('/hangeul', function () {
        return view('hangeul.hangeul');
    })->name('hangeul');

    // 3. Lessons (Materi Pembelajaran)
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');

    // 4. Quizzes (User Mengerjakan Kuis)
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

// --- ADMIN ROUTES (FULL VERSION) ---
// Semua route di sini otomatis punya prefix 'admin' dan nama 'admin.'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Dashboard Admin
    Route::get('/home', [AdminController::class, 'index'])->name('home'); 

    // 2. Kelola User
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{id}', [AdminController::class, 'show'])->name('users.show');
    Route::patch('/users/{id}/premium', [AdminController::class, 'togglePremium'])->name('users.premium');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');

    // 3. Kelola Materi (Lessons)
    Route::get('/lessons', [AdminController::class, 'lessons'])->name('lessons');
    Route::get('/lessons/create', [AdminController::class, 'createLesson'])->name('lessons.create');
    Route::post('/lessons', [AdminController::class, 'storeLesson'])->name('lessons.store');

    // 4. Kelola Vocabulary
    Route::get('/lessons/{id}/vocabularies', [AdminController::class, 'vocabularies'])->name('lessons.vocabularies');
    Route::post('/lessons/{id}/vocabularies', [AdminController::class, 'storeVocabulary'])->name('lessons.vocabularies.store');
    Route::delete('/vocabularies/{id}', [AdminController::class, 'deleteVocabulary'])->name('vocabularies.delete');

    // ==========================================
    // 5. BANK SOAL (QUIZZES) - SUDAH DIPERBAIKI
    // ==========================================
    
    // Halaman daftar materi (Bank Soal)
    Route::get('/quizzes', [AdminController::class, 'quizzes'])->name('quizzes');
    
    // Halaman kelola soal per materi (INI YANG TADI ERROR / MISSING)
    Route::get('/quizzes/{id}/manage', [AdminController::class, 'manageQuiz'])->name('quizzes.manage');

    // Proses simpan soal baru
    Route::post('/quizzes/{id}/store', [AdminController::class, 'storeQuestion'])->name('quizzes.store_question');

    // Proses hapus soal
    Route::delete('/questions/{id}', [AdminController::class, 'deleteQuestion'])->name('questions.delete');


    // 6. Keuangan
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
});

// --- PAYMENT CALLBACK (Tanpa Auth) ---
Route::post('/payment/callback', [PaymentController::class, 'callback']);

require __DIR__.'/auth.php';