<?php
namespace App\Traits;


trait Responser{

    public function success($code = 200, string $type, string $message, $data = null){
        return response()->json([
           'status' => $code,
           'type' => $type,
           'message' => $message,
           'data' =>$data
        ]);

    }

    public function error_message($code , string $type, string $message, $data = null){
    return response()->json([
        'status' => $code,
        'type' => $type,
        'message' => $message,
        'data' =>$data
    ]);
    }

}
