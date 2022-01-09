@extends('adminlte::page')

@section('title', 'Especialidad')

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
      <h1 class="text-center"><strong>Añadir nueva especialidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('especialidad.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <div class="row">
                <div class="form-group col">
                  <label class="form-label">Carrera</label>

                  <select id="id_carrera" name="id_carrera" class="form-control">
                  <option selected>Seleccionar carrera</option>
                  @foreach ( $carrera as $carreras)

                      <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>

                  @endforeach
                  </select>
                </div>
              </div>

            </div>

            <div class="form-group">

              <label class="form-label">Especialidad</label>
              <input id="especialidad" class="form-control" type="text" name="especialidad"
              value="{{ isset($especialidad->especialidad)?$especialidad->especialidad:old('especialidad') }}">

            </div>

            <div class="form-group">

              <label class="form-label">Descripción</label>
              <input id="descripcion" class="form-control" type="text" name="descripcion"
              value="{{ isset($especialidad->descripcion)?$especialidad->descripcion:old('descripcion') }}">

            </div>

            <div class="form-group">

              <input id="estatus" class="form-control" type="hidden" name="estatus" value="1">

            </div>

          <a href="{{ route('especialidad.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/home')}}">Sistema de Gestión de Proyectos Socio Integradores</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>

@stop
