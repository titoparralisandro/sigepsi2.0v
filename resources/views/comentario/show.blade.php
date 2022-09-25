@extends('adminlte::page')

@section('title', '| Comentarios')

@section('content_header')
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Comentario</strong></h1>
  </div>
</div>

<div class="card border-dark">

  <div class="card-body text-dark">

      <form>

        <div class="row">

          <div class="form-group col col-6">

            <label class="form-label">Usuario</label>
            <input disabled class="form-control" type="text" value="{{ $comentario->name }}">

          </div>

          <div class="form-group col col-6">

            <label class="form-label ">Correo</label>
            <input disabled class="form-control" type="text" value="{{ $comentario->email }}">

          </div>

        </div>

          <div class="form-group">

            <label class="form-label">Asunto</label>
            <input disabled class="form-control" type="text" value="{{ $comentario->asunto }}">

          </div>

          <div class="form-group">

              <label class="form-label">Comentario</label>
              <textarea disabled class="form-control" cols="25" rows="4">{{ $comentario->comentario }}</textarea>

          </div>

          <a href="{{ route('comentario.index') }}" class="btn btn-primary">volver</a>

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
