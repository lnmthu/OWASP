<?php

use Illuminate\Support\Facades\Route;
//show
Route::get("sql-injection", "SqlController@home");

//action
Route::prefix('action')->group(function () {

    Route::prefix('sql')->group(function () {
        Route::get("reset","SqlController@reset");
        Route::get('login', 'SqlController@getLogin');
        Route::post('login', 'SqlController@postLogin');
        Route::get('code', 'SqlController@actionShowCode');
        Route::get('home', 'SqlController@actionHome')->middleware('check.without.auth');
        Route::post('search', 'SqlController@postSearch');
        Route::get('logout','SqlController@logout');
        Route::get('show-code-prevent','SqlController@showCodePrevent');
        Route::post('post-code-prevent','SqlController@postCodePrevent');

    });

});
