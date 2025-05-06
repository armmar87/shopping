<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;

Route::middleware('auth.token')->group(function () {
    Route::apiResource('products', ProductController::class);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('me', [AuthController::class, 'me']);
