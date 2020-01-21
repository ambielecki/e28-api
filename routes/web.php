<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('test', 'TestController@getTest');

        Route::group(['prefix' => '/user'], function () {
            Route::get('/', 'UserAdminController@getList')->name('user_list');
            Route::get('/{user_id}', 'UserAdminController@getEdit')->name('user_edit');
        });
    });
});