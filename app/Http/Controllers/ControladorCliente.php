<?php
namespace App\Http\Controllers;

class ControladorCliente extends Controller{

    function listar(){
        return view('cliente.listado');
    }
}