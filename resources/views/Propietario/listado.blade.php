@extends('layouts.app')
@section('content')

     {{\Session::get('ok')}}
    Propietarios:
<table border="1">
    <thead>
        <tr>
            <td>NOMBRE</td>
            <td>CARROS QUE CONDUCE</td>
            
             
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>

    @foreach ($todos as $propietario)
        <tr>
            <td>{{$propietario->nombre}}</td>
            <td>
                
                @forelse ($propietario->carros as $carro)
                    <li>{{$carro->Marca}}</li>
                @empty
                    NO CONDUCE NINGUN CARRO
                @endforelse

            </td>
             
            <td><a href="/Propietario/{{$propietario->id}}">READ</a> 
                <a href="/Propietario/{{$propietario->id}}/edit">UPDATE</a>
                <form action="/Propietario/{{$propietario->id}}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                </form>
                 
            </td>
        </tr>
@endforeach
</tbody>
</table>

<a href="Propietario/create" class="btn btn-primary">CREAR</a>
@endsection