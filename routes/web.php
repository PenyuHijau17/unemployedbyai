
<?php

Route::get('/tes', function () {
    return 'TES BERHASIL';
});

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
use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\CheckoutController;



// ==========================
// HOME
// ==========================

Route::get('/', [HomeController::class,'index'])
    ->name('home');



// ==========================
// AUTH
// ==========================

Route::middleware('guest')->group(function(){

    Route::get('/register', [AuthController::class,'showRegister'])->name('register');
    Route::post('/register', [AuthController::class,'register']);

    Route::get('/login', [AuthController::class,'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login']);
});

Route::post('/logout', [AuthController::class,'logout'])
    ->middleware('auth')
    ->name('logout');



// ==========================
// ADMIN
// ==========================

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [DashboardController::class,'admin'])
        ->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);

// Tambahkan ini
    

   Route::resource('books', BookController::class);
    Route::resource('orders', AdminOrderController::class);

    // route khusus update status pesanan
    Route::put('/orders/{order}/status', [AdminOrderController::class,'updateStatus'])
        ->name('orders.updateStatus');

    Route::get('/reports', [ReportController::class,'index'])
        ->name('reports.index');
});



// ==========================
// CUSTOMER BOOK
// ==========================

Route::get('/books-list', [BookController::class,'customerIndex'])
    ->name('books.customer');

Route::get('/books-list/{book}', [BookController::class,'customerShow'])
    ->name('books.customer.show');



// ==========================
// CART
// ==========================

Route::get('/cart', [CartController::class,'index'])
    ->name('cart.index');

Route::post('/cart/add/{book}', [CartController::class,'add'])
    ->name('cart.add');

Route::delete('/cart/remove/{id}', [CartController::class,'remove'])
    ->name('cart.remove');



// ==========================
// PAYMENT
// ==========================

Route::get('/payment', [PaymentController::class,'index'])
    ->name('payment.index');

Route::post('/payment/process', [PaymentController::class,'process'])
    ->name('payment.process');

// ==========================
// AKUN
// ==========================

Route::middleware('auth')->group(function () {

    Route::get('/account', [AccountController::class, 'index'])
        ->name('customer.account');

    
    Route::get('/address', [AddressController::class, 'index'])
        ->name('customer.address');


    Route::put('/address/{address}/primary',
    [AddressController::class,'setPrimary']
    )
    ->name('customer.address.primary');

    Route::middleware('auth')->group(function(){

    Route::get('/account/edit',
        [AccountController::class,'edit']
    )->name('customer.account.edit');


    Route::put('/account/update',
        [AccountController::class,'update']
    )->name('customer.account.update');

});
});


// ==========================
// checkout
// ==========================


Route::get('/checkout',
    [CheckoutController::class,'index']
)
->middleware('auth')
->name('checkout.index');

Route::middleware('auth')->group(function () {

    Route::get('/alamat',
        [AddressController::class, 'index']
    )->name('customer.address.index');


    Route::get('/alamat/tambah',
        [AddressController::class, 'create']
    )->name('customer.address.create');


    Route::post('/alamat',
        [AddressController::class, 'store']
    )->name('customer.address.store');


    Route::put('/alamat/{address}/utama',
        [AddressController::class, 'setPrimary']
    )->name('customer.address.setPrimary');


    Route::delete('/alamat/{address}',
        [AddressController::class, 'destroy']
    )->name('customer.address.destroy');

});

Route::middleware('auth')->group(function () {

    Route::get('/pesanan',
        [OrderController::class,'index']
    )->name('customer.orders.index');


    Route::get('/pesanan/{order}',
        [OrderController::class,'show']
    )->name('customer.orders.show');

});