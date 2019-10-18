@extends('plantilla')
@section('contenido')
PONER LOS DATOS PARA AGREGAR UN CARRO:
<form action="/Carro/{{$registro->id}}" method="POST">
    <input type="text" name="Marca" id="Marca" value="{{$registro->Marca}}">
    <input type="text" name="Modelo" id="Modelo" value="{{$registro->Modelo}}">
    <input type="submit" value="EDITAR">
    @csrf
    @method('PUT')
</form>
@endsection