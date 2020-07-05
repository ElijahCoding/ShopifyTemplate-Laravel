<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.shopify'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::view('/products', 'products');
    Route::view('/customers', 'customers');
    Route::view('/settings', 'settings');
});
