@extends('adminlte::page')

@section('title', ' Proyectos')

@section('plugins.Toastr', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Bs-stepper', true)
@section('plugins.Inputmask', true)

@section('content_header')
<form action="{{ route('proyecto.store') }}" method="POST" enctype="multipart/form-data">
<meta name="csrf-token" content="{{ csrf_token() }}">
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


                
              <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                
                {{-- cuerpo del primer formulario --}}
                <input id="id_estatus_proyecto" class="form-control" type="hidden" name="estatus" value="1">
                <div class="form-group">

                    <label class="form-label">Titulo</label>
                    <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Escribe el titulo de tu proyecto."
                    value="{{ isset($proyecto->titulo)?$proyecto->titulo:old('titulo') }}">
    
                </div>

                <div class="row">

                    <div class="form-group col col-3">
  
                        <label class="form-label">Fecha inicio</label>
                        <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" 
                        value="{{ isset($proyecto->fecha_inicio)?$proyecto->fecha_inicio:old('fecha_inicio') }}">
  
                    </div>
  
                    <div class="form-group col col-3">
  
                        <label class="form-label">Fecha fin</label>
                        <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" 
                        value="{{ isset($proyecto->fecha_fin)?$proyecto->fecha_fin:old('fecha_fin') }}">
  
                    </div>
  
                    <div class="form-group col col-6">
  
                        <label class="form-label">Especialidad</label>
  
                        <select name="id_especialidad" id="id_especialidad" class="form-control">
                        <option selected>Seleccionar su especialidad</option>
                            @foreach ($especialidad as $item)
                            <option value="{{$item->id_especialidad}}">{{$item->especialidad}}</option>
                            @endforeach
                        </select>
  
                    </div>
  
                </div>
  
                <div class="row">
  
                    <div class="form-group col col-4">
  
                        <label class="form-label">trayecto</label>
  
                        <select name="id_trayecto" id="id_trayecto" class="form-control">
                        <option selected>Seleccionar su trayecto</option>
                            @foreach ($trayecto as $item)
                            <option value="{{$item->id_trayecto}}">{{$item->trayecto}}</option>
                            @endforeach
                        </select>
  
                    </div>
  
                    <div class="form-group col">
  
                        <label class="form-label">Linea de investigación</label>
                        <select name="id_linea_investigacion" id="id_linea_investigacion" class="form-control">
                            <option selected>Seleccionar su linea investigación</option>
                            @foreach ($lineas_investigacion as $item)
                            <option value="{{$item->id_linea_investigacion}}">{{$item->linea_investigacion}}</option>
                            @endforeach
                        </select>
  
                    </div>
  
                </div>

                
                <a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>
              </div>

              <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                
                {{-- segundo parte del form --}}

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
                      <select name="id_parroquia" id="id_parroquia" class="form-control" value={{ isset($proyecto->id_parroquia)?$proyecto->id_parroquia:old('id_parroquia') }}></select>

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

                {{-- tercer parte del form --}}
</form>
                <a class="btn btn-primary" onclick="stepper.previous()">Anterior</a>
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- 
<div class="card-header  ">
    <div class="color-palette">
      <h1 class="text-center"><strong>Añadir nueva carrera</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="" method="POST">
            @csrf
            <div class="form-group">

                <label class="form-label">Titulo</label>
                <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Escribe el titulo de tu proyecto."
                value="{{ isset($proyecto->titulo)?$proyecto->titulo:old('titulo') }}">

            </div>

              <div class="form-group">

                  <label class="form-label">Situación</label>
                  <textarea id="situacion" class="form-control" name="situacion" cols="25" rows="3"
                  value="{{ isset($proyecto->situacion)?$proyecto->situacion:old('situación') }}" placeholder="Escribe la situación o problemática que afecta a tu comunidad."></textarea>

              </div>

              <div class="form-group">

                  <label class="form-label">Objetivo general</label>
                  <input id="objetivos_general" class="form-control" type="text" name="objetivos_general" placeholder="Escribe los objetivos pincipal de tu proyecto."
                  value="{{ isset($proyecto->objetivos_general)?$proyecto->objetivos_general:old('objetivos_general') }}">

              </div>

              <div class="form-group">

                  <label class="form-label">Objetivos específicos</label>
                  <textarea id="objetivos_especificos" class="form-control" name="objetivos_especificos" cols="25" rows="2"
                  value="{{ isset($proyecto->objetivos_especificos)?$proyecto->objetivos_especificos:old('objetivos_especificos') }}" placeholder="Escribe los objetivos especificos de tu proyecto."></textarea>

              </div>

              <div class="form-group">

                  <label class="form-label">Sinopsis</label>
                  <textarea id="sinopsis" class="form-control" name="sinopsis" cols="25" rows="2"
                  value="{{ isset($proyecto->sinopsis)?$proyecto->sinopsis:old('sinopsis') }}" placeholder="Escribe la sinopsis o resumen de tu proyecto."></textarea>

              </div>

              <input id="id_estatus_proyecto" class="form-control" type="hidden" name="estatus" value="1">

              <div class="form-group">

                  <label class="form-label">Conclusión</label>
                  <textarea id="conclusiones" class="form-control" name="conclusiones" cols="25" rows="2"
                  value="{{ isset($proyecto->conclusiones)?$proyecto->conclusiones:old('conclusiones') }}" placeholder="Escribe la conclusión de tu proyecto."></textarea>

              </div>

              <div class="form-group">

                  <label class="form-label">Recomendaciones</label>
                  <textarea id="recomendaciones" class="form-control" name="recomendaciones" cols="25" rows="2"
                  value="{{ isset($proyecto->recomendaciones)?$proyecto->recomendaciones:old('recomendaciones') }}" placeholder="Escribe las recomendaciones para tu proyecto y comunidad."></textarea>

              </div>

              <div class="row">

                  <div class="form-group col col-3">

                      <label class="form-label">Fecha inicio</label>
                      <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" 
                      value="{{ isset($proyecto->fecha_inicio)?$proyecto->fecha_inicio:old('fecha_inicio') }}">

                  </div>

                  <div class="form-group col col-3">

                      <label class="form-label">Fecha fin</label>
                      <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" 
                      value="{{ isset($proyecto->fecha_fin)?$proyecto->fecha_fin:old('fecha_fin') }}">

                  </div>

                  <div class="form-group col col-6">

                      <label class="form-label">Especialidad</label>

                      <select name="id_especialidad" id="id_especialidad" class="form-control">
                      <option selected>Seleccionar su especialidad</option>
                          @foreach ($especialidad as $item)
                          <option value="{{$item->id_especialidad}}">{{$item->especialidad}}</option>
                          @endforeach
                      </select>

                  </div>

              </div>

              <div class="row">

                  <div class="form-group col col-4">

                      <label class="form-label">trayecto</label>

                      <select name="id_trayecto" id="id_trayecto" class="form-control">
                      <option selected>Seleccionar su trayecto</option>
                          @foreach ($trayecto as $item)
                          <option value="{{$item->id_trayecto}}">{{$item->trayecto}}</option>
                          @endforeach
                      </select>

                  </div>

                  <div class="form-group col">

                      <label class="form-label">Linea de investigación</label>
                      <select name="id_linea_investigacion" id="id_linea_investigacion" class="form-control">
                          <option selected>Seleccionar su linea investigación</option>
                          @foreach ($lineas_investigacion as $item)
                          <option value="{{$item->id_linea_investigacion}}">{{$item->linea_investigacion}}</option>
                          @endforeach
                      </select>

                  </div>

              </div>

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
                      <select name="id_parroquia" id="id_parroquia" class="form-control" value={{ isset($proyecto->id_parroquia)?$proyecto->id_parroquia:old('id_parroquia') }}></select>

                  </div>

              </div>

              <div class="form-group">

                  <label class="form-label">Dirección</label>
                  <textarea id="direccion" class="form-control" name="direccion" cols="25" rows="2"
                  value="{{ isset($proyecto->direccion)?$proyecto->direccion:old('direccion') }}" placeholder="Escribe la dirección de donde vas a ejecutar o implementar tu solución."></textarea>

              </div>



          <a href="{{ route('proyecto.index') }}" class="btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div> --}}

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

    <script>
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('id_estado').addEventListener('change',(e)=>{
        fetch('municipios',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{

            var opciones ="<option value=''>Seleccione su municipio</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id_municipio+'">'+data.lista[i].municipio+'</option>';
            }
            document.getElementById("id_municipio").innerHTML = opciones;
            document.getElementById("id_parroquia").innerHTML = '';
        }).catch(error =>console.error(error));
    })

    document.getElementById('id_municipio').addEventListener('change',(e)=>{
        fetch('parroquias',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Seleccione su parroquia</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id_parroquia+'">'+data.lista[i].parroquia+'</option>';
            }
            document.getElementById("id_parroquia").innerHTML = opciones;
        }).catch(error =>console.error(error));
    
    
    })

    

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