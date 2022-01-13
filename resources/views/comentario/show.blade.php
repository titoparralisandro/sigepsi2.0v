@extends('adminlte::page')

@section('title', 'Comentario')

@section('content_header')
<div class="bg-primary color-palette"><h1 class="text-center"><strong>Comentario</h1></strong></div>
@stop

@section('content')
<hr>
<div class="card">

 <div class="card-header bg-info text-dark">
 	<h2 class="text-center">{{ $comentario->name }}</h2>
</div>

<div class="card-body">
  <h3 class="text-center">{{ $comentario->comentario }}</h3>
</div>

<div class="card-footer bg-info text-dark">
  <h4 class="text-center">{{ $comentario->email }}</h4>
</div>

</div>
<hr>
<a href="{{ route('comentario.index') }}" class="btn btn-primary">volver</a>

@stop

@section('css')

@stop

@section('js')

@stop


