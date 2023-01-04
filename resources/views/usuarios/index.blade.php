@extends('adminlte::page')
@section('title', 'Usuarios')
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)
@section('plugins.Datatables', true)

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
@section('content_header')


<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Usuarios</strong></h1>
  </div>
</div>

<div class="card border-dark">
    <div class="card-body text-dark">
    <a class="btn btn-info" href="{{route('usuarios.pdf')}}">PDF Usuarios</a> 
        <a class="btn btn-success" href="{{ route('usuarios.create') }}">Añadir nuevo Usuario</a>
        <hr>
        <!-- table table-striped table-bordered nowrap -->
        <table id="example1" class="table table-bordered table-hove"  style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Role</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                  @foreach($usuario->roles as $role)
                  <!-- dd($usuario) -->
                  <span>{{ $role->name }}</span>
                  @endforeach
                </td>
                <td>
<form  class="eliminar" action="{{ route('usuarios.destroy', $usuario ) }}" method="POST">
@csrf
<!-- @ method('DELETE') -->
{{ method_field('DELETE') }}
<a class="btn btn-warning" href="{{route('usuarios.edit', $usuario)}}">Editar</a>
<!--<a class="btn btn-success" href="{{route('usuarios.pdfusuario', $usuario)}}">PDF</a>-->
@can('usuarios.destroy')
<!--<button id="eliminar" type="submit" class="btn btn-danger">Borrar</button>-->
@endcan
</form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop


@section('js')

@if(session('respuesta')=='creado')
<script>
toastr.success('Usuario creado con éxito.')
</script>
@endif

@if(session('respuesta')=='editar')
<script>
toastr.success('Editado con éxito.')
</script>
@endif

@if(session('respuesta')=='eliminado')
<script>
  Swal.fire(
  'Eliminado!',
  'Usuario eliminado con éxito.',
  'success'
  )
</script>
@endif

@if(session('respuesta')=='editado')
<script>
toastr.info('Registro editado con éxito.')
</script>
@endif
    <script>
    $('.toastrDefaultSuccess').click(function() {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $(".eliminar").submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer.!",
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

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "pdf", "print", "colvis"],
      "language": {
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "zeroRecords": "Nada encontrado",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(Filtrado de _MAX_ registros totales)",
          "search": "Buscar",
          "paginate": {
            "previous": "Anterior",
            "next": "Siguiente"
          }
      },
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

</script>
@stop
