@extends('adminlte::page')

@section('title', '| Carreras')

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
      <h1 class="text-center"><strong>Añadir nueva carrera</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('carrera.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Carrera</label>
              <input id="carrera" class="form-control" type="text" name="carrera"
              value="{{ isset($carrera->carrera)?$carrera->carrera:old('carrera') }}">

            </div>

            <div class="form-group">

              <label class="form-label">Descripción</label>
              <input id="descripcion" class="form-control" type="text" name="descripcion"
              value="{{ isset($carrera->descripcion)?$carrera->descripcion:old('descripcion') }}">

            </div>

            <div class="form-group">

              <input id="estatus" class="form-control" type="hidden" name="estatus" value="1">

            </div>

          <a href="{{ route('carrera.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>
@stop
@include('layouts.footer')
