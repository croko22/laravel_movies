<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('home');
    Route::resource('movies', MovieController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', [AuthController::class, 'login'])->name('register');
});
