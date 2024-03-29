@extends('adminlte::page')

@section('title', '| Proyectos')

@section('plugins.Sweetalert2', true)
@section('plugins.Bs-stepper', true)
@section('plugins.Toastr', true)
@section('plugins.Inputmask', true)
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
    <strong>SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES (SIGEPSI) 2.0v </strong>
    </h3>
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Proyectos</strong></h1>
  </div>
</div>
@csrf
<div class="card border-dark">
  <div class="card-body text-dark">
    @can('proyecto.create')
    <a href="{{ route('proyecto.create') }}" class="btn btn-success">Añadir nuevo proyecto</a>
    <hr>
    @endcan

    <div class="container">
        <div class="row justify-content-center" id="btn-search">
            <div class="col-1,5">
                <button class="btn btn-block btn-info" type="button" value="Todos">Todos</button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-primary btn-block" type="button" value="Por validar"><strong>Por validar</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-success btn-block" type="button" value="En desarrollo"><strong>En desarrollo</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-warning btn-block" type="button" value="En correccion"><strong>En corrección</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-info btn-block" type="button" value="Socializado"><strong>Socializados</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-danger btn-block" type="button" value="Rechazado"><strong>Rechazados</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-success btn-block" type="button" value="Culminado"><strong>Culminados</strong></button>
            </div>
            <div class="col-1,5">
                <button class="btn btn-outline-danger btn-block" type="button" value="Cancelado"><strong>Cancelados</strong></button>
            </div>
          </div>
    </div>

    <hr>
    <table id="example" class="table table-striped table-bordered nowrap"  style="width:100%">
                <thead>
                    <tr>

                        <th>N°</th>
                        <th>Proyecto</th>
                        <th>Carrera</th>
                        <th>Linea de investigación</th>
                        <th>Estado</th>
                        <th>Progreso %</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
            <tbody>

                @foreach ($proyecto as $proyectos)
                <tr>
                    <td>{{ $proyectos->id }}</td>
                    <td>{{ $proyectos->titulo }}</td>
                    <td>{{ $proyectos->carrera }}</td>
                    <td>{{ $proyectos->linea_investigacion }} </td>
                    <td>{{ $proyectos->estatus_proyecto }} </td>
                    <td>
                        <div class="progress" style="height:15px">
                            <div id="bar_'.$producto->id.'" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width:{{ $proyectos->progreso }}%;">
                                <p style='margin-top:15px;font-size:12px'><span>{{ $proyectos->progreso }}</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            
                            <a class="btn btn-info" href="{{ route('proyecto.show', $proyectos->id ) }}">Actualizar<a>
                            {{-- <a class="btn btn-info" href="{{ route('proyecto.index', $proyectos->id ) }}">Corregir<a> --}}

                                @if ($proyectos->progreso != 100)
                                    <a href="/evaluar/{{ $proyectos->id }}"class="btn btn-info">Evaluar</a>
                                @endif
                            
                            <a class="btn btn-primary" href="{{ route('proyecto.show', Crypt::encryptString($proyectos->id) ) }}">Ver<a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
  </div>
</div>

@stop

@include('layouts.footer')

@section('js')
    <script>
        function getMunicipio(e) {
            $.ajax({
                type: "POST",
                url: "municipios",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "texto" : e.target.value
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione su municipio</option>";
                    for (let i in response.lista) {
                        opciones+= '<option value="'+response.lista[i].id_municipio+'">'+response.lista[i].municipio+'</option>';
                    }
                    $("#id_municipio").empty().append(opciones);
                    $("#id_parroquia").empty();
                }
            });
        }
        function getParroquia(e) {
            $.ajax({
                type: "POST",
                url: "parroquias",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "texto" : e.target.value
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione su parroquia</option>";
                    for (let i in response.lista) {
                        opciones+= '<option value="'+response.lista[i].id_parroquia+'">'+response.lista[i].parroquia+'</option>';
                    }
                    $("#id_parroquia").empty().append(opciones);
                }
            });
        }
    </script>

    @if(session('respuesta')=='creado')
    <script>
    Swal.fire(
    'Creado',
    'El proyecto se ha registrado satisfactoriamente.',
    'success')
    </script>
    @endif

    @if(session('respuesta')=='evaluado')
    <script>
    Swal.fire(
    'Evaluado',
    'El proyecto se ha evaluado con éxito.',
    'success')
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
$(document).ready(function() {
        $("#formEdit").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/SaveEditcomunid",
                async: false,
                cache: false,
                data: $("#formEdit").serialize(),
                success: function(response){
                    Swal.fire({
                        title: 'Datos actualizados',
                        text: "Proceso exitoso",
                        icon: 'success',
                    })
                    location.reload();
                }
            });
        });
        var table = $('#example').DataTable( {
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
            },
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
            }
        });
        $('#btn-search').on( 'click', 'button',(e)=> {
            var valor = $(this)[0].activeElement.value;
            if (valor=="Todos") {
                table.search('').columns([4, 5]).search('').draw();
            }else{
                table.column([4, 5]).search(valor).draw();
            }
            
        });
    });

      // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
</script>
@stop
