@extends('adminlte::page')

@section('title', '| Turnos')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver producto turno</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="row">
                <div class="form-group col col-6">

                    <label class="form-label">Turno</label>
                    <input id="turno" disabled class="form-control" type="text" name="turno"
                    value="{{ $turno->turno }}">

                </div>

                <div class="form-group col col-6">

                    <label class="form-label">Estatus</label>
                    <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $turno->estatus==true ? ('Activo') : ('Inactivo') }}>

                </div>
            </div>

            <a href="{{ route('turno.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('turno.edit', $turno->id ) }}">Editar</a>

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
