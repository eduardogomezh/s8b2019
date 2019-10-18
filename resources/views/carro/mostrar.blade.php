@extends('plantilla')
@section('contenido')
ESTAMOS EN SHOW<BR>
Carro con marca: {{$registro->Marca}} y modelo: {{$registro->Modelo}}
@endsection