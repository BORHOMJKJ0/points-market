<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'reset' => false,
]);

/**
 * Home
 */
Route::get('/', 'HomeController')->name('home');

/**
 * Profile
 */
Route::prefix('profile')->name('profile.')->group(function () {
    Route::patch('/', 'ProfileController@index')->name('index');
    Route::patch('/', 'ProfileController@update')->name('update');
});

/**
 * Products
 */
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/{product}', 'ProductController@show')->name('show');
});

/**
 * Sections
 */
Route::get('sections/{section}', 'SectionController@show')->name('sections.show');

/**
 * Cart
 */
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('/{product}', 'CartController@store')->name('store');
    Route::patch('/', 'CartController@update')->name('update');
    Route::delete('/{product}', 'CartController@destroy')->name('destroy');
});

/**
 * Checkout
 */
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/', 'CheckoutController@complete')->name('complete');
});

/**
 * Contact
 */
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('/', 'ContactController@store')->name('store');
});

/**
 * Profile
 */
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'ProfileController@index')->name('index');
    Route::patch('/', 'ProfileController@update')->name('update');
});
