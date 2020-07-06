<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth.shopify'], function () {
    Route::get('/', function () {
        $settings = \App\Setting::where('shop_id', \Illuminate\Support\Facades\Auth::user()->name)->first();

        return view('dashboard', compact('settings'));
    })->name('home');

    Route::view('/products', 'products');
    Route::view('/customers', 'customers');
    Route::view('/settings', 'settings');

    Route::post('configureTheme', 'SettingController@configureTheme');
});
