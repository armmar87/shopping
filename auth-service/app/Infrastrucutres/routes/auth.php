<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
