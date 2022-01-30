@extends('adminlte::page')

@section('title', '| Producto')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Ver producto</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Producto</label>
                <input id="producto" disabled class="form-control" type="text" name="producto"
                value="{{ $producto->producto }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <textarea id="descripcion" class="form-control" name="descripcion" cols="25" rows="5" disabled>{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion') }}
                </textarea>

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value={{ $producto->estatus==true ? ('Activo') : ('Inactivo') }}>

            </div>

            <a href="{{ route('producto.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="{{ route('producto.edit', $producto->id ) }}">Editar</a>

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
