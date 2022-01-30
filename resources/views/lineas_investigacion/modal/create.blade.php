{{-- Modal de Ver {{ route('lineas_investigacion.store') }} --}}
<form action="" method="POST" enctype="multipart/form-data">

<div class="modal fade xl" id="modal-create" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header card-header bg-primary">

                    <div class="color-palette">
                      <h1 class="text-center"><strong>Añadir nueva línea de investigación</strong></h1>
                    </div>

            </div>
            <div class="modal-body">
                <div class="card-body text-dark">

                @csrf
                        <div class="form-group">

                          <label class="form-label">Línea de investigación</label>
                          <input id="linea_investigacion" class="form-control" type="text" name="linea_investigacion"
                          value="{{ isset($linea_investigacion->linea_investigacion)?$linea_investigacion->linea_investigacion:old('linea_investigacion') }}">

                        </div>

                        <div class="form-group">

                            <label class="form-label">Carrera</label>

                            <select id="id_carrera" name="id_carrera" class="form-control">
                            <option selected>Seleccionar carrera</option>
                            @foreach ( $carrera as $carreras)

                                <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>

                            @endforeach
                            </select>

                        </div>

                      </form>
                </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Registrar</button>

            </div>
        </div>
    </div>
</div>

{{-- Fin de Modal de Ver --}}
