<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $status_code_ok = 200;

    public function __construct(){
        $this->middleware('jwt');
    }

    public function response($data,$code,$msj){
        return response()->json([
            "code" => $code,
            "message" => $msj,
            "data" => $data
        ],$code);
    }
}
