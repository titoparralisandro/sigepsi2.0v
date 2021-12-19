@extends('adminlte::page')

@section('title', 'Estructuras')

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

@stop
