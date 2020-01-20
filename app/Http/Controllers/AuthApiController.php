<?php

namespace App\Http\Controllers;

use App\Library\JsonResponseData;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function postRegister(Request $request): JsonResponse
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        $token = auth('api')->login($user);

        return $this->respondWithToken($request, $token);
    }

    public function postLogin(Request $request): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(JsonResponseData::formatData(
                $request,
                'Unauthorized',
                [
                    'error' => 'Unauthorized',
                ],
            ), 401);
        }

        return $this->respondWithToken($request, $token);
    }

    public function postLogout(Request $request): JsonResponse
    {
        auth('api')->logout();

        return response()->json(JsonResponseData::formatData(
            $request,
            'Successfully logged out',
            [],
        ));
    }

    public function postRefresh(Request $request): JsonResponse
    {
        return $this->respondWithToken($request, auth('api')->refresh());
    }

    public function getPleaseLogIn(Request $request): JsonResponse
    {
        return response()->json(JsonResponseData::formatData(
            $request,
            'You Must Be Logged In to View this Page',
            [],
        ), 401);
    }

    protected function respondWithToken(Request $request, $token): JsonResponse
    {
        return response()->json(JsonResponseData::formatData(
            $request,
            'Success',
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ]
        ));
    }
}
