@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver trimestre creado</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Trimestre</label>
                <input id="trimestre" disabled class="form-control" type="text" name="trimestre"
                value="{{ $trimestre->trimestre }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <input id="descripcion" disabled class="form-control" type="text" name="descripcion"
                value="{{ $trimestre->descripcion }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $trimestre->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('trimestre.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('trimestre.edit', $trimestre->id ) }}">Editar</a>


        </form>

    </div>

  </div>

@stop
