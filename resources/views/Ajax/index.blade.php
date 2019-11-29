@extends('layouts.app')
@section('content')
PAGINA PARA MOSTRAR EL USO DE AJAX
<hr>
Nombre: <input type="text" id="caja_Nombre" value="">
@csrf
<br>
<div id="boton_get"  class="btn btn-primary">
    PEDIR POR GET
</div>
<div id="boton_post"  class="btn btn-primary">
        PEDIR POR POST
</div>
    
<div id="boton_delete"  class="btn btn-primary">
    USAR DELETE
</div>

<div id="boton_put"  class="btn btn-primary">
    USAR PUT
</div>

<script>
    $("#boton_get").click(function() {
        axios.get('/Ajax/asd')
        .then(function (response) {
            alert(response.data.atributo);
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
        });
    });
    $("#boton_post").click(function() {
        axios.post('/Ajax', {
            Nombre: $('#caja_Nombre').val(),
            _token: '{{ csrf_token() }}'
        })
        .then(function (response) {
            alert(response.data.quien);
        })
        .catch(function (error) {
            console.log(error);
        });

    });

    $("#boton_delete").click(function() {
        axios.delete('/Ajax/' + $('#caja_Nombre').val() )
        .then(function (response) {
            alert(response.data.atributo);
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
        });
    });


    $("#boton_put").click(function() {
        axios.put('/Ajax/3', {
            Nombre: $('#caja_Nombre').val(),
            _token: '{{ csrf_token() }}'
        })
        .then(function (response) {
            alert(response.data.atributo);        })
        .catch(function (error) {
            console.log(error);
        });

    });



</script>


@endsection
