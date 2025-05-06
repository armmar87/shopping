<?php

// api-gateway/routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::apiResource('products', ProductController::class);
Route::post('products/check-availability', ProductController::class);


