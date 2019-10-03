<?php
namespace App\Http\Controllers;

class ControladorGerente extends Controller{

    function dashboard(){
        return view('gerente.dashboard');
    }
}