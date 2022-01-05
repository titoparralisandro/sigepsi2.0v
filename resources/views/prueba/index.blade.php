@extends('adminlte::page')

@section('title', 'Listar')

@section('plugins.Sweetalert2', true)

@section('plugins.Toastr', true)

@section('plugins.Datatables', true)

@section('content_header')
<div><img src="{{ asset('images/cintillo.svg') }}" alt="cintillo"></div>
<br>
<div class="bg-primary color-palette"><h1 class="text-center"><strong>Pruebas</strong></h1></div>
@stop

@section('content')
  <a class="btn btn-primary" href="{{ route('prueba.create') }}">Crear Prueba</a>
  <hr>

                <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Cédula</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($prueba as $pruebas)
                    <tr>
                      <td>{{ $pruebas->id }}</td>
                      <td>{{ $pruebas->name }}</td>
                      <td>{{ $pruebas->apellido }}</td>
                      <td>{{ $pruebas->cedula }}</td>
                      <form  class="eliminar" action="{{ route('prueba.destroy', $pruebas->id ) }}" method="POST">
                      @csrf
                      <!-- @ method('DELETE') -->
                      {{ method_field('DELETE') }}
                      <td><a class="btn btn-success" href="{{ route('prueba.show', $pruebas->id ) }}">Ver</a> | <a class="btn btn-warning" href="{{ route('prueba.edit', $pruebas->id ) }}">Editar</a> |  <button type="submit" class="btn btn-danger" href="">BORRAR</button></td>
                      </form>
                    </tr>
                    @endforeach

                  </tbody>
                </table>

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
@if(session('respuesta')=='creado')
<script>
toastr.success('Prueba, ha sido creada.')
</script>
@endif

@if(session('respuesta')=='eliminado')
<script>
  Swal.fire(
  'Eliminado!',
  'El registro se ha eliminado con éxito.',
  'success'
  ) 
</script>
@endif

@if(session('respuesta')=='editado')
<script>
toastr.info('Prueba, se ha editado correctamente.')
</script>
@endif

<!-- page script -->
<script>
    //toastr.success("Hello World!");
    
$('.toastrDefaultSuccess').click(function() {
  toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
});

/*
  Swal.fire(
    'Prueba Creada!',
    '¡Creado sastifactoriamente!',
    'success'
    )

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

*/

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
/*
$("#example1").DataTable({
  "responsive": true,
  "autoWidth": false,
"language": {
  //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  "url": "dist/css/Spanish.json"
}
});

$("#example1").DataTable({
  "responsive": true, "lengthChange": true, "autoWidth": true,
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
  //"language": { "url": "./Spanish.json"}
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
*/
$(function () {
$("#example1").DataTable({
  "responsive": true, "lengthChange": true, "autoWidth": true,
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
  //"language": {"url": "./Spanish.json"}
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