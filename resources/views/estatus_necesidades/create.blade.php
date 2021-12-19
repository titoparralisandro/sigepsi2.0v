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
      <h1 class="text-center"><strong>Crear estatus de necesidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('estatus_necesidades.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Estatus de necesidad</label>
              <input id="estatus_necesidad" class="form-control" type="text" name="estatus_necesidad"
              value="{{ isset($estatus_necesidad->estatus_necesidad)?$estatus_necesidad->estatus_necesidad:old('estatus_necesidad') }}">

            </div>

          <a href="{{ route('estatus_necesidades.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
