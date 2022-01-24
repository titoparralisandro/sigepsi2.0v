@extends('adminlte::page')
@section('title', 'Asignar Rol')
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Asignar un Rol</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabla de roles</h3>
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

<form action="{{ route('usuarios.update', $user) }}" method="POST">
  @csrf
  @method('put')
  <div class="form-group">
  <label class="form-label">Nombre</label>
  <input id="name" class="form-control" type="text" name="name" value="{{ isset($user->name)?$user->name:old('name') }}">
  </div>

  <div class="form-group">
  <label class="form-label">Email</label>
  <input name="email" class="form-control" type="text" value="{{isset($user->email)?$user->email:old('email')}}">
  </div>

  <div class="form-group">
  <label class="form-label">role</label>
  <select id="role" name="role" class="form-control">
    @foreach( $roles as $key => $value )
      <option value="{{ $key }}">{{ $value->name }}</option>
    @endforeach
   </select>
</div>

<a href="{{ route('usuarios.index') }}" class="btn btn-info">Cancelar</a>
<button type="submit" class="btn btn-primary">Actualizar</button>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
      //"copy", "csv", "excel", "pdf", "print", "colvis"
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(".eliminar").submit(function(e){
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