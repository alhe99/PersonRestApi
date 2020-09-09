<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{

    function getAllPersons(){
        $persons = Person::with(['country'])->orderBy('id','desc')->get();

        return $this->response($persons,$this->status_code_ok,null);
    }

    function create(Request $request){

        $person = new Person;
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->age = $request->age;
        $person->email = $request->email;
        $person->country_id = $request->country_id;
        $person->save();

        return $this->response($person,$this->status_code_ok,null);
    }

    function update(Request $request, $id){
        $person = Person::findOrFail($id);
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->age = $request->age;
        $person->email = $request->email;
        $person->update();

        return $this->response($persons,$this->status_code_ok,null);
    }

    function delete($id){
        $person = Person::findOrFail($id);
        $person->delete();

        return $this->response(null,$this->status_code_ok,null);
    }
}
