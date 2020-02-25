<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JWTAuth;

class ApiBeerController extends Controller
{
    public function getList(Request $request): JsonResponse {
        $beer = new Beer();
        $query = $beer->newQuery();

        return $beer->getResponse($request, $query);
    }

    public function postBeer(Request $request): JsonResponse {

        return response()->json([]);
    }

    public function getBeer(Request $request, $id): JsonResponse {
        $beer = Beer::find($id);
        if ($beer) {
            $user = JWTAuth::getToken() ? JWTAuth::parseToken()->toUser() : null;

            if ($beer->is_public || ($user && $user->id === $beer->user_id)) {
                return response()->json(JsonResponseData::formatData(
                    $request,
                    '',
                    Message::MESSAGE_OK,
                    ['beer' => $beer],
                ));
            }

            return response()->json(JsonResponseData::formatData(
                $request,
                'This beer is not public',
                Message::MESSAGE_WARNING,
                [],
            ), 401);
        }

        return response()->json(JsonResponseData::formatData(
            $request,
            'Beer not found',
            Message::MESSAGE_WARNING,
            [],
        ), 404);
    }

    public function updateBeer(Request $request, $id): JsonResponse {

        return response()->json([]);
    }

    public function deleteBeer(Request $request, $id): JsonResponse {

        return response()->json([]);
    }
}
