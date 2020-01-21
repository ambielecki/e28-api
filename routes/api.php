<?php

use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function (Request $request) {
    return response()->json(JsonResponseData::formatData($request, 'Hello World', []));
});

Route::post('/register', 'AuthApiController@postRegister');
Route::post('/login', 'AuthApiController@postLogin');
Route::post('/logout', 'AuthApiController@postLogout');

Route::get('/test', 'TestApiController@getTest');

Route::fallback(function (Request $request) {
    return response()->json(JsonResponseData::formatData(
        $request,
        'Page Not Found',
        Message::MESSAGE_ERROR,
        []
    ), 404);
});