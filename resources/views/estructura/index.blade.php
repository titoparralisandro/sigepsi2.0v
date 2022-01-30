@extends('adminlte::page')

@section('title', '| Estrcutura')

@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)
@section('plugins.Datatables', true)

@section('content_header')
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <h3 style="color: #007bce;font-weight: normal;font-size: 20px;font-family: Arial;text-transform: uppercase;">
    <strong>SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES (SIGEPSI) 2.0v</strong>
    </h3>
</div>
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Estructuras Evaluativas</strong></h1>
  </div>
</div>
<div class="card border-dark">

  <div class="card-body text-dark">
    <a class="btn btn-success" href="{{ route('estructura.create') }}">Añadir Nueva Estructura</a>
    <hr>
                  <table id="example1" class="table table-head-fixed text-nowrap ">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Carrera</th>
                        <th>Linea de Investigación</th>
                        <th>Producto</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($estructura as $estruct)
                        <tr>
                            <td>{{ $estruct->id }}</td>
                            <td>{{ $estruct->carrera }}</td>
                            <td>{{ $estruct->linea_investigacion }}</td>
                            <td>{{ $estruct->producto}} </td>
                            <td>
                                @if ($estruct->activa)
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('estructura.show', $estruct->id ) }}">Ver</a>
                                        <button class="btn btn-danger" onclick="deshabilitar({{$estruct->id}})">Deshabilitar</button>
                                        <a class="btn btn-info" href="{{ route('estructura.edit', $estruct->id ) }}">Editar</a>
                                    </div>
                                @endif
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

@if(session('respuesta')=='creado')
    <script>
        toastr.success('Registro creado con éxito.')
    </script>
@endif

@if(session('respuesta')=='eliminado')
    <script>
        Swal.fire(
            'Eliminado!',
            'Registro eliminado con éxito.',
            'success'
        )
    </script>
@endif

@if(session('respuesta')=='editado')
<script>
toastr.info('Registro editado con éxito..')
</script>
@endif

<script>
function deshabilitar(id) {
    $.ajax({
        type: "POST",
        url: "/DeshEstruc",
        async: false,
        cache: false,
        data: {
            "_token": "{{ csrf_token() }}",
            "id" : id
        },
        success: function(response){
            Swal.fire({
                title: 'Registro deshabilitado con éxito',
                text: "Proceso exitoso",
                icon: 'success',
            })
            window.location.href = "/estructura";
        }
    });
}

$('.toastrDefaultSuccess').click(function() {
  toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
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
