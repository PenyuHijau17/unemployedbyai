<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;



Route::get('/', [HomeController::class, 'index'])
    ->name('home');



// Auth Guest

Route::middleware('guest')->group(function () {


    // Register

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);



    // Login

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

});



// Logout

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



// Books

Route::resource('books', BookController::class);



// Cart

Route::middleware('auth')->group(function () {

    Route::resource('cart', CartController::class);

});



// Dashboard Admin

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');