<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    public $timestamps = false;    
    public $fillable = ["nombre"];

    public function carros(){
        return $this->hasMany("App\Carro", "conductor");
    }

}
