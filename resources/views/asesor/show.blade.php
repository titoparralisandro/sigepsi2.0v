@extends('adminlte::page')

@section('title', '| Asesores')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver profesor</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

      <div class="row">

        <div class="form-group col">

            <label class="form-label">Primer nombre</label>
            <input id="primer_nombre" class="form-control" type="text" name="primer_nombre" disabled
            value="{{ $asesor->primer_nombre }}">

        </div>

        <div class="form-group col">

          <label class="form-label">Segundo nombre</label>
          <input id="segundo_nombre" class="form-control" type="text" name="segundo_nombre" disabled
            value="{{ $asesor->segundo_nombre }}">

      </div>

        <div class="form-group col">

            <label class="form-label">Primer apellido</label>
            <input id="primer_apellido" class="form-control" type="text" name="primer_apellido" disabled
            value="{{ $asesor->primer_apellido }}">

        </div>

        <div class="form-group col">

            <label class="form-label">Segundo apellido</label>
            <input id="segundo_apellido" class="form-control" type="text" name="segundo_apellido" disabled
            value="{{ $asesor->segundo_apellido }}">

        </div>

    </div>

    <div class="row">

      <div class="form-group col">

          <label class="form-label">Cédula</label>
          <input id="cedula" class="form-control" type="double" name="cedula"  maxlength="8" disabled
          value="{{ $asesor->cedula }}">

      </div>

      <div class="form-group col">

        <label class="form">Teléfono de contacto</label>
        <input id="telefono" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono"
        value="{{ $asesor->telefono }}" disabled>

      </div>

      <div class="form-group col-6">

        <label class="form">Correo</label>
        <input id="email" class="form-control" type="email" name="email" disabled
        value="{{ $asesor->email }}">

      </div>

  </div>

            <a href="{{ route('asesor.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('asesor.edit', $asesor->id ) }}">Editar</a>


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
