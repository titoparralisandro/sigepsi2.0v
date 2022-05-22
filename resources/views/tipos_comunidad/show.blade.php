@extends('adminlte::page')

@section('title', '| Comunidades')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver tipo de comunidad creada</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Tipo de comunidad</label>
                <input id="tipo_comunidad" disabled class="form-control" type="text" name="tipo_comunidad"
                value="{{ $tipo_comunidad->tipo_comunidad }}">

            </div>

            <a href="{{ route('tipos_comunidad.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('tipos_comunidad.edit', $tipo_comunidad->id ) }}">Editar</a>


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
