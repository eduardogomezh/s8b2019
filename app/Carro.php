<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $table  = "carros";
    public $timestamps = false;
    
    public $fillable = ["Marca",'Modelo'];


    public function propietario(){
        return $this->hasOne("App\Propietario")
        ->withDefault(["nombre"=>"Sin propietario"]);
    }

}
