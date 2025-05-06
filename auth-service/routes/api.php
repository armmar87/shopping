<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.token')->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::post('products/check-availability', ProductController::class);
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{externalId}', [OrderController::class, 'show']);
    Route::post('/', [OrderController::class, 'store']);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('me', [AuthController::class, 'me']);
