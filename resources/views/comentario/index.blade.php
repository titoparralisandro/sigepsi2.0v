@extends('adminlte::page')
@section('title', '| Comentarios')
@section('plugins.Sweetalert2', true)
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

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <h3 style="color: #007bce;font-weight: normal;font-size: 20px;font-family: Arial;text-transform: uppercase;">
    <strong>SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES (SIGEPSI) 2.0v</strong>
    </h3>
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Comentarios</strong></h1>
  </div>
</div>

<div class="card border-dark">
  <div class="card-body text-dark">
    <table id="example1" class="table table-striped table-bordered nowrap"  style="width:100%">
      <thead>
        <tr>
          <th>N°</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Comentarios</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comentarios as $comentario)
        <tr>
          <td>{{ $comentario->id }}</td>
          <td>{{ $comentario->name }}</td>
          <td>{{ $comentario->email }}</td>
          <td>{{ $comentario->comentario }}</td>
          <td>
          <form id="eliminar" class="eliminar" action="{{ route('comentario.destroy', $comentario->id ) }}" method="POST">
          @csrf
          <!-- @ method('DELETE') -->
          {{ method_field('DELETE') }}

          <a class="btn btn-primary" href="{{ route('comentario.show', $comentario->id ) }}">Mostrar</a> | <button type="submit" class="btn btn-danger" href="">Eliminar</button>

          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/a_cerca_de')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>
@stop

@section('js')

    @if(session('respuesta')=='eliminado')
    <script>
    Swal.fire(
    'Eliminado!',
    'Se elimino el comentario seleccionado.',
    'success')
    </script>
    @endif

<script>
$("#eliminar").submit(function(e){
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
/*    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
      )
*/
      this.submit();
    }
  })

});


$(function () {
$("#example1").DataTable({
  "responsive": true, "lengthChange": true, "autoWidth": true,
   "language": {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
  },
  "oAria": {
    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
},
  //"language": {"url": "./Spanish.json"}
  //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true, //"lengthChange": false,
    "searching": true, //"searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": true, //"autoWidth": false,
    "responsive": true,
    "language": { "url": "./Spanish.json"},
  });
});
</script>
@stop
