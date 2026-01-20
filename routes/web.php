<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home', function () {
    return view('home.home');
})->middleware('auth')->name('home');

Route::get('/hangeul', function () {
    return view('hangeul.hangeul');
})->middleware(['auth'])->name('hangeul');



Route::get('/lessons', function () {
    return view('lessons.lessons');
})->middleware(['auth'])->name('lessons');

Route::get('/quizzes', function () {
    return view('quizzes');
})->middleware(['auth'])->name('quizzes');

Route::get('/progress', function () {
    return view('progress');
})->middleware(['auth'])->name('progress');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home.home');
    })->name('home');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    // LESSONS
    Route::get('/lessons', [LessonController::class, 'index'])
        ->name('lessons.index');

    Route::get('/lessons/{id}', [LessonController::class, 'show'])
        ->name('lessons.show');

    // QUIZZES
    Route::get('/quizzes', [QuizController::class, 'index'])
        ->name('quizzes.index');

    Route::get('/quizzes/{id}', [QuizController::class, 'show'])
        ->name('quizzes.show');

    Route::get('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::post('/payment/callback', [PaymentController::class, 'callback']);
    Route::get('/payment/success/{payment}', [PaymentController::class, 'success'])->name('payment.success');


    // PROGRESS
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress');
});





    
require __DIR__.'/auth.php';
