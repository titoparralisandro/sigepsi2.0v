@extends('adminlte::page')

@section('title', '| Especialidad')

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

        <form action="{{ route('especialidad.update', $especialidad->id ) }}" method="POST">

            {{ method_field('patch') }}
            @csrf

            <div class="form-group">

              <div class="row">

                <div class="form-group col">

                  <label class="form-label">Carrera</label>

                  <select id="id_carrera" name="id_carrera" class="form-control">
                  <option selected>Seleccionar carrera</option>
                  @foreach ( $carrera as $carreras)
                      <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>
                  @endforeach
                  </select>

                </div>

                <div class="form-group col">

                    <label class="form-label">Especialidad</label>
                    <input id="especialidad" class="form-control" type="text" name="especialidad"
                    value="{{ isset($especialidad->especialidad)?$especialidad->especialidad:old('especialidad') }}">

                </div>

                <div class="form-group col col-2">

                  <label class="form-label">Estatus</label>
                  <select id="estatus" class="form-control"name="estatus">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                  </select>

                </div>
              </div>

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <textarea id="descripcion" class="form-control" name="descripcion" cols="25" rows="2">{{ isset($especialidad->descripcion)?$especialidad->descripcion:old('descripcion') }}</textarea>

            </div>

            <a href="{{ route('especialidad.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
@include('layouts.footer')
