@extends('adminlte::page')

@section('title', 'Asesorias')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver tipo de asesoria</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Tipo de asesoria</label>
                <input id="tipo_asesoria" disabled class="form-control" type="text" name="tipo_asesoria"
                value="{{ $tipo_asesoria->tipo_asesoria }}">

            </div>

            <a href="{{ route('tipos_asesoria.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('tipos_asesoria.edit', $tipo_asesoria->id ) }}">Editar</a>

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
