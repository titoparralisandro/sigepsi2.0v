@extends('adminlte::page')

@section('title', ' Líneas de Investigación')

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

<?php
use App\Models\Carrera;
$carrera =  Carrera::all();
?>


@section('content_header')

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <h3 style="color: #007bce;font-weight: normal;font-size: 20px;font-family: Arial;text-transform: uppercase;">
    <strong>SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES (SIGEPSI) 2.0v</strong>
    </h3>
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Líneas de investigación</strong></h1>
  </div>
</div>

<div class="card border-dark">

  <div class="card-body text-dark">

            <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nueva linea de investigación</button>

    <hr>
        <table id="example" class="table table-striped table-bordered nowrap"  style="width:100%">
                <thead>
                    <tr>

                        <th>N°</th>
                        <th>Linea de Investigación</th>
                        <th>Carrera</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
            <tbody>
                @foreach ($lineas_investigacion as $lineas_investigaciones)
                        @include('lineas_investigacion.modal.edit')
                        @include('lineas_investigacion.modal.show')
                <tr>

                    <td>{{ $lineas_investigaciones->id }}</td>
                    <td>{{ $lineas_investigaciones->linea_investigacion }}</td>
                    <td>{{ $lineas_investigaciones->carreras->carrera }} </td>
                    <td>
                        <button  href="#"  class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-show{{$lineas_investigaciones->id}}">Ver</button> |
                        <button  href="#"  class="btn btn-info" type="button" data-toggle="modal" data-target="#modal-edit{{$lineas_investigaciones->id}}">Editar</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
  </div>
</div>

@include('lineas_investigacion.modal.create')
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
    'success')
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
    text: "¡Esta acción no se puede deshacer!",
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

$(document).ready(function() {
    $('#example').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
} );

$(function () {
    // $('#example3').DataTable({
    // responsive: true;
    // autoWidth: false;
    // "lenguage": {
    //     "lengthMenu":       "Mostrar " +
    //                         `<select class="custom-select custom-sm form-control form-control-sm">
    //                             <option value = '5'>5</option>
    //                             <option value = '10'>10</option>
    //                             <option value = '20'>20</option>
    //                             <option value = '30'>30</option>
    //                             <option value = '50'>50</option>
    //                             <option value = '-1'>Todos</option>
    //                         </select> ` +
    //                         "_MENU_ registros",
	//     "zeroRecords":    "No se encontraron resultados",
	//     "emptyTable":     "Ningún dato disponible en esta tabla",
	//     "info":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	//     "infoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	//     "infoFiltered":   "(filtrado de un total de _MAX_ registros)",
	//     "search":         "Buscar:",
    // }
    //   });
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
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

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
