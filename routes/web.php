<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludar', function () {
    return view('saludar');
});

Route::get('/despedir', function () {
    return view('despedir');
});

Route::get('/dormir', function () {
    return view('dormir');
});

Route::get('/tomar', function () {
    return view('tomar');
});

Route::get('/iniciar', 'ControladorInicio@iniciar');
Route::get('/checar', 'ControladorInicio@checar');

Route::get('/dashboard', 'ControladorGerente@dashboard');
Route::get('/listar/{cuantos?}' , 'ControladorCliente@listar');
Route::resource("Carro",'CarroController')->middleware('auth');
Route::resource("Propietario",'PropietarioController')->middleware('auth');
//Route::resource("Producto","ControladorEjemplo");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/recuperar', 'CarroController@recuperar')->middleware('auth');
Route::resource("Ajax",'AjaxController')->middleware('auth');
