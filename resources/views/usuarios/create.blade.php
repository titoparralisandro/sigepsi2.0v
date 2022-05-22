@extends('adminlte::page')
@section('title', 'Crear usuario')
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)
<!--section('plugins.Datatables', true)-->

@section('content_header')
    <h1>Crear Usuarios</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Nuevo usuario</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif

<form id="CheckPassword" class="eliminar"  action="{{ route('usuarios.store') }}" method="POST">
  @csrf
  <div class="form-group">
  <label class="form-label">Nombre</label>
  <input id="name" class="form-control" type="text" name="name" value="{{ isset($user->name)?$user->name:old('name') }}">
  </div>

  <div class="form-group">
  <label class="form-label">Email</label>
  <input name="email" class="form-control" type="text" value="{{isset($user->email)?$user->email:old('email')}}">
  </div>

  <div class="form-group">
  <label class="form-label">Password</label>
  <input onBlur="comprobarPassowrd();" type="password" class="form-control" name="password" id="password" class="form-control" value="{{isset($user->password)?$user->password:old('password')}}">
  </div>

  <div class="form-group">
  <label class="form-label">Escriba de nuevo el Password</label>
  <input onBlur="comprobarPassowrd();" type="password" class="form-control" name="password1" id="password1" class="form-control" value="">
  </div>

  <div class="form-group">
  <label class="form-label">Role</label>
  <select name="role" id="role" class="form-control">
  <option value="">-</option>
  @foreach($roles as $role)
  <option value="{{$role->name}} {{$role->name == old('role')?selected:''}} " >{{ $role->name }}</option>
  <!-- $role->id == old('roles_id')?selected : '' -->
  @endforeach
  </select>
  </div>

<a href="{{ route('usuarios.index') }}" class="btn btn-info">Cancelar</a>
<button id="formCheckPassword" type="submit" value="submit" class="btn btn-primary">Crear</button>
  </div>
</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0-rc
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
    </section>
    <!-- /.content -->


@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
<!-- Page specific script -->
<script>

  $("#eliminar").submit(function(e){
  e.preventDefault();
  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡Esta acción no tiene vuelta atrás!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Si, eliminar!',
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  })
  });

  function comprobarPassowrd() {
       if($('#password').val() !== $('#password1').val()) {
            // Aqui haces lo que quieres cuando no coinciden
            toastr.error('El password no coincide')
       }    
}

</script>

@if(session('respuesta')=='creado')
  <script>
    toastr.success('Role, se ha asignado correctamente.')
  </script>
@endif

@if(session('respuesta')=='eliminado')
  <script>
  Swal.fire('Eliminado!','El registro se ha eliminado con éxito.','success') 
  </script>
@endif

@if(session('respuesta')=='editado')
  <script>
    toastr.info('Prueba, se ha editado correctamente.')
  </script>
@endif

@stop