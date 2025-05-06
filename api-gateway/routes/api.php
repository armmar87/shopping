<?php

// api-gateway/routes/api.php
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.token')->group(function () {
    Route::prefix('auth')->group(base_path('routes/auth.php'));
    Route::prefix('products')->group(base_path('routes/product.php'));
    Route::prefix('orders')->group(base_path('routes/order.php'));
});

