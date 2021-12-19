@extends('adminlte::page')

@section('title', 'Producto')

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
      <h1 class="text-center"><strong>Actualización de producto</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('producto.update', $producto->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">

                <label class="form-label">Producto</label>
                <input id="producto" class="form-control" type="text" name="producto"
                value="{{ isset($producto->producto)?$producto->producto:old('producto') }}">

            </div>

            <div class="form-group">

                <label class="form-label">Descripción</label>
                <textarea id="descripcion" class="form-control" name="descripcion" cols="25" rows="5"
                value="{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion') }}">{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion') }}</textarea>

            </div>

            <div class="form-group">

                <label class="form-label">Estatus</label>
                <select id="estatus" class="form-control"name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

            </div>

            <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div>

@stop
