@extends('adminlte::page')

@section('title', 'Estatus')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver estatus de progreso</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Estatus progreso</label>
                <input id="estatus_progreso" disabled class="form-control" type="text" name="estatus_progreso"
                value="{{ $estatus_progreso->estatus_progreso }}">

            </div>

            <a href="{{ route('estatus_progresos.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('estatus_progresos.edit', $estatus_progreso->id ) }}">Editar</a>

        </form>

    </div>

  </div>

@stop
