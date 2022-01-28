@extends('adminlte::page')

@section('title', 'Comentario')

@section('content_header')
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Comentario</strong></h1>
  </div>
</div>

<div class="card border-dark">

  <div class="card-body text-dark">

    {!!$html!!}
          <a href="{{ route('comentario.index') }}" class="btn btn-primary">volver</a>

  </div>

</div>

@stop
