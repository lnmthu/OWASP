<?php

use Illuminate\Support\Facades\Route;
//show
Route::get("sensitive-data-exposure", "SDEController@showSDE");

//action
Route::prefix('action')->group(function () {
    Route::prefix('SDE')->group(function () {
        Route::get('reset', 'SDEController@reset');
        Route::get('code', 'SDEController@getCode');
        Route::post('code', 'SDEController@postCode');
        Route::get('social', 'SDEController@social');
        Route::get('search', 'SDEController@search');
        Route::get('prevent', 'SDEController@prevent');
        Route::get("robots/{id}","SDEController@robots");
    });

});
