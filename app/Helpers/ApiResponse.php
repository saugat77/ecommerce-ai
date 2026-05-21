<?php
namespace App\Helpers;

class ApiResponse
{
    public static function success($message = 'Success', $data = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($message = 'Error', $code = 500, $errorCode = null, $data = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'error_code' => $errorCode,
            'data' => $data,
        ], $code);
    }
}