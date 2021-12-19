@extends('adminlte::page')

@section('title', 'Asesorias')

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
      <h1 class="text-center"><strong>Actualización de tipo de asesoria</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('tipos_asesoria.update', $tipo_asesoria->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Tipo de asesoria</label>
                <input id="tipo_asesoria" class="form-control" type="text" name="tipo_asesoria"
                value="{{ isset($tipo_asesoria->tipo_asesoria)?$tipo_asesoria->tipo_asesoria:old('tipo_asesoria') }}">

            </div>

            <a href="{{ route('tipos_asesoria.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
