@extends('adminlte::page')

@section('title', '| Necesidades')

@section('content_header')

<div class="card-header bg-primary ">
    <div class="color-palette">
      <h1 class="text-center"><strong>Ver necesidad</strong></h1>
    </div>
</div>
{{-- Ya imprime los datos de la comunidad correspodniente
  <label class="form-label">Datos de la Comunidad</label>
  {!!$html!!} 
--}}
  <div class="card border-dark">
    <div class="card-body text-dark">
        <form>
          <div class="row">
            <div class="form-group col col-12">

              <label class="form-label">Necesidad</label>
              <textarea class="form-control" cols="25" rows="5" disabled>{{$necesidad->necesidad}}</textarea>

            </div>
          </div>

          <div class="row">
            {!!$a!!}
          </div>

          <div class="form-group">

            <label class="form-label">Dirección</label>
            <textarea class="form-control" cols="25" rows="3" disabled>{{$necesidad->direccion}}</textarea>

          </div>

            <a href="{{ route('necesidad.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="">Estudiar</a>

        </form>

    </div>
  </div>

@stop


@section('js')
{{-- Valor compuesto {{$necesidad->comunidades->tipos_comunidades->tipo_comunidad}} --}}
@stop