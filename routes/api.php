<?php

Route::get('/health-check', 'ApiTestController@getHealthCheck');
Route::any('/echo', 'ApiTestController@echo');

Route::get('/home', 'ApiHomeController@getHome');
Route::post('/register', 'ApiAuthController@postRegister');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@postLogout');
Route::post('/refresh', 'ApiAuthController@postRefresh');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'ApiUserController@getUser');
    Route::post('/password', 'ApiUserController@postResetPassword');
});

Route::group(['prefix' => 'beer'], function () {
    Route::get('/styles', 'ApiBeerController@getStyles');
    Route::get('/home', 'ApiBeerController@getHomePage');
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/', 'ApiBeerController@getList');
        Route::post('/', 'ApiBeerController@postBeer');
        Route::get('/{id}', 'ApiBeerController@getBeer');
        Route::put('/{id}', 'ApiBeerController@updateBeer');
        Route::delete('/{id}', 'ApiBeerController@deleteBeer');
    });
});

Route::fallback('ApiFallBackController@getFallBack');
