@extends('adminlte::page')

@section('title', 'Estatus')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver estatus de comunidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Estatus comunidad</label>
                <input id="estatus_comunidad" disabled class="form-control" type="text" name="estatus_comunidad"
                value="{{ $estatus_comunidad->estatus_comunidad }}">

            </div>

            <a href="{{ route('estatus_comunidades.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('estatus_comunidades.edit', $estatus_comunidad->id ) }}">Editar</a>

        </form>

    </div>

  </div>

@stop
