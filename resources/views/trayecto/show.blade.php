@extends('adminlte::page')

@section('title', '| trayecto')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver trayecto creado</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>
        <div class="row">
            <div class="form-group col col-5">

                <label class="form-label">Trayecto</label>
                <input id="trayecto" disabled class="form-control" type="text" name="trayecto"
                value="{{ $trayecto->trayecto }}">

            </div>

            <div class="form-group  col col-5">

                <label class="form-label">Descripción</label>
                <input id="descripcion" disabled class="form-control" type="text" name="descripcion"
                value="{{ $trayecto->descripcion }}">

            </div>

            <div class="form-group  col col-2">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $trayecto->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>
        </div>
            <a href="{{ route('trayecto.index') }}" class="btn btn-danger">Volver</a>

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
