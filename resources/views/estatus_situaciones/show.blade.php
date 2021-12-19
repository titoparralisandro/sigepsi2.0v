@extends('adminlte::page')

@section('title', 'Estatus')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver estatus de situación</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Estatus de situación</label>
                <input id="estatus_situacion" disabled class="form-control" type="text" name="estatus_situacion"
                value="{{ $estatus_situacion->estatus_situacion }}">

            </div>

            <a href="{{ route('estatus_situaciones.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('estatus_situaciones.edit', $estatus_situacion->id ) }}">Editar</a>

        </form>

    </div>

  </div>

@stop
