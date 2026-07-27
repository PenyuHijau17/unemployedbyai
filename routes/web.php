<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class);

/*
|--------------------------------------------------------------------------
| Books
|--------------------------------------------------------------------------
*/

Route::resource('books', BookController::class);

/*
|--------------------------------------------------------------------------
| Cart & Checkout
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/{book}', [CartController::class, 'store'])
        ->name('cart.store');

    Route::patch('/cart/{cart}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])
        ->name('cart.destroy');

    // Checkout
    Route::get('/checkout', [OrderController::class, 'checkout'])
        ->name('checkout');

    Route::post('/checkout', [OrderController::class, 'store'])
        ->name('checkout.store');

    // Riwayat Pesanan
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
});