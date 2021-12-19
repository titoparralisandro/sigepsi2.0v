@extends('adminlte::page')

@section('title', 'Turnos')

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
      <h1 class="text-center"><strong>Crear nuevo turno</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('turno.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Turno</label>
              <input id="turno" class="form-control" type="text" name="turno"
              value="{{ isset($turno->turno)?$turno->turno:old('turno') }}">

            </div>

            <div class="form-group">

              <input id="estatus" class="form-control" type="hidden" name="estatus" value="1">

            </div>

          <a href="{{ route('turno.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
