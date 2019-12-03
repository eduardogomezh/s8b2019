@extends('layouts.app')
@section('content')
<table id="tabla_user" class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <td>Nombre</td>
      <td>Correo</td>
      <td>Rol</td>
      <td>Acciones</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($Users as $User)
      <tr id="{{$User->id}}">
        <td class="nombres" id="{{$User->name}}">{{$User->name}}</td>
        <td class="correos" id="{{$User->email}}">{{$User->email}}</td>
        <td class="roles" id="{{$User->rol}}">{{$User->rol}}</td>
        <td>
            <button class="btn btn-danger btn-borrar">BORRAR</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
  Agregar
</button>

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <form>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" placeholder="Nombre">
            </div>

            <div class="form-group">
              <label for="email">Correo</label>
              <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>

            <div class="form-group">
              <label for="rol">Rol</label>
              <select class="form-control" id="rol">
                <option>Operativo</option>
                <option>Directivo</option>
                <option>Administrador</option>
                <option>Gerente</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" value="pasopaso">
            </div>

          </form>
        </form>
      </div>
      <div class="modal-footer">
        <button id="boton_agregar" type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
<script>
  var MostrandoInput = false;
  
  $( "#boton_agregar" ).click(function() {
    $( "#boton_agregar" ).attr("disabled", "disabled");
    axios.post('/Users/', {
      name: $("#name").val(),
      email: $("#email").val(),
      rol: $("#rol").val(),
      password: $("#password").val(),
      _token: '{{ csrf_token() }}',
    })
    .then(function (response) {
      _tbody = $("#tabla_user > tbody");
      item  = '<tr id="' + response.data.id + '">';
      item += '  <td class="nombres" id="' + response.data.name +  '">' + response.data.name +  '</td>';
      item += '  <td class="correos" id="' + response.data.email +  '">' + response.data.email +  '</td>';
      item += '  <td class="roles" id="' + response.data.rol +  '">' + response.data.rol +  '</td>';
      item += '  <td><button class="btn btn-danger btn-borrar">BORRAR</button></td>';
      item  += '</tr>';
      _tbody.append(item);
    })
    .catch(function (error) {
      console.log(error);
      alert(error.response.data);
    })
    .finally(function () {
        console.log("adios");
        $( "#boton_agregar" ).removeAttr("disabled");
        $( "#modalForm" ).modal('hide');

    });
  });    



  $("#tabla_user > tbody").on("click", ".btn-borrar" , function() {
    $(this).attr("disabled", "disabled");
    axios.delete('/Users/' + this.parentElement.parentElement.id)
    .then(function (response) {
      _tr = $("#tabla_user > tbody > #" + response.data.id); 
      _tr.remove();
    })
    .catch(function (error) {
      console.log(error);
      alert(error.response.data);
    });
  });

  $("#tabla_user > tbody").on("dblclick", ".nombres" , function() {
    if(MostrandoInput) return;
    else MostrandoInput=true;
    _id = this.parentElement.id;
    _valor = this.innerText;
    _input = '<input type="text" class="txtnombres form-control" id="'+ _id +'" value="'+ _valor +'">';
    this.innerHTML = _input;
  });
  $("#tabla_user > tbody").on("dblclick", ".correos" , function() {
    if(MostrandoInput) return;
    else MostrandoInput=true;
    _id = this.parentElement.id;
    _valor = this.innerText;
    _input = '<input type="text" class="txtcorreos form-control" id="'+ _id +'" value="'+ _valor +'">';
    this.innerHTML = _input;
  });
  $("#tabla_user > tbody").on("dblclick", ".roles" , function() {
    if(MostrandoInput) return;
    else MostrandoInput=true;
    _id = this.parentElement.id;
    _valor = this.innerText;
    _input = '<select class="txtrol" id="'+ _id +'">';
    _input += '<option>Operativo</option>';
    _input += '<option>Directivo</option>';
    _input += '<option>Administrador</option>';
    _input += '<option>Gerente</option>';
    _input += '<option selected>'+ _valor +'</option>';                
    _input += '</select>';
    this.innerHTML = _input;
  });


  $("#tabla_user > tbody").on("keydown", ".txtnombres" , function(even) {
    if ( event.which == 13 ) {
      event.preventDefault();
      axios.put('/Users/' + this.id, {
          name: this.value,
          _token: '{{ csrf_token() }}',
      })
      .then(function (response) {
        _td = $("#tabla_user > tbody > #" + response.data.id + ' > td.nombres');
        _td.text(response.data.name); 
      })
      .catch(function (error) {
        console.log(error);
        alert(error.response.data);
      });
      MostrandoInput=false;
    }
    if ( event.which == 27 ){
      this.parentElement.innerText = this.parentElement.id;
      MostrandoInput=false;
    }
    

  });
  $("#tabla_user > tbody").on("keydown", ".txtcorreos" , function(even) {
    if ( event.which == 13 ) {
      event.preventDefault();
      axios.put('/Users/' + this.parentElement.parentElement.id, {
          email: this.value,
          _token: '{{ csrf_token() }}',
      })
      .then(function (response) {
        _td = $("#tabla_user > tbody > #" + response.data.id + ' > td.correos');
        _td.text(response.data.email); 
      })
      .catch(function (error) {
        console.log(error);
        alert(error.response.data);
      });
      MostrandoInput=false;
    }
    if ( event.which == 27 ){
      this.parentElement.innerHTML = this.parentElement.id;
      MostrandoInput=false;
    }
  });
  $("#tabla_user > tbody").on("keydown", ".roles" , function(even) {
    if ( event.which == 13 ) {
      event.preventDefault();

      axios.put('/Users/' + this.parentElement.id, {
          rol: this.children[0].value,
          _token: '{{ csrf_token() }}',
      })
      .then(function (response) {
        _td = $("#tabla_user > tbody > #" + response.data.id + ' > td.roles');
        _td.text(response.data.rol); 
      })
      .catch(function (error) {
        console.log(error);
        alert(error.response.data);
      });
      MostrandoInput=false;
    }
    if ( event.which == 27 ){

      this.innerText = this.id;
      MostrandoInput=false;
    }
  });

</script>

@endsection