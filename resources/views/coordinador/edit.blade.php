@extends('adminlte::page')

@section('title', '| Coordinador')

@section('content_header')

<div class="card-header bg-primary ">

    <div class="color-palette">
      <h1 class="text-center"><strong>Edit Coordinador del Departamento</strong></h1>
    </div>
</div>

  <div class="card border-dark">

    <div class="card-body text-dark">

        <form action="{{ route('coordinador.update', $coordinador->id ) }}" method="POST">
            <div class="row">
              <div class="form-group col col-8">
                @csrf
                {{ method_field('PATCH') }}
                
                <label class="form-label">Coordinador</label>
                <input id="nombre" class="form-control" type="text" name="nombre"
                value="{{ isset($coordinador->nombre)?$coordinador->nombre:old('nombre') }}">

              </div>

              <div class="form-group col col-4">

                <label class="form">Teléfono de contacto</label>
                <input id="telefono_contacto" type="text"  class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono_contacto"
                value="{{ isset($coordinador->telefono_contacto)?$coordinador->telefono_contacto:old('telefono_contacto') }}">

              </div>
            </div>

              <div class="row">

                  <div class="form-group col">

                    <label class="form">Carrera</label>
                    
                        <select id="id_carrera" name="id_carrera" class="form-control">
                            
                                @foreach ( $carrera as $carreras)
                                    @if($carreras->id == $coordinador->id_carrera){
                                        <option value="{{$carreras->id}}" selected>{{ $carreras->carrera }}</option>
                                    }@else{
                                        <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>
                                    }
                                    @endif
                                @endforeach
                            
                        </select>
                  </div>

                  <div class="form-group col">

                    <label class="form">Correo</label>
                    <input id="email" class="form-control" type="email" name="email"
                    value="{{ isset($coordinador->email)?$coordinador->email:old('email') }}">

                </div>

              </div>

            <a href="{{ route('coordinador.index') }}" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>

    </div>

  </div>
@stop
@include('layouts.footer')
