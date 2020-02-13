<?php

namespace App;

use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class ApiModel extends Model {
    abstract protected function addSearch(Request $request, Builder $query): Builder;

    public function getResponse(Request $request, Builder $query): JsonResponse {
        $limit = (int) ($request->input('limit') ?? '25');
        $page = (int) ($request->input('page') ?? '1');
        $skip = ($page - 1) * $limit;

        if ($request->input('search')) {
            $query = $this->addSearch($request, $query);
        }

        // TODO: Implement check of sortable fields
        if ($request->input('sort')) {
            $query = $query->orderBy(
                $request->input('sort'),
                $request->input('sort_direction') ?? 'ASC'
            );
        }

        $count = $query->count();

        $items = $query
            ->skip($skip)
            ->limit($limit)
            ->get();

        return response()->json(JsonResponseData::formatData(
            $request,
            '',
            Message::MESSAGE_OK,
            [
                'items' => $items,
                'count' => $count,
                'limit' => $limit,
                'page' => $page,
                'pages' => ceil($count / $limit),
            ]
        ));
    }
}