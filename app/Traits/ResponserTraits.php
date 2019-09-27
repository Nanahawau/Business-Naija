<?php
namespace App\Traits;


trait ResponserTraits {

    public function success(int $code = 200, string $type, string $message, $data = null){
        return response()->json([
            'status' => $code,
           'type' => $type,
           'message' => $message,
           'data' => $data
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
