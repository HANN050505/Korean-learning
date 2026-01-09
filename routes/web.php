<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/hangeul', function () {
    return view('dashboard.hangeul');
});

Route::get('/lessons', function () {
    return view('dashboard.lessons');
});

Route::get('/quizzes', function () {
    return view('dashboard.quizzes');
});

Route::get('/progress', function () {
    return view('dashboard.progress');
});

Route::get('/profile', function () {
    return view('dashboard.profile');
});
