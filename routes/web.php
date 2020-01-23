<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminHomeController@index')->name('home');

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('test', 'TestController@getTest');

        Route::group(['prefix' => '/user'], function () {
            Route::get('/', 'AdminUserController@getList')->name('user_list');
            Route::get('/password', 'AdminUserController@getPassword')->name('user_password');
            Route::post('/password', 'AdminUserController@postPassword');
            Route::get('/{user_id}', 'AdminUserController@getEdit')->name('user_edit');
            Route::post('/{user_id}', 'AdminUserController@postEdit');
        });
    });
});