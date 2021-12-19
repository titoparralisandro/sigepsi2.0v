@extends('adminlte::page')

@section('title', 'Crear')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Crear Nuevo Trayectos</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('trayecto.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Trayecto</label>
              <input id="trayecto" class="form-control" type="text" name="trayecto"
              value="{{ isset($trayecto->trayecto)?$trayecto->trayecto:old('trayecto') }}">

            </div>

            <div class="form-group">

              <label class="form-label">Descripción</label>
              <input id="descripcion" class="form-control" type="text" name="descripcion"
              value="{{ isset($trayecto->descripcion)?$trayecto->descripcion:old('descripcion') }}">

            </div>

            <div class="form-group">

              <input id="estatus" class="form-control" type="hidden" name="estatus" value="1">

            </div>

          <a href="{{ route('trayecto.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
