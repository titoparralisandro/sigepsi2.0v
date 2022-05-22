@extends('adminlte::page')

@section('title', '| Carreras')

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
      <h1 class="text-center"><strong>Actualización de carrera</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('carrera.update', $carrera->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Carrera</label>
                <input id="carrera" class="form-control" type="text" name="carrera"
                value="{{ isset($carrera->carrera)?$carrera->carrera:old('carrera') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <input id="descripcion" class="form-control" type="text" name="descripcion"
                value="{{ isset($carrera->descripcion)?$carrera->descripcion:old('descripcion') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <select id="estatus" class="form-control"name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

            </div>

            <a href="{{ route('carrera.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

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
