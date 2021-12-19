@extends('adminlte::page')

@section('title', 'Estatus')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver estatus de necesidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Estatus necesidad</label>
                <input id="estatus_necesidad" disabled class="form-control" type="text" name="estatus_necesidad"
                value="{{ $estatus_necesidad->estatus_necesidad }}">

            </div>

            <a href="{{ route('estatus_necesidades.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('estatus_necesidades.edit', $estatus_necesidad->id ) }}">Editar</a>

        </form>

    </div>

  </div>

@stop
