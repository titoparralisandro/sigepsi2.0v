@extends('adminlte::page')

@section('title', 'Editar')

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
      <h1 class="text-center"><strong>Actualización de trayecto</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('trayecto.update', $trayecto->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

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

                <label class="form-label">Estatus</label>
                <select id="estatus" class="form-control"name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

            </div>

            <a href="{{ route('trayecto.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop

