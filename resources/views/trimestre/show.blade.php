@extends('adminlte::page')

@section('title', '| Trimestre')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver trimestre creado</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Trimestre</label>
                <input id="trimestre" disabled class="form-control" type="text" name="trimestre"
                value="{{ $trimestre->trimestre }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <input id="descripcion" disabled class="form-control" type="text" name="descripcion"
                value="{{ $trimestre->descripcion }}">

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $trimestre->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('trimestre.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('trimestre.edit', $trimestre->id ) }}">Editar</a>


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
