<?php

namespace App\Library;

use Illuminate\Http\Request;

class JsonResponseData {
    public static function formatData(
        Request $request,
        string $message = '',
        array $data = []
    ): array
    {
        return [
            'message' => $message,
            'route' => $request->path(),
            'date' => gmdate('Y-m-d H:i:s e'),
            'data' =>  $data,
        ];
    }
}