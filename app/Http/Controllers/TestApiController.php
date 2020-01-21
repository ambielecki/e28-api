<?php

namespace App\Http\Controllers;

use App\Library\JsonResponseData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function getTest(Request $request): JsonResponse {


        return response()->json(JsonResponseData::formatData(
            $request
        ));
    }
}
