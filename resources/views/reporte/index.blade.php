@extends('adminlte::page')
@section('title', 'Reportes')
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)
@section('plugins.Datatables', true)


@section('content_header')
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Reporte de Proyectos</strong></h1> 
  </div>
</div>

<div class="card border-dark">
  <div class="card-body text-dark">

<a class="btn btn-danger" target="_blank" href="{{route('reporte.pdf')}}">Formato PDF</a>

<hr>

    <table id="example1" class="table table-striped table-bordered nowrap"  style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Proyecto</th>
                        <th>Carrera</th>
                        <th>Linea de investigación</th>
                        <th>Progreso</th>
                    </tr>
                </thead>
            <tbody>

                @foreach ($proyecto as $proyectos)
                <tr>
                    <td>{{ $proyectos->id }}</td>
                    <td>{{ $proyectos->titulo }}</td>
                    <td>{{ $proyectos->carrera }}</td>
                    <td>{{ $proyectos->linea_investigacion }} </td>
                    <td>
                        <div class="progress" style="height:15px">
                            <div id="bar_'.$producto->id.'" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width:{{ $proyectos->progreso }}%;">
                                <p style='margin-top:15px;font-size:12px'><span>{{ $proyectos->progreso }}</span>/100</p>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
<hr>
  </div>
</div>
@stop

@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
      //"buttons": ["copy", "excel", "pdf", "print", "colvis"]
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