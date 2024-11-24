<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');

Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/users', [AuthController::class, 'index'])->name('users');

Route::inertia('/about', 'About', ['title' => 'About Us'])->name('about');
