@extends('adminlte::page')

@section('title', '| Comunidades')
@section('plugins.Sweetalert2', true)
@section('plugins.Inputmask', true)
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

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Completar datos de la institucion u organización</strong></h1>
    </div>
</div>

  <div class="card border-dark">
    <form action="{{ route('home.store') }}" method="POST">
    <div class="card-body text-dark">
        
                
            @csrf
            <div class="row">
                    <div class="form-group col-4">

                      <label class="form-label">RIF</label>
                      <input id="rif" class="form-control" type="text" name="rif"  maxlength="10"
                      value="{{ isset($comunidad->rif)?$comunidad->rif:old('rif') }}">

                    </div>

                    <div class="form-group col-8">

                        <label class="form-label">Tipo de comunidad</label>

                        <select id="id_tipo_comunidad" name="id_tipo_comunidad" class="form-control">
                        <option selected>Seleccionar su tipo de comunidad</option>
                        @foreach ( $tipo_comunidad as $tipos_comunidades)

                            <option value="{{$tipos_comunidades->id}}">{{ $tipos_comunidades->tipo_comunidad }}</option>

                        @endforeach
                        </select>

                    </div>
                 </div>

                <div class="row">

                    <div class="form-group col">

                        <label class="form">Teléfono de contacto</label>
                        <input id="telefono_contacto" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono_contacto"
                        value="{{ isset($comunidad->telefono_contacto)?$comunidad->telefono_contacto:old('telefono_contacto') }}">

                    </div>

                    <div class="form-group col">

                        <label class="form">Persona de contacto</label>
                        <input id="persona_contacto" class="form-control" type="text" name="persona_contacto" maxlength="50"
                        value="{{ isset($comunidad->persona_contacto)?$comunidad->persona_contacto:old('persona_contacto') }}">

                    </div>

                    <div class="form-group col">

                        <label class="form">Correo (confirma tu correo)</label>
                        <input id="email" class="form-control" type="email" name="email">

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
                    <textarea id="direccion" class="form-control" name="direccion" cols="25" rows="4"
                    value="{{ isset($comunidad->direccion)?$comunidad->direccion:old('direccion') }}" placeholder="Escriba su dirección de forma detallada."></textarea>

                </div>

                </form>
                <button type="submit" class="btn btn-success">Guardar</button>

            </div>
        </div>

  </div>
  

@stop
@include('layouts.footer')@include('layouts.footer')
@section('js')
    <script>
$(function () {$('[data-mask]').inputmask()});
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
        

    // BS-Stepper Init
    var stepperElement = document.querySelector('.bs-stepper');
    var stepper = new Stepper(stepperElement);
    var currentIndex = stepper._currentIndex;

</script>
@stop