<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::get('/users', [AuthController::class, 'index'])->name('users');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store');
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

//Route::inertia('/register', 'Auth/Register')->name('register');
//Route::post('/register', [AuthController::class, 'store'])->name('store');
//Route::inertia('/login', 'Auth/Login')->name('login');
//Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');




Route::inertia('/about', 'About', ['title' => 'About Us'])->name('about');
