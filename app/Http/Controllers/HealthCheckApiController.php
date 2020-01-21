<?php

namespace App\Http\Controllers;

use App\Models\HealthCheck;
use App\Library\JsonResponseData;
use App\Library\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HealthCheckApiController extends Controller
{
    public function getHealthCheck(Request $request): JsonResponse {
        $db_check = HealthCheck::first();

        $message = 'Problem Retrieving from DB';
        $message_type = Message::MESSAGE_ERROR;

        if ($db_check) {
            $db_check->api_checks++;

            if ($db_check->save()) {
                $message = 'E28 API Is Up and Running';
                $message_type = Message::MESSAGE_OK;
            } else {
                $message = 'Problem Saving to DB';
            }
        }

        return response()->json(JsonResponseData::formatData(
            $request,
            $message,
            $message_type,
            [
                'api_checks' => $db_check ? $db_check->api_checks : '?',
            ]
        ));
    }
}
