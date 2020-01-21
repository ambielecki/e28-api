<?php

use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\Request;

Route::get('/health-check', 'HealthCheckApiController@getHealthCheck');

Route::post('/register', 'AuthApiController@postRegister');
Route::post('/login', 'AuthApiController@postLogin');
Route::post('/logout', 'AuthApiController@postLogout');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});

Route::fallback(function (Request $request) {
    return response()->json(JsonResponseData::formatData(
        $request,
        'Page Not Found',
        Message::MESSAGE_ERROR,
        []
    ), 404);
});