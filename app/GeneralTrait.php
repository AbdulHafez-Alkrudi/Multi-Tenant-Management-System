<?php

namespace App;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

trait GeneralTrait
{
    public function sendError($data = [], $status = 404): JsonResponse
    {
        return response()->json([
            'status' => false,
            'status_code' => $status,
            'data' => $data
        ]);
    }
    public function sendSuccess($data = [] , $status = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'status_code' => $status,
            'data' => $data
        ]);
    }


}
