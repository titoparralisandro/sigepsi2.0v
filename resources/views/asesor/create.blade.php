@extends('adminlte::page')

@section('title', '| Asesores')

@section('plugins.Inputmask', true)

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
      <h1 class="text-center"><strong>Añadir nuevo asesor</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('asesor.store') }}" method="POST">
            @csrf
            <div class="row">

              <div class="form-group col">

                  <label class="form-label">Primer nombre</label>
                  <input id="primer_nombre" class="form-control" type="text" name="primer_nombre"
                  value="{{ isset($asesor->primer_nombre)?$asesor->primer_nombre:old('primer_nombre') }}">

              </div>

              <div class="form-group col">

                <label class="form-label">Segundo nombre</label>
                <input id="segundo_nombre" class="form-control" type="text" name="segundo_nombre"
                  value="{{ isset($asesor->segundo_nombre)?$asesor->segundo_nombre:old('segundo_nombre') }}">

            </div>

              <div class="form-group col">

                  <label class="form-label">Primer apellido</label>
                  <input id="primer_apellido" class="form-control" type="text" name="primer_apellido"
                  value="{{ isset($asesor->primer_apellido)?$asesor->primer_apellido:old('primer_apellido') }}">

              </div>

              <div class="form-group col">

                  <label class="form-label">Segundo apellido</label>
                  <input id="segundo_apellido" class="form-control" type="text" name="segundo_apellido"
                  value="{{ isset($asesor->segundo_apellido)?$asesor->segundo_apellido:old('segundo_apellido') }}">

              </div>

          </div>

          <div class="row">

            <div class="form-group col">

                <label class="form-label">Cédula</label>
                <input id="cedula" class="form-control" type="double" name="cedula"  maxlength="8"
                value="{{ isset($asesor->cedula)?$asesor->cedula:old('cedula') }}">

            </div>

            <div class="form-group col">

              <label class="form">Teléfono de contacto</label>
              <input id="telefono" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono"
              value="{{ isset($asesor->telefono)?$asesor->telefono:old('telefono') }}">

            </div>

            <div class="form-group col-6">

              <label class="form">Correo</label>
              <input id="email" class="form-control" type="email" name="email"
              value="{{ isset($asesor->email)?$asesor->email:old('email') }}">

            </div>

        </div>

          <a href="{{ route('asesor.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

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

@section('js')
    <script>
      $(function () {$('[data-mask]').inputmask()});
    </script>
@stop
