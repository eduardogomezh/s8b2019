@extends('plantilla')
@section('contenido')
    Carros:
@foreach ($todos as $carro)
    <li>
        {{$carro->Marca}} - {{$carro->Modelo}}
    </li>
@endforeach
    
@endsection