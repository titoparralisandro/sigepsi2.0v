@extends('adminlte::page')

@section('title', 'Especialidades')

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
      <h1 class="text-center"><strong>Actualización de especialidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('tipos_comunidad.update', $tipo_comunidad->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Tipo de comunidad</label>
                <input id="tipo_comunidad" class="form-control" type="text" name="tipo_comunidad"
                value="{{ isset($tipo_comunidad->tipo_comunidad)?$tipo_comunidad->tipo_comunidad:old('tipo_comunidad') }}">

            </div>

            <a href="{{ route('tipos_comunidad.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
