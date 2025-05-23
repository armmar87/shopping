<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index']);
Route::get('/{externalId}', [OrderController::class, 'show']);
Route::post('/', [OrderController::class, 'store']);


