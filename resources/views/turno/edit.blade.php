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
      <h1 class="text-center"><strong>Actualización de turno</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('turno.update', $turno->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Turno</label>
                <input id="turno" class="form-control" type="text" name="turno"
                value="{{ isset($turno->turno)?$turno->turno:old('turno') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <select id="estatus" class="form-control"name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

            </div>

            <a href="{{ route('turno.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
