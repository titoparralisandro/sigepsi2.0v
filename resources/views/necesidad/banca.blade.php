@extends('adminlte::page')
@section('title', '| Necesidades')
@section('plugins.Sweetalert2', true)
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
    <h1 class="text-center"><strong>Banco de situaciones</strong></h1>
  </div>
</div>
<div class="card border-dark">
  <div class="card-body text-dark">
    <table id="example1" class="table table-striped table-bordered nowrap"  style="width:100%">
      <thead>
        <tr>
          <th>N°</th>
          <th>N° necesidad</th>
          <th>Carrera</th>
          <th>Linea de investigación</th>
          <th>Estatus</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($banca as $situacion)
        <tr>
          <td>{{ $situacion->id }}</td>
          <td>{{ $situacion->id_necesidad }}</td>
          <td>{{ $situacion->carreras->carrera }}</td>
          <td>{{ $situacion->lineas_investigaciones->linea_investigacion }}</td>
          <td>{{ $situacion->estatus_situaciones->estatus_situacion }}</td>
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
  <script>
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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
@stop