<?php
namespace App\Http\Controllers;

class ControladorInicio extends Controller{

    function iniciar(){
        return view('inicio.iniciar');
    }

    function checar(){
        $nivel = "Cliente";
        if($nivel == "Gerente"){
            return redirect('/dashboard');
        }else
            return redirect('/listar');

    }
}