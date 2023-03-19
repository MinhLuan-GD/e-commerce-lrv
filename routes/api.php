<?php

use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Path: routes/api.php
// Compare this snippet from app/Http/Controllers/CategoryController.php:
Route::get('/categories', [CategoryController::class, 'list']);
Route::get('/categories/{id}', [CategoryController::class, 'findOne']);
Route::post('/categories', [CategoryController::class, 'create']);
