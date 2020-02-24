<?php

use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\Request;

Route::get('/health-check', 'ApiTestController@getHealthCheck');
Route::any('/echo', 'ApiTestController@echo');

Route::post('/register', 'ApiAuthController@postRegister');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@postLogout');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'ApiUserController@getUser');
});

Route::group(['prefix' => 'beer'], function () {
    Route::get('/', 'ApiBeerController@getList');
    Route::post('/', 'ApiBeerController@postBeer');
    Route::get('/{id}', 'ApiBeerController@getBeer');
    Route::put('/{id}', 'ApiBeerController@updateBeer');
    Route::delete('/{id}', 'ApiBeerController@deleteBeer');
});

Route::fallback('ApiFallBackController@getFallBack');
