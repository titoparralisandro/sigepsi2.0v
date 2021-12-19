@extends('adminlte::page')

@section('title', 'Estatus')

@section('plugins.Sweetalert2', true)

@section('plugins.Toastr', true)

@section('plugins.Datatables', true)

@section('content_header')



<div class="card-header bg-primary ">
    <div class="color-palette">
      <h1 class="text-center"><strong>Estatus de las necesidades</strong></h1>
    </div>
  </div>

  <div class="card border-dark">

    <div class="card-body text-dark">
      <a class="btn btn-success" href="{{ route('estatus_necesidades.create') }}">Añadir nuevo estatus de necesidades</a>
      <hr>
                    <table id="example1" class="table table-head-fixed text-nowrap ">
                      <thead>
                        <tr>

                            <th>N°</th>
                            <th>Estatus de Necesidades</th>
                            <th>Opciones</th>

                      </tr>
                      </thead>
                      <tbody>

                        @foreach ($estatus_necesidad as $estatus_necesidades)
                        <tr>
                          <td>{{ $estatus_necesidades->id }}</td>
                          <td>{{ $estatus_necesidades->estatus_necesidad }}</td>
                          <td><a class="btn btn-primary" href="{{ route('estatus_necesidades.show', $estatus_necesidades->id ) }}">Ver</a> | <a class="btn btn-info" href="{{ route('estatus_necesidades.edit', $estatus_necesidades->id ) }}">Editar</a></td>

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

<script>

$('.toastrDefaultSuccess').click(function() {
  toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
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
}
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
