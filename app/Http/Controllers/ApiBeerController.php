<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

        return response()->json([]);
    }

    public function updateBeer(Request $request, $id): JsonResponse {

        return response()->json([]);
    }

    public function deleteBeer(Request $request, $id): JsonResponse {

        return response()->json([]);
    }
}
