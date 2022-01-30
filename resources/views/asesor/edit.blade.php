@extends('adminlte::page')

@section('title', '| Asesores')

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
      <h1 class="text-center"><strong>Actualización de carrera</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('asesor.update', $profesor->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="row">

              <div class="form-group col">

                  <label class="form-label">Primer nombre</label>
                  <input id="primer_nombre" class="form-control" type="text" name="primer_nombre"
                  value="{{ isset($profesor->primer_nombre)?$profesor->primer_nombre:old('primer_nombre') }}">

              </div>

              <div class="form-group col">

                <label class="form-label">Segundo nombre</label>
                <input id="segundo_nombre" class="form-control" type="text" name="segundo_nombre"
                  value="{{ isset($profesor->segundo_nombre)?$profesor->segundo_nombre:old('segundo_nombre') }}">

            </div>

              <div class="form-group col">

                  <label class="form-label">Primer apellido</label>
                  <input id="primer_apellido" class="form-control" type="text" name="primer_apellido"
                  value="{{ isset($profesor->primer_apellido)?$profesor->primer_apellido:old('primer_apellido') }}">

              </div>

              <div class="form-group col">

                  <label class="form-label">Segundo apellido</label>
                  <input id="segundo_apellido" class="form-control" type="text" name="segundo_apellido"
                  value="{{ isset($profesor->segundo_apellido)?$profesor->segundo_apellido:old('segundo_apellido') }}">

              </div>

          </div>

          <div class="row">

            <div class="form-group col">

                <label class="form-label">Cédula</label>
                <input id="cedula" class="form-control" type="double" name="cedula"  maxlength="8"
                value="{{ isset($profesor->cedula)?$profesor->cedula:old('cedula') }}">

            </div>

            <div class="form-group col">

              <label class="form">Teléfono de contacto</label>
              <input id="telefono" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono"
              value="{{ isset($profesor->telefono)?$profesor->telefono:old('telefono') }}">

            </div>

            <div class="form-group col-6">

              <label class="form">Correo</label>
              <input id="email" class="form-control" type="email" name="email"
              value="{{ isset($profesor->email)?$profesor->email:old('email') }}">

            </div>

        </div>

            <a href="{{ route('asesor.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>
  <footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/a_cerca_de')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>
@stop
