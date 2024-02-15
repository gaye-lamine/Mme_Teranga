<?php

namespace App\Utils;

class ApiResponse
{
    public static function success($data = null, $message = '', $statusCode = 200)
    {
        return response()->json(
            [
                "status" => 'success',
                "data" => $data ?? [],
                "message" => $message,

            ],
            $statusCode
        );
    }

    public static function error($data = null, $message = '', $statusCode = 400)
    {
        return response()->json(
            [
                "status" => 'error',
                'data' => $data ?? [],
                'message' => $message,

            ],
            $statusCode
        );
    }
}
