@extends('adminlte::page')
@section('title', 'Comentario')
@section('content_header')

<div class="bg-primary color-palette"><h1 class="text-center"><strong>Crear Comentario</strong></h1></div>
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

<form action="{{ route('comentario.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label class="form-label">Nombre</label>
	<input id="name" class="form-control" type="text" name="name"
  value="{{ isset($comentario->name)?$comentario->name:old('name') }}">
  </div>

  <div class="form-group">
    <label class="form-label">Correo</label>
	<input id="email" class="form-control" type="text" name="email"
  value="{{ isset($comentario->email)?$comentario->email:old('email') }}">
  </div>

  <div class="form-group">
    <label class="form-label">Comentario</label>
  <textarea rows="2" cols="50" id="comentario" class="form-control" name="comentario">
  {{ isset($comentario->comentario)?$comentario->comentario:old('comentario') }}
  </textarea>
	<!--<input id="comentario" class="form-control" type="text" name="comentario"
  value="{{ isset($comentario->comentario)?$comentario->comentario:old('comentario') }}">-->
  </div>
<a href="{{ route('comentario.index') }}" class="btn btn-info">Cancelar</a>
<button type="submit" class="btn btn-primary">Enviar</button>

</form>
@stop