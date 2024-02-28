<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\User\ApiCartController;
use App\Http\Controllers\Api\User\ApiProductListController;

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

//Authentication
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::get('/user', [ApiAuthController::class, 'userProfile']);

//For cart
Route::post('/cart/{product}', [ApiCartController::class, 'store'])->middleware('auth:api');

//For displaying products
Route::get('/products', [ApiProductListController::class, 'index']);
