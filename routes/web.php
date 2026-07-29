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
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| GUEST
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
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');

    Route::resource('/admin/books', BookController::class)
        ->names([
            'index'   => 'admin.books.index',
            'create'  => 'books.create',
            'store'   => 'books.store',
            'show'    => 'books.show',
            'edit'    => 'books.edit',
            'update'  => 'books.update',
            'destroy' => 'books.destroy',
        ]);

    Route::resource('/users', UserController::class);

});


/*
|--------------------------------------------------------------------------
| CUSTOMER - BOOKS
|--------------------------------------------------------------------------
*/

Route::get('/books', [BookController::class, 'customerIndex'])
    ->name('books.customer');

Route::get('/books/{book}', [BookController::class, 'customerShow'])
    ->name('books.customer.show');


/*
|--------------------------------------------------------------------------
| CUSTOMER - CART & ORDER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // CART

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/{book}', [CartController::class, 'store'])
        ->name('cart.store');

    Route::patch('/cart/{cart}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])
        ->name('cart.destroy');


    // CHECKOUT

    Route::get('/checkout', [OrderController::class, 'checkout'])
        ->name('checkout');

    Route::post('/checkout', [OrderController::class, 'store'])
        ->name('checkout.store');


    // RIWAYAT PESANAN

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

});