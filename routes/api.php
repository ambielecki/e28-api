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