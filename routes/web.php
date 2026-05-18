<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {

    $products = Product::with('category')->get();

    return view('home.index', compact('products'));
});

Route::get('/products', function () {

    $products = Product::with('category')->get();

    return view('products.index', compact('products'));
});

Route::get('/about', function () {
    return view('about.index');
});

Route::get('/api/products', function () {
    return Product::with('category')->get();
});