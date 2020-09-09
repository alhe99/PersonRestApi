<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller{


    public function getCountrys(){

        $countries = Country::orderBy('id','desc')->get();
        return $this->response($countries,$this->status_code_ok,null);
    }
}
