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
      <h1 class="text-center"><strong>Actualización de estatus de situación</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('estatus_situaciones.update', $estatus_situacion->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Estatus de situación</label>
                <input id="estatus_situacion" class="form-control" type="text" name="estatus_situacion"
                value="{{ isset($estatus_situacion->estatus_situacion)?$estatus_situacion->estatus_situacion:old('estatus_situacion') }}">

            </div>

            <a href="{{ route('estatus_situaciones.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
