@extends('adminlte::page')

@section('title', 'Carreras')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver carrera creada</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Carrera</label>
                <input id="carrera" disabled class="form-control" type="text" name="carrera"
                value="{{ $carrera->carrera }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <input id="descripcion" disabled class="form-control" type="text" name="descripcion"
                value="{{ $carrera->descripcion }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $carrera->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('carrera.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('carrera.edit', $carrera->id ) }}">Editar</a>


        </form>

    </div>

  </div>

@stop
