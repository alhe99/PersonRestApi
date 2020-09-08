<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public $status_code_ok = 200;

    public function __construct(){
        $this->middleware('jwt');
    }

    function getAllPersons(){
        $persons = Person::orderBy('id','desc')->get();

        return response()->json([
            "code" => 200,
            "status" => "ok",
            "data" => $persons
        ],$this->status_code_ok);
    }

    function create(Request $request){

        $person = new Person;
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->age = $request->age;
        $person->email = $request->email;
        $person->save();

        return response()->json([
            "code" => 200,
            "status" => "ok",
            "data" => $person
        ],$this->status_code_ok);
    }

    function update(Request $request, $id){
        $person = Person::findOrFail($id);
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->age = $request->age;
        $person->email = $request->email;
        $person->update();

        return response()->json([
            "code" => 200,
            "status" => "ok",
            "data" => $person
        ],$this->status_code_ok);
    }

    function delete($id){
        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json([
            "code" => 200,
            "status" => "ok",
            "data" => null
        ],$this->status_code_ok);
    }
}
