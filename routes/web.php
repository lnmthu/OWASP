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
        Route::get('DDT', 'XXEController@getDDT');
        Route::get('DDT-InternalDDTEntity', 'XXEController@getDDTInternalDDTEntity');
        Route::get('DDT-ExternalDDTEntity', 'XXEController@getDDTExternalDDTEntity');
        Route::get("prevent", "XXEController@getPrevent");
        Route::post('XML', 'XXEController@postXML');
        Route::get('file-xml', 'XXEController@fileXML');
        Route::get('downloadErrorXML', 'XXEController@downloadErrorXML');
        Route::get('error', 'XXEController@error');
    });

});
