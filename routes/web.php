<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth.shopify'])->name('home');


Route::view('/products', 'products');
Route::view('/customers', 'customers');
Route::view('/settings', 'settings');
