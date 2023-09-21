<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InfyOm\Generator\Utils\ResponseUtil;

/**
 * @OA\Info(
 *   title="AD Admin Sample API",
 *   version="1.0.0"
 * )
 */

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return response()->json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
