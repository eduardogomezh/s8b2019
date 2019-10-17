@extends('plantilla')
@section('contenido')
     {{\Session::get('ok')}}
    Carros:
<table border="1">
    <thead>
        <tr>
            <td>CARRO</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>

    @foreach ($todos as $carro)
        <tr>
            <td>{{$carro->Marca}} - {{$carro->Modelo}}</td>
            <td><a href="/Carro/{{$carro->id}}">READ</a> UPDATE DELETE</td>
        </tr>
@endforeach
</tbody>
</table>

<a href="Carro/create" class="btn btn-primary">CREAR</a>
@endsection