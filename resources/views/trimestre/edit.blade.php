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
      <h1 class="text-center"><strong>Actualización de trimestre</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('trimestre.update', $trimestre->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Trimestre</label>
                <input id="trimestre" class="form-control" type="text" name="trimestre"
                value="{{ isset($trimestre->trimestre)?$trimestre->trimestre:old('trimestre') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <input id="descripcion" class="form-control" type="text" name="descripcion"
                value="{{ isset($trimestre->descripcion)?$trimestre->descripcion:old('descripcion') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <select id="estatus" class="form-control"name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

            </div>

            <a href="{{ route('trimestre.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
