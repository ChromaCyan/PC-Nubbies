<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerAuthController;
use Inertia\Inertia;

//buyer route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

//end

//seller route

Route::group(['prefix' => 'seller', 'middleware' => 'redirectSeller'], function (){
    route::get('login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    route::post('login', [SellerAuthController::class, 'login'])->name('seller.login.post');
    route::post('logout', [SellerAuthController::class, 'logout'])->name('sellerSeller.logouSelleSeller');

});

Route::middleware(['auth', 'seller'])->prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
});

//end


//admin route
Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function (){
    route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Product Routes
    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
});

//end
