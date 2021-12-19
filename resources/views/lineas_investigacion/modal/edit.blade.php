@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
<?php
use App\Models\Carrera;

$carrera =  Carrera::all();;
?>

{{-- Modal de Ver {{ route('lineas_investigacion.store') }} --}}

<form action="{{ route('lineas_investigacion.update', $lineas_investigaciones->id ) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}

    <div class="modal fade xl" id="modal-edit{{ $lineas_investigaciones->id }}" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header card-header bg-primary">

                    <div class="color-palette">
                        <h1 class="text-center"><strong>Actualización de línea de investigación</strong></h1>
                      </div>

                </div>
                <div class="modal-body">


                    <div class="form-group">

                        <label class="form-label">Línea de investigación</label>
                        <input id="linea_investigacion" class="form-control" type="text" name="linea_investigacion"
                        value="{{ isset($lineas_investigaciones->linea_investigacion)?$lineas_investigaciones->linea_investigacion:old('linea_investigacion') }}">

                    </div>

                    <div class="form-group">

                        <label class="form-label">Carrera</label>

                        <select id="id_carrera" name="id_carrera" class="form-control">
                        <option selected value="{{$lineas_investigaciones->id_carrera}}">Seleccione su carrera nuevamente (opcional)</option>
                        @foreach ( $carrera as $carreras )
                        @if($carreras[$lineas_investigaciones->id_carrera]!=$carreras->id){
                            <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>
                        }
                        @endif
                        @endforeach

                    </select>

                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>

                </div>
            </div>
        </div>
    </div>
{{-- Fin de Modal de Ver --}}


