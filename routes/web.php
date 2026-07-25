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

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [DashboardController::class, 'home'])->name('home');

// Auth (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout (hanya untuk user login)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

// User CRUD
Route::resource('users', UserController::class)->middleware(['auth','role:admin']);

// Categories CRUD
Route::resource('categories', CategoryController::class)->middleware(['auth','role:admin']);

// Book CRUD
Route::resource('books', BookController::class);

// Orders CRUD (Admin)
Route::resource('orders', AdminOrderController::class)->middleware(['auth','role:admin']);

// Reports
Route::get('/reports', [ReportController::class, 'index'])
    ->middleware(['auth','role:admin'])
    ->name('reports.index');

// Halaman buku untuk frontend
Route::get('/books', [HomeController::class, 'books'])->name('books.index');
