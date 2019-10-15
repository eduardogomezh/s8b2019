<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $table  = "carros";
    public $timestamp = false;
    public $fillable = ["Marca",'Modelo'];

}
