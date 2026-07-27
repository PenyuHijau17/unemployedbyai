<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;


// ==========================
// Home
// ==========================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================
// Guest (Register & Login)
// ==========================

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);


    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

});


// ==========================
// Logout
// ==========================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==========================
// Books CRUD
// ==========================

Route::resource('books', BookController::class);


// ==========================
// Cart
// ==========================

Route::middleware('auth')->group(function () {


    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');


    Route::post('/cart', [CartController::class, 'store'])
        ->name('cart.store');


    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])
        ->name('cart.destroy');



    // ==========================
    // Payment
    // ==========================

    Route::get('/payment', [PaymentController::class, 'index'])
        ->name('payment.index');


    Route::post('/payment', [PaymentController::class, 'store'])
        ->name('payment.store');

});


// ==========================
// Admin
// ==========================

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');