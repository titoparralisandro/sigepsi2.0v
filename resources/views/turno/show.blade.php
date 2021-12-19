@extends('adminlte::page')

@section('title', 'Turnos')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver producto turno</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Turno</label>
                <input id="turno" disabled class="form-control" type="text" name="turno"
                value="{{ $turno->turno }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $turno->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('turno.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('turno.edit', $turno->id ) }}">Editar</a>

        </form>

    </div>

  </div>

@stop
