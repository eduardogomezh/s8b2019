@extends('layouts.app')
@section('content')
     {{\Session::get('ok')}}
    Carros:
<table border="1">
    <thead>
        <tr>
            <td>CARRO</td>
            <td>PROPIETARIO</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>

    @foreach ($todos as $carro)
        <tr>
            <td>{{$carro->Marca}} - {{$carro->Modelo}}</td>
            <td>{{ $carro->propietario->nombre }}</td>

            <td>
                @can('acciones', App\Carro::class)
                    <a href="/Carro/{{$carro->id}}">READ</a> 
                    <a href="/Carro/{{$carro->id}}/edit">UPDATE</a>
                    <form action="/Carro/{{$carro->id}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE">
                    </form>
                        
                @endcan
                
                 
            </td>
        </tr>
@endforeach
</tbody>
</table>

<a href="Carro/create" class="btn btn-primary">CREAR</a>
@endsection