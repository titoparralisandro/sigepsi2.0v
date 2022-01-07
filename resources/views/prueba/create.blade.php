@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
<div class="bg-primary color-palette"><h1 class="text-center"><strong>Crear</strong></h1></div>
@stop

@section('content')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
<form action="{{ route('prueba.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label class="form-label">Nombre</label>
	<input id="name" class="form-control" type="text" name="name"
  value="{{ isset($prueba->name)?$prueba->name:old('name') }}">
  </div>

  <div class="form-group">
    <label class="form-label">Apellido</label>
	<input id="apellido" class="form-control" type="text" name="apellido"
  value="{{ isset($prueba->apellido)?$prueba->apellido:old('apellido') }}">
  </div>

  <div class="form-group">
    <label class="form-label">Cédula</label>
	<input id="cedula" class="form-control" type="text" name="cedula"
  value="{{ isset($prueba->cedula)?$prueba->cedula:old('cedula') }}">
  </div>

<a href="{{ route('prueba.index') }}" class="btn btn-info">Cancelar</a>

<button type="submit" class="btn btn-primary">Enviar</button>

</form>
