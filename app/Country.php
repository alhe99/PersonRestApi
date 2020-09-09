<?php

namespace App;

use App\Person;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countrys';

    protected $fillable = [
        "name",
        "code"
    ];

    public function persons(){
        return $this->hasMany(Person::class);
    }
}
