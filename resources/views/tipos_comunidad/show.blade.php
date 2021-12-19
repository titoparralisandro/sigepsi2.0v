@extends('adminlte::page')

@section('title', 'Comunidades')

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

@stop
