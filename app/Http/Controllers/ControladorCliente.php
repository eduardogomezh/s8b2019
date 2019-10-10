<?php
namespace App\Http\Controllers;

class ControladorCliente extends Controller{

    function listar($cuantos){
//        dd($cuantos);
        $pontencia = $cuantos * $cuantos;
        $arreglo = [];
        $arreglo [ 'cuantos' ] = $cuantos;
//      return view('cliente.listado' , $arreglo );
        return view('cliente.listado' , compact('cuantos','pontencia') );
    }
}