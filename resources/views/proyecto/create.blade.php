@extends('adminlte::page')

@section('title', '| Proyecto')

@section('plugins.Select2', true)
@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Bs-stepper', true)
@section('plugins.Inputmask', true)

@section('content_header')

  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h2 class="card-title">Registrar nuevo proyecto</h2>
        </div>
        <div class="card-body p-0">
          <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Información del proyecto</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Información de la comunidad</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#equipo-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="equipo-part" id="equipo-part-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Equipo del proyecto</span>
                        </button>
                    </div>
                </div>
            <div class="bs-stepper-content">
                <!-- your steps content here -->

                <form action="{{ route('proyecto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        {{-- cuerpo del primer formulario --}}
                        <input id="id_estatus_proyecto" class="form-control" type="hidden" name="estatus" value="1">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Escribe el titulo de tu proyecto."
                            value="{{ isset($proyecto->titulo)?$proyecto->titulo:old('titulo') }}">
                        </div>
                        <div class="form-group">

                            <label class="form-label">Resumen o Sinopsis</label>
                            <textarea id="sinopsis" class="form-control" name="sinopsis" cols="25" rows="4"
                            value="{{ isset($proyecto->sinopsis)?$proyecto->sinopsis:old('sinopsis') }}" placeholder="Escriba tu resumen o sinopsis de tu proyecto."></textarea>
    
                        </div>
                        <div class="row">
                            <div class="form-group col col-6">
                                <label class="form-label">Fecha inicio</label>
                                <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio"
                                value="{{ isset($proyecto->fecha_inicio)?$proyecto->fecha_inicio:old('fecha_inicio') }}">
                            </div>
                            <div class="form-group col col-6">
                                <label class="form-label">Fecha fin</label>
                                <input class="form-control" type="date" name="fecha_fin" id="fecha_fin"
                                value="{{ isset($proyecto->fecha_fin)?$proyecto->fecha_fin:old('fecha_fin') }}">
                            </div>
                            <div class="w-100"></div>
                            <div class="form-group col col-4">
                                <label class="form-label">trayecto</label>
                                <select name="id_trayecto" id="id_trayecto" style="width: 100%"></select>
                            </div>
                            <div class="form-group col col-8">
                                <label class="form-label">Carrera</label>
                                <select name="id_carrera" id="id_carrera" style="width: 100%"></select>
                            </div>
                            <div class="form-group col col-6" >
                                <label class="form-label">Especialidad</label>
                                <select name="id_especialidad" id="id_especialidad" style="width: 100%"></select>
                            </div>
                            <div class="form-group col col-6">
                                <label class="form-label">Linea de investigación</label>
                                <select name="id_lineas_investigacion" id="id_lineas_investigacion" style="width: 100%"></select>
                            </div>
                        </div>
                        <a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                        {{-- segundo parte del form --}}
                        <div class="row">
                            <div class="form-group col-2" style="  display: flex; align-items: center; justify-content: center;">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addComunidad">Seleccionar comunidad</button>
                            </div>
                            <div class="form-group col-10">
                                <input type="text" id="id_comunidad" name="id_comunidad" hidden>
                                <input type="text" class="form-control" id="comunidad" name="comunidad" disabled>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="addComunidad" tabindex="-1" role="dialog" aria-labelledby="addComunidad" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">

                                        <div class="modal-header card-header bg-primary">

                                            <div class="color-palette">
                                              <h1 class="text-center" id="addComunidadLabel"><strong>Filtro de comunidades</strong></h1>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label">Estado</label>
                                                <select name="id_estado" id="id_estado" class="form-control">
                                                <option selected>Seleccionar su estado</option>
                                                    @foreach ($estados as $item)
                                                    <option value="{{$item->id_estado}}">{{$item->estado}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label class="form-label">Municipio</label>
                                                <select name="id_municipio" id="id_municipio" class="form-control"></select>
                                            </div>
                                            <div class="form-group col">
                                                <label class="form-label">Parroquia</label>
                                                <select name="id_parroquia" id="id_parroquia" class="form-control"></select>
                                            </div>

                                            <div class="col-12 w-100">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>N°</th>
                                                            <th>Comunidad</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body_table">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label">Estado</label>
                                <select name="id_estadoP" id="id_estadoP" class="form-control">
                                <option selected>Seleccionar su estado</option>
                                    @foreach ($estados as $item)
                                    <option value="{{$item->id_estado}}">{{$item->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="form-label">Municipio</label>
                                <select name="id_municipioP" id="id_municipioP" class="form-control"></select>
                            </div>
                            <div class="form-group col">
                                <label class="form-label">Parroquia</label>
                                <select name="id_parroquiaP" id="id_parroquiaP" class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" cols="25" rows="2"
                            value="{{ isset($proyecto->direccion)?$proyecto->direccion:old('direccion') }}" placeholder="Escribe la dirección de donde vas a ejecutar o implementar tu solución."></textarea>
                        </div>

                        <a class="btn btn-primary" onclick="stepper.previous()">Anterior</a>
                        <a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>
                    </div>
                    <div id="equipo-part" class="content" role="tabpanel" aria-labelledby="equipo-part-trigger">

                        <div class="row">
                            <div class="col-12 w-100">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAlumno">Agregar alumno</button>
                                <!-- Modal -->
                                <div class="modal fade" id="addAlumno" tabindex="-1" role="dialog" aria-labelledby="addAlumno" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header card-header bg-primary">

                                                <div class="color-palette">
                                                  <h1 class="text-center" id="addAlumnoLabel"><strong>Seleccionar integrantes de equipo</strong></h1>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label class="form-label">Buscar</label>
                                                        <input type="text" id="q" name="q" class="form-control" placeholder="Ingrese la cedula o el nombre del alumno">
                                                    </div>
                                                    <div class="col-12 w-100">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>N°</th>
                                                                    <th>Cédula</th>
                                                                    <th>Alumno</th>
                                                                    <th>Trayecto</th>
                                                                    <th>Opción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="table_Alumno_Tmp">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cédula</th>
                                            <th>Alumno</th>
                                            <th>Trayecto</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_Alumno">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div id="divProducto"></div>

                        <a class="btn btn-primary" onclick="stepper.previous()">Anterior</a>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
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
        var incre = 0;
        function selectAlumno(id,name,trayecto,cedula) {
            var html = "";
            if (incre>=1 && incre<5) {
                html +="<tr id='Alumno_"+id+"'>";
                html +="<td><input type='text' id='AlumnosId[]' name='AlumnosId[]' class='form-control' readonly value='"+id+"'></td>";
                html +="<td><input type='text' id='AlumnosCedula[]' name='AlumnosCedula[]' class='form-control' readonly value='"+cedula+"'></td>";
                html +="<td><input type='text' id='AlumnosNombres[]' name='AlumnosNombres[]' class='form-control' readonly value='"+name+"'></td>";
                html +="<td><input type='text' id='AlumnosTrayecto[]' name='AlumnosTrayecto[]' class='form-control' readonly value='"+trayecto+"'></td>";
                html +="<td><button class='btn btn-primary' type='button' onclick='removeItem(Alumno_"+id+")'><i class='fa fa-trash'></i></button></td>";
                html +="</tr>";
                incre++;
                $("#table_Alumno").append(html);
            }else{
                if (incre==0) {
                    html +="<tr id='Alumno_"+id+"'>";
                    html +="<td><input type='text' id='AlumnosId[]' name='AlumnosId[]' class='form-control' readonly value='"+id+"'></td>";
                    html +="<td><input type='text' id='AlumnosCedula[]' name='AlumnosCedula[]' class='form-control' readonly value='"+cedula+"'></td>";
                    html +="<td><input type='text' id='AlumnosNombres[]' name='AlumnosNombres[]' class='form-control' readonly value='"+name+"'></td>";
                    html +="<td><input type='text' id='AlumnosTrayecto[]' name='AlumnosTrayecto[]' class='form-control' readonly value='"+trayecto+"'></td>";
                    html +="<td><button class='btn btn-primary' type='button' onclick='removeItem(Alumno_"+id+")'><i class='fa fa-trash'></i></button></td>";
                    html +="</tr>";
                    incre++;
                    $("#table_Alumno").append(html);
                }else{
                    alert("No se permiten mas de 5 estudiantes en un equipo de proyecto")
                }

            }
        }
        function removeItem(id) {
            id.remove();
        }
        function selectComunid(id,name) {
            $("#id_comunidad")[0].value = id;
            $("#comunidad")[0].value = name;
            $('#addComunidad').modal('hide');
        }
        $("#q").change(function(e){
            var carrera = $("#id_especialidad")[0].value;

            $.ajax({
                type: "POST",
                url: "/getalumnos",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "carrera": carrera,
                    "q" : e.target.value
                },
                beforeSend: function() {
                    $("#table_Alumno_Tmp").empty().append("<tr><td colspam='5'><h2>Cargando</h2></td></tr>");
                },
                success: function(response){
                    $("#table_Alumno_Tmp").empty().append(response);
                }
            });
        });
        $("#id_producto").select2({
            ajax: {
                url: '/getdataEstruc/producto',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
        $("#id_carrera").select2({
            ajax: {
                url: '/getdataEstruc/carrera',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
        $("#id_lineas_investigacion").select2();
        $("#id_carrera").change((e)=> {
            var valor =e.target.value;
            $.ajax({
                type: "POST",
                url: "/getdataInvest",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":valor
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione una opción</option>";
                    for (let i in response) {
                        opciones+= '<option value="'+response[i].id+'">'+response[i].text+'</option>';
                    }
                    $("#id_lineas_investigacion").empty().append(opciones);
                }
            });
        });
        $("#id_especialidad").select2();
        $("#id_carrera").change((e)=> {
            var valor =e.target.value;
            $.ajax({
                type: "POST",
                url: '/getdataEspe',
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":valor
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione una opción</option>";
                    for (let i in response) {
                        opciones+= '<option value="'+response[i].id+'">'+response[i].text+'</option>';
                    }
                    $("#id_especialidad").empty().append(opciones);
                }
            });
        });
        $("#id_trayecto").select2({
            ajax: {
                url: '/getdataEstruc/trayecto',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
        $("#id_estado").change(function(e){
            $.ajax({
                type: "POST",
                url: "/getmunicipios",
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
        });
        $("#id_estadoP").change(function(e){
            $.ajax({
                type: "POST",
                url: "/getmunicipios",
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
                    $("#id_municipioP").empty().append(opciones);
                    $("#id_parroquiaP").empty();
                }
            });
        });
        $("#id_municipioP").change(function(e){
            $.ajax({
                type: "POST",
                url: "/getparroquias",
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
                    $("#id_parroquiaP").empty().append(opciones);
                }
            });
        });
        $("#id_municipio").change(function(e){
            $.ajax({
                type: "POST",
                url: "/getparroquias",
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
        });
        $("#id_parroquia").change(function(e){
            var estado = $("#id_estado")[0].value;
            var municipio = $("#id_municipio")[0].value;
            var parroquia = e.target.value;
            $.ajax({
                type: "POST",
                url: "/getcomunidad",
                async: false,
                cache: false,
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "estado" : estado,
                    "municipio" : municipio,
                    "parroquia" : parroquia
                },
                success: function(response){
                    $("#body_table").empty().append(response);
                }
            });
        });
    // BS-Stepper Init
    var stepperElement = document.querySelector('.bs-stepper');
    var stepper = new Stepper(stepperElement);
    var currentIndex = stepper._currentIndex;

    stepperElement.addEventListener('shown.bs-stepper', function (event) {
        if (event.detail.indexStep == 2) {
            var especialidad = $("#id_carrera")[0].value;
            var lineas_investigacion = $("#id_lineas_investigacion")[0].value;
            $.ajax({
                type: "POST",
                url: "/getProducto",
                async: false,
                cache: false,
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "especialidad" : especialidad,
                    "lineas_investigacion" : lineas_investigacion
                },
                success: function(response){
                    $("#divProducto").empty().append(response);
                }
            });
        }
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

</script>
@stop
