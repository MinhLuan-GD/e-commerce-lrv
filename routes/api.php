<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
Route::get('products-new-products', [ProductController::class, 'newProducts']);
Route::get('products-top-products', [ProductController::class, 'ratingProducts']);

Route::apiResource('orders', OrderController::class);
Route::apiResource('users', UserController::class);
