<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\User\ApiCartController;
use App\Http\Controllers\Api\User\ApiProductListController;
use App\Http\Controllers\Api\User\ApiCheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Authentication (register/login/logout/check user profile)
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::get('/user', [ApiAuthController::class, 'userProfile']);

//For cart (add product to cart/Check all the cart items)
Route::post('/cart/{product}', [ApiCartController::class, 'store'])->middleware('auth:api');
Route::get('/cart', [ApiCartController::class, 'getCartItems'])->middleware('auth:api');


//For displaying products as well as filtering products
Route::get('/products', [ApiProductListController::class, 'index']);

//Checkout (Hope this fucking works for the 5th time)
Route::post('/checkout', [ApiCheckoutController::class, 'store'])->middleware('auth:api');
Route::get('/checkout/success', [ApiCheckoutController::class, 'success'])->middleware('auth:api');