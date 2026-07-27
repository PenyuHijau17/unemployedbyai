<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ReportController;
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

Route::middleware('guest')->group(function () {


    Route::get('/register',
        [AuthController::class,'showRegister']
    )->name('register');


    Route::post('/register',
        [AuthController::class,'register']
    );


    Route::get('/login',
        [AuthController::class,'showLogin']
    )->name('login');


    Route::post('/login',
        [AuthController::class,'login']
    );


});



Route::post('/logout',
    [AuthController::class,'logout']
)
->middleware('auth')
->name('logout');




// ==========================
// ADMIN DASHBOARD
// ==========================


Route::get('/admin/dashboard',
    [DashboardController::class,'admin']
)
->middleware(['auth','role:admin'])
->name('admin.dashboard');




// ==========================
// ADMIN CRUD
// ==========================


Route::resource('users', UserController::class)
->middleware(['auth','role:admin']);


Route::resource('categories', CategoryController::class)
->middleware(['auth','role:admin']);


Route::resource('books', BookController::class)
->middleware(['auth','role:admin']);


Route::resource('orders', AdminOrderController::class)
->middleware(['auth','role:admin']);



Route::get('/reports',
    [ReportController::class,'index']
)
->middleware(['auth','role:admin'])
->name('reports.index');




// ==========================
// CUSTOMER BOOK
// ==========================


Route::get('/books-list',
    [HomeController::class,'books']
)
->name('frontend.books');




// ==========================
// CART
// ==========================


Route::get('/cart',
    [CartController::class,'index']
)
->name('cart.index');


Route::post('/cart/add/{book}',
    [CartController::class,'add']
)
->name('cart.add');


Route::delete('/cart/remove/{id}',
    [CartController::class,'remove']
)
->name('cart.remove');




// ==========================
// PAYMENT
// ==========================


Route::get('/payment',
    [PaymentController::class,'index']
)
->name('payment.index');


Route::post('/payment/process',
    [PaymentController::class,'process']
)
->name('payment.process');