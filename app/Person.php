<?php

namespace App;

use App\Country;
use Illuminate\Database\Eloquent\Model;

class Person extends Model{

    protected $table = 'persons';

    protected $fillable = [
        'name',
        'lastname',
        'age',
        'email',
        'country_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

}
