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

    <div class="modal fade xl" id="modal-show{{ $lineas_investigaciones->id }}" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header card-header bg-primary">

                    <div class="color-palette">
                        <h1 class="text-center"><strong>Ver línea de investigación</strong></h1>
                      </div>

                </div>
                <div class="modal-body">

                    <div class="form-group">

                        <label class="form-label">Línea de investigación</label>
                        <input id="linea_investigacion" disabled class="form-control" type="text" name="linea_investigacion"
                        value="{{ $lineas_investigaciones->linea_investigacion }}">

                    </div>

                    <div class="form-group">

                        <label class="form-label">Carrera</label>

                        <input id="id_carrera" disabled class="form-control" type="text" name="id_carrera"
                        value="{{ $lineas_investigaciones->carreras->carrera }}">

                    </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
{{-- Fin de Modal de Ver --}}
