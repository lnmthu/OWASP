<?php

use Illuminate\Support\Facades\Route;
// Route::get("/", "XssController@showReflectedXss");
//show
Route::get("reflected-xss", "XssController@showReflectedXss");
Route::get("sql-injection", "SqlController@home");

//action
Route::prefix('action')->group(function () {
    Route::prefix('xss')->group(function () {
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
    Route::prefix('sql')->group(function () {
        Route::get('login', 'SqlController@getLogin');
        Route::post('login', 'SqlController@postLogin');
        Route::get('code', 'SqlController@actionShowCode');
        Route::get('home', 'SqlController@actionHome');
        Route::post('search', 'SqlController@postSearch');
        Route::get('logout','SqlController@logout');
    });
});
