<?php

use Illuminate\Support\Facades\Route;
//show
Route::get("reflected-xss", "XssController@showReflectedXss");

//action
Route::prefix('action')->group(function () {
    Route::prefix('xss')->group(function () {
        Route::get('reset', 'XssController@reset');
        Route::get('login', 'XssController@getLogin');
        Route::post('login','XssController@postLogin');
        Route::get('register', 'XssController@getRegister');
        Route::post('register','XssController@postRegister');
        Route::get("reflected-xss", "XssController@actionReflectedXss")->middleware('check.auth');
        Route::get('logout', 'XssController@getLogout');
        Route::get('code-hacker','XssController@getCodeHacker');
        Route::get("cookie-hacker",'XssController@getCookieHacker');
        Route::get("show-cookie-hacker",'XssController@showCookieHacker');
        Route::get('code-script','XssController@getCodeScript');
        Route::get('test-code-script','XssController@testCodeScript');
        Route::get('show-code-prevent','XssController@showCodePrevent');
        Route::get('get-code-prevent','XssController@getCodePrevent');
    });

});
