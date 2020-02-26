<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Http\Requests\ApiBeerRequest;
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

    public function postBeer(ApiBeerRequest $request): JsonResponse {
        $beer = new Beer($request->all());
        $beer->user_id = \Auth::user()->id;

        if ($beer->save()) {
            return response()->json(JsonResponseData::formatData(
                $request,
                'Beer saved successfully',
                Message::MESSAGE_OK,
                ['id' => $beer->id],
            ));
        }

        return response()->json(JsonResponseData::formatData(
            $request,
            'There was a problem saving your beer',
            Message::MESSAGE_ERROR,
            [],
        ), 500);
    }

    public function getBeer(Request $request, $id): JsonResponse {
        $beer = Beer::find($id);
        if ($beer) {
            // TODO :: handle exception for expired token
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
