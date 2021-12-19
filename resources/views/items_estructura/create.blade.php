@extends('adminlte::page')

@section('title', 'Estructuras')

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
      <h1 class="text-center"><strong>Crear nuevo item</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('items_estructura.store') }}" method="POST">
            @csrf
            <div class="form-group">

              <label class="form-label">Item</label>
              <input id="item" class="form-control" type="text" name="item"
              value="{{ isset($item->item)?$item->item:old('item') }}">

            </div>

          <a href="{{ route('items_estructura.index') }}" class="btn btn-danger">Cancelar</a>

          <button type="submit" class="btn btn-success">Registrar</button>

          </form>
    </div>

  </div>

@stop
