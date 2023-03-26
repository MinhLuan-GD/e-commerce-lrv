<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('categories', CategoryController::class);
Route::get('categories-three', [CategoryController::class, 'getThreeCategories']);

Route::apiResource('products', ProductController::class);
Route::get('products-by-category/{category}', [ProductController::class, 'findByCategory']);
Route::get('products-new-products', [ProductController::class, 'newProducts']);
Route::get('products-top-products', [ProductController::class, 'ratingProducts']);

Route::apiResource('orders', OrderController::class);
Route::apiResource('users', UserController::class);

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::get('auth/user-profile', [AuthController::class, 'userProfile']);
Route::post('auth/change-pass', [AuthController::class, 'changePassWord']);
