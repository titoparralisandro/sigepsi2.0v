@extends('adminlte::page')

@section('title', '| Necesidades')

@section('content_header')

<<<<<<< HEAD
<div class="card-header bg-primary ">
    <div class="color-palette">
      <h1 class="text-center"><strong>Ver necesidad</strong></h1>
    </div>
</div>
<<<<<<< HEAD

  <div class="card border-dark">
    <div class="card-body text-dark">

        <form>

            <div class="form-group">

                <label class="form-label">Comunidad</label>
                <input id="estatus" disabled class="form-control" type="text" name="estatus" value="{{$necesidad->comunidades->nombre}}">

            </div>

            <div class="form-group">

                <label class="form-label">Necesidad</label>
                <textarea class="form-control" cols="25" rows="5" disabled>{{ $necesidad->necesidad }}
                </textarea>

            </div>
=======
{{-- Ya imprime los datos de la comunidad correspodniente
  <label class="form-label">Datos de la Comunidad</label>
  {!!$html!!} 
--}}
  <div class="card border-dark">
    <div class="card-body text-dark">
        <form>
          <div class="row">
            <div class="form-group col col-12">
=======
<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-12 vorder rounded shadow bg-white">
>>>>>>> 1ffffccbe0fbd7ccea89549129f5b373ab6622a8

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#necesidad-tab" class="nav-link active" data-toggle="pill"><strong>Necesidad</strong></a></li>
            <li class="nav-item"><a href="#comunidad-tab" class="nav-link" data-toggle="pill"><strong>Datos de la comunidad</strong></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show fade active p-5" id="necesidad-tab">

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

            <div class="tab-pane fade p-5" id="comunidad-tab">

<<<<<<< HEAD
          <div class="form-group">

            <label class="form-label">Dirección</label>
            <textarea class="form-control" cols="25" rows="3" disabled>{{$necesidad->direccion}}</textarea>

          </div>
>>>>>>> 074e84dc8eb7ce2c095c4ac978404f9e28ff23e3

            <a href="{{ route('necesidad.index') }}" class="btn btn-danger">Volver</a>

            <a class="btn btn-success" href="">Estudiar</a>

        </form>
=======
                {!!$html!!}
>>>>>>> 1ffffccbe0fbd7ccea89549129f5b373ab6622a8

            </div>
        </div>
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