@extends('adminlte::page')

@section('title', '| Coordinador')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver Coordinador del Departamento {{ $coordinador->carreras->carrera }}</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>
            <div class="row">
              <div class="form-group col col-8">

                <label class="form-label">Coordinador</label>
                <input id="nombre" class="form-control" type="text" name="nombre" disabled
                value="{{ $coordinador->nombre }}">

              </div>

              <div class="form-group col col-4">

                <label class="form">Teléfono de contacto</label>
                <input id="telefono_contacto" type="text" disabled class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono_contacto"
                value="{{ $coordinador->telefono_contacto }}">

              </div>
            </div>

              <div class="row">

                  <div class="form-group col">

                    <label class="form">Carrera</label>
                    <input id="carrera" disabled class="form-control" type="text" name="carrera"
                    value="{{ $coordinador->carreras->carrera }}">

                  </div>

                  <div class="form-group col">

                    <label class="form">Correo</label>
                    <input id="email" class="form-control" type="email" name="email" disabled
                    value="{{ $coordinador->email }}">

                </div>

              </div>

            <a href="{{ route('coordinador.index') }}" class="btn btn-danger">Volver</a>

        </form>

    </div>

  </div>

@stop
@include('layouts.footer')