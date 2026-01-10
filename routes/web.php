<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home.home');
})->middleware('auth')->name('home');


Route::get('/hangeul', function () {
    return view('hangeul');
})->middleware(['auth'])->name('hangeul');

Route::get('/lessons', function () {
    return view('lessons');
})->middleware(['auth'])->name('lessons');

Route::get('/quizzes', function () {
    return view('quizzes');
})->middleware(['auth'])->name('quizzes');

Route::get('/progress', function () {
    return view('progress');
})->middleware(['auth'])->name('progress');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
