@extends('plantilla')
@section('contenido')
PONER LOS DATOS PARA AGREGAR UN CARRO:
<form action="/Propietario/{{$registro->id}}" method="POST">
    <input type="text" name="nombre"  value="{{$registro->nombre}}">
    <input type="submit" value="EDITAR">
    @csrf
    @method('PUT')
</form>
@endsection