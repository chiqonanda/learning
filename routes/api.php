<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;


// Ambil semua produk → GET /api/products
Route::get('/products', [ProductController::class, 'index']);

// Ambil satu produk → GET /api/products/{id}
Route::get('/products/{id}', [ProductController::class, 'show']);