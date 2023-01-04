@extends('adminlte::page')

@section('title', '| Especialidad')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver carrera creada</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>
            <div class="row">
                <div class="form-group col col-6">

                    <label class="form-label">Carrera</label>
                    <input id="carrera" disabled class="form-control" type="text" name="carrera"
                    value="{{ $especialidad->carrera->carrera }}">

                </div>

                <div class="form-group col col-6">

                    <label class="form-label">Especialidad</label>
                    <input id="especialidad" disabled class="form-control" type="text" name="especialidad"
                    value="{{ $especialidad->especialidad }}">

                </div>
            </div>
            <div class="form-group">

                <label class="form-label">Descripción</label>
                <textarea id="descripcion" disabled class="form-control" name="descripcion" cols="25" rows="2">{{ $especialidad->descripcion }}</textarea>

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $especialidad->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('especialidad.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('especialidad.edit', $especialidad->id ) }}">Editar</a>


        </form>

    </div>

  </div>
@stop
@include('layouts.footer')
