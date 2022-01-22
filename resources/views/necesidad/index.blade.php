@extends('adminlte::page')
@section('title', '| Necesidades')
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
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Necesidades</strong></h1>
  </div>
</div>

<div class="card border-dark">
  <div class="card-body text-dark">
    <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nueva necesidad</button>
    <hr>
    <table id="example1" class="table table-striped table-bordered nowrap"  style="width:100%">
      <thead>
        <tr>
          <th>N°</th>
          <th>Comunidad</th>
          <th>Contacto</th>
          <th>Estatus</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($necesidad as $necesidades)
        <tr>
          <td>{{ $necesidades->id }}</td>
          <td>{{ $necesidades->comunidades->nombre }}</td>
          <td>{{ $necesidades->comunidades->persona_contacto }} | {{ $necesidades->comunidades->telefono_contacto }}</td>
          <td>{{ $necesidades->estatus_necesidades->estatus_necesidad }}</td>
          <td><a class="btn btn-primary" href="{{ route('necesidad.show', $necesidades->id ) }}"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@include('necesidad.modal.create')

@stop

@section('js')

    @if(session('respuesta')=='creado')
    <script>
    Swal.fire(
    'Registrado!',
    'Se registro satisfactoriamente su necesidad.',
    'success')
    </script>
    @endif
    
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
