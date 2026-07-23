<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// Auth
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


// User CRUD
Route::resource('users', UserController::class);


// Book CRUD
Route::resource('books', BookController::class);