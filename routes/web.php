<?php

use Illuminate\Support\Facades\Route;


// Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;



// ==========================
// HOME
// ==========================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');




// ==========================
// AUTH
// ==========================

Route::get('/register', 
    [AuthController::class, 'showRegister']
)
->name('register');


Route::post('/register',
    [AuthController::class, 'register']
);



Route::get('/login',
    [AuthController::class, 'showLogin']
)
->name('login');


Route::post('/login',
    [AuthController::class, 'login']
);



Route::post('/logout',
    [AuthController::class, 'logout']
)
->name('logout');




// ==========================
// ADMIN DASHBOARD
// ==========================

Route::get('/admin/dashboard',
    [DashboardController::class, 'index']
)
->name('admin.dashboard');




// ==========================
// USER CRUD
// ==========================

Route::resource('users', UserController::class);




// ==========================
// BOOK CRUD
// ==========================

Route::resource('books', BookController::class);




// ==========================
// CART
// ==========================

Route::get('/cart',
    [CartController::class, 'index']
)
->name('cart.index');



Route::post('/cart/add/{book}',
    [CartController::class, 'add']
)
->name('cart.add');



Route::delete('/cart/remove/{id}',
    [CartController::class, 'remove']
)
->name('cart.remove');




// ==========================
// PAYMENT
// ==========================

Route::get('/payment',
    [PaymentController::class, 'index']
)
->name('payment.index');



Route::post('/payment/process',
    [PaymentController::class, 'process']
)
->name('payment.process');