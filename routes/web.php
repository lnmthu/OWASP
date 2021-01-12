<?php

use Illuminate\Support\Facades\Route;
//show
Route::get("broken-authentication", "BAController@showBA");

//action
Route::prefix('action')->group(function () {
    Route::prefix('BA')->group(function () {
        Route::get('reset', 'BAController@reset');
        Route::middleware(['check.not.exist.auth'])->group(function () {
            Route::get('login-social', 'BAController@getLoginSocial');
            Route::post('login-social', 'BAController@postLoginSocial');
            Route::post('login-social-prevent', 'BAController@postLoginSocialPrevent');
            Route::get('register-social', 'BAController@getRegisterSocial');
            Route::post('register-social', 'BAController@postRegisterSocial');
        });
        Route::middleware(['check.exist.auth'])->group(function () {
            Route::get('logout', 'BAController@getLogout');
            Route::get('info', 'BAController@getInfo');
            Route::post('info', 'BAController@postInfo');
            Route::get('social', 'BAController@social');
            Route::get('search', 'BAController@search');
        });
        Route::get('prevent', 'BAController@setPrevent');

    });

});
