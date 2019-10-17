@extends('plantilla')
@section('contenido')
PONER LOS DATOS PARA AGREGAR UN CARRO:
<form action="/Carro" method="post">
    <input type="text" name="Marca" id="Marca">
    <input type="text" name="Modelo" id="Modelo">
    <input type="submit" value="Enviar">
    @csrf
</form>
@endsection