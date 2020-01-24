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