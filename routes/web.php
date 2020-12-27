<?php

use Illuminate\Support\Facades\Route;
//show
Route::get("xxe", "XXEController@showXXE");

//action
Route::prefix('action')->group(function () {
    Route::prefix('xxe')->group(function () {
        Route::get('DDT', 'XXEController@getDDT');
        Route::get('DDT-InternalDDTEntity', 'XXEController@getDDTInternalDDTEntity');
        Route::get('DDT-ExternalDDTEntity', 'XXEController@getDDTExternalDDTEntity');
        Route::get("prevent","XXEController@getPrevent");
        Route::post('XML', 'XXEController@postXML');        
        Route::middleware(['check.not.exist.auth'])->group(function () {
            Route::get('login', 'XXEController@getLogin');
            Route::get('login-social', 'XXEController@getLoginSocial');
            Route::post('login-social', 'XXEController@postLoginSocial');
            Route::get('register-social', 'XXEController@getRegisterSocial');
            Route::post('register-social', 'XXEController@postRegisterSocial');
        });
        Route::middleware(['check.exist.auth'])->group(function () {
            Route::get('logout', 'XXEController@getLogout');
            Route::get('shop', 'XXEController@shop');
            Route::post('search', 'XXEController@search');
        });
        Route::get('file-xml', 'XXEController@fileXML');
        Route::get('reset', 'XXEController@reset');
        Route::get('downloadErrorXML', 'XXEController@downloadErrorXML');
        Route::get('error', 'XXEController@error');
    });

});
