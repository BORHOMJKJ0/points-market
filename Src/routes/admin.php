<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::middleware('auth:admin')->group(function () {
    /**
     * Home
     */
    Route::get('/', 'HomeController@index')->name('home');

    /**
     * Admins
     */
    Route::resource('admins', 'AdminController')->except('show');

    /**
     * Roles
     */
    Route::resource('roles', 'RoleController')->except('show');

    /**
     * Sections
     */
    Route::resource('sections', 'SectionController')->except('show');

    Route::namespace('Product')->group(function () {

        /**
         * Products
         */
        Route::get('products/images/{image}/destroy', 'ProductController@destroy_image')->name('products.images.destroy');
        Route::resource('products', 'ProductController');

        /**
         * Offers
         */
        Route::resource('products.offers', 'OfferController')->except('index', 'show');

        /**
         * Repository
         */
        Route::resource('products.repositories', 'RepositoryController')->only('store', 'destroy');
    });

    /**
     * Coupons
     */
    Route::resource('coupons', 'CouponController')->except('show');

    /**
     * Sliders
     */
    Route::resource('sliders', 'SliderController')->except('show');

    Route::namespace('Order')->group(function () {

        /**
         * Orders
         */
        Route::resource('orders', 'OrderController');
        Route::get('orders/{order}/cancel', 'OrderController@cancel')->name('orders.cancel');
        Route::get('orders/{order}/accept', 'OrderController@accept')->name('orders.accept');

    });

    /**
     * Users
     */
    Route::resource('users', 'UserController');

    /**
     * Settings
     */
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'SettingController@index')->name('index');
        Route::patch('/{mainKey}', 'SettingController@update')->name('update');
    });

    /**
     * Helpers
     */
    Route::prefix('helpers')->namespace('Helpers')->name('helpers.')->group(function () {

        /**
         * Change Tab
         */
        Route::post('change_tab', 'ChangeTabController')->name('change_tab');

    });
});
