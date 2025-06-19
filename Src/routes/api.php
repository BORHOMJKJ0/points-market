<?php

use Illuminate\Support\Facades\Route;

/**
 * Helpers
 */
Route::prefix('helpers')->namespace('Helpers')->name('helpers.')->group(function () {

    /**
     * Ckeditor
     */
    Route::name('ckeditor.')->prefix('ckeditor')->group(function () {
        Route::post('upload-image', 'CkeditorController@upload_image')->name('upload-image');
    });

    /**
     * Sorting
     */
    Route::post('sorting', 'SortController')->name('sort');

});
