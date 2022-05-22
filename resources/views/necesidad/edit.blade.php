@extends('adminlte::page')

@section('title', '| Necesidades')

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

<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-12 vorder rounded shadow bg-white">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#necesidad-tab" class="nav-link active" data-toggle="pill"><strong>Necesidad</strong></a></li>
            <li class="nav-item"><a href="#comunidad-tab" class="nav-link" data-toggle="pill"><strong>Datos de la comunidad</strong></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show fade active p-5" id="necesidad-tab">

                <form action="{{ route('necesidad.update', $necesidad->id ) }}" method="POST">

                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="row">
                        <div class="form-group">
        
                        <label class="form-label">Estatus</label>
                        <select id="estatus" class="form-control"name="estatus">
                            <option value="2">Rechazar</option>
                            {{-- <option value="3">Estudiar</option> --}}
                            <option value="4">Aprovar</option>
                        </select>
                        </div>
                    </div>

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

                    <button type="submit" class="btn btn-success">Actualizar</button>

                </form>

            </div>

            <div class="tab-pane fade p-5" id="comunidad-tab">

                {!!$html!!}

            </div>
        </div>
    </div>
</div>

{{-- <div class="card-header bg-primary ">
    <div class="color-palette">
      <h1 class="text-center"><strong>Actualización de necesidad</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('necesidad.update', $necesidad->id ) }}" method="POST">

            @csrf
            {{ method_field('PATCH') }}
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

                

            <div class="form-group">

                <label class="form-label">Necesidad</label>
                <input class="form-control" type="text"
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
                    <option value="2">Rechazar</option>
                    <option value="4">Aprovar</option>
                </select>

            </div>

            <a href="{{ route('necesidad.index') }}" class="btn btn-danger">Cancelar</a>

            <button type="submit" class="btn btn-success">Actualizar</button>

        </form>

    </div>

  </div> --}}
  <footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/a_cerca_de')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>
@stop
