@extends('adminlte::page')

@section('title', 'Estatus')

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
      <h1 class="text-center"><strong>Crear estatus de progreso</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('estatus_progresos.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Estatus de progreso</label>
              <input id="estatus_progreso" class="form-control" type="text" name="estatus_progreso"
              value="{{ isset($estatus_progreso->estatus_progreso)?$estatus_progreso->estatus_progreso:old('estatus_progreso') }}">

            </div>

          <a href="{{ route('estatus_progresos.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
