@extends('adminlte::page')

@section('title', ' Proyectos')

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
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Proyectos</strong></h1>
  </div>
</div>
@csrf
<div class="card border-dark">
  <div class="card-body text-dark">
    <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nuevo proyecto</button>
    <a href="{{ route('proyecto.create') }}" class="btn btn-success">Añadir nuevo proyecto</a>

    <hr>

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
                        <th>Trayecto</th>
                        <th>Linea de investigación</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
            <tbody>
                @foreach ($proyecto as $proyectos)
                <tr>
                    <td>{{ $proyectos->id }}</td>
                    <td>{{ $proyectos->titulo }}</td>
                    <td>{{ $proyectos->especialidades->especialidad }}</td>
                    <td>{{ $proyectos->trayectos->trayecto }}</td>
                    <td>{{ $proyectos->linea_investigaciones->linea_investigacion }} </td>
                    <td>
                        <div class="btn-group">
                          <button class="btn btn-info" type="button" href="evaluar">Evaluar</button>
                          {{-- href="{{ route('proyecto.evaluar', $proyectos->id ) }}" --}}

                            {{-- <button class="btn btn-primary" type="button" onclick="getdata('{{ $comunidades->id }}')">Ver</button>
                            <button class="btn btn-info" type="button" onclick="editdata('{{ $comunidades->id }}')">Editar</button> --}}
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
  </div>
</div>

@stop

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
                    console.log(response)
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
    toastr.success('Prueba, ha sido creada.')
    </script>
    @endif

    @if(session('respuesta')=='eliminado')
    <script>
    Swal.fire(
    'Eliminado!',
    'El registro se ha eliminado con éxito.',
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
            }
        });
        $('#btn-search').on( 'click', 'button',(e)=> {
            var valor = $(this)[0].activeElement.value;
            if (valor=="Todos") {
                table.search('').columns(7).search('').draw();
            }else{
                table.column(7).search(valor).draw();
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
