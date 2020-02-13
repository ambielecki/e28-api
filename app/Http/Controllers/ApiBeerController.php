<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiBeerController extends Controller
{
    public function getList(Request $request): JsonResponse {
        $query = Beer::query();

        $limit = (int) ($request->input('limit') ?? '25');
        $page = (int) ($request->input('page') ?? '1');
        $skip = ($page - 1) * $limit;

        if ($request->input('search')) {
            $search = "%{$request->input('search')}%";

            $query = $query
                ->where('name', 'LIKE', $search)
                ->orWhere('style', 'LIKE', $search);
        }

        if ($request->input('sort')) {
            $query = $query->orderBy(
                $request->input('sort'),
                $request->input('sort_direction') ?? 'ASC'
            );
        }

        $count = $query->count();

        $beers = $query
            ->skip($skip)
            ->limit($limit)
            ->get();

        return response()->json(JsonResponseData::formatData(
            $request,
            '',
            Message::MESSAGE_OK,
            [
                'beers' => $beers,
                'count' => $count,
                'limit' => $limit,
                'page' => $page,
                'pages' => ceil($count / $limit),
            ]
        ));
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
