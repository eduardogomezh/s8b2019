@extends('plantilla')
@section('contenido')
PONER LOS DATOS PARA AGREGAR UN CARRO:
<form action="/Propietario" method="post">
    Escriba el nombre:
    <input type="text" name="nombre" >
    <input type="submit" value="Enviar">
    @csrf
</form>
@endsection