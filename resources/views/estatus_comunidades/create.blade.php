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
      <h1 class="text-center"><strong>Crear estatus de comunidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('estatus_comunidades.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Estatus de comunidad</label>
              <input id="estatus_comunidad" class="form-control" type="text" name="estatus_comunidad"
              value="{{ isset($estatus_comunidad->estatus_comunidad)?$estatus_comunidad->estatus_comunidad:old('estatus_comunidad') }}">

            </div>

          <a href="{{ route('estatus_comunidades.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
