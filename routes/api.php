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

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/refresh', [AuthController::class, 'refresh']);
  Route::get('/user-profile', [AuthController::class, 'userProfile']);
  Route::post('/change-pass', [AuthController::class, 'changePassWord']);
});
