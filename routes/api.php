<?php

Route::get('/health-check', 'ApiTestController@getHealthCheck');
Route::any('/echo', 'ApiTestController@echo');

Route::post('/register', 'ApiAuthController@postRegister');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@postLogout');
Route::post('/refresh', 'ApiAuthController@postRefresh');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'ApiUserController@getUser');
});

Route::group(['prefix' => 'beer'], function () {
    Route::get('/', 'ApiBeerController@getList');
    Route::get('/styles', 'ApiBeerController@getStyles');
    Route::get('/{id}', 'ApiBeerController@getBeer');
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/', 'ApiBeerController@postBeer');
        Route::put('/{id}', 'ApiBeerController@updateBeer');
        Route::delete('/{id}', 'ApiBeerController@deleteBeer');
    });
});

Route::fallback('ApiFallBackController@getFallBack');
