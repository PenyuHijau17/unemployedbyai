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


// Home

Route::get('/', [HomeController::class, 'index'])
    ->name('welcome');

Route::get('/home', [DashboardController::class, 'home'])
    ->name('home');



// Auth

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);


    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

});



// Logout

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



// Buku

Route::resource('books', BookController::class);



// Cart customer

Route::middleware('auth')->group(function () {

    Route::resource('cart', CartController::class);

});



// Dashboard Admin

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth','role:admin'])
    ->name('admin.dashboard');



// Admin CRUD

Route::resource('users', UserController::class)
    ->middleware(['auth','role:admin']);


Route::resource('categories', CategoryController::class)
    ->middleware(['auth','role:admin']);


Route::resource('orders', AdminOrderController::class)
    ->middleware(['auth','role:admin']);


Route::get('/reports', [ReportController::class, 'index'])
    ->middleware(['auth','role:admin'])
    ->name('reports.index');