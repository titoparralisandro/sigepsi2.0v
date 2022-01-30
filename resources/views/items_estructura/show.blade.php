@extends('adminlte::page')

@section('title', '| Estructuras')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver producto item</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Item</label>
                <input id="item" disabled class="form-control" type="text" name="item"
                value="{{ $item->item }}">

            </div>

            <a href="{{ route('items_estructura.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('items_estructura.edit', $item->id ) }}">Editar</a>

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
