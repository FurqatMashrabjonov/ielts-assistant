<?php

namespace App\Core\Response;

class ResponseService
{


    public static function success($data){
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
