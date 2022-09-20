{{-- Modal de Ver {{ route('coordinador.store') }} --}}
<form action="" method="POST" enctype="multipart/form-data">

<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header card-header bg-primary">

                    <div class="color-palette">
                      <h1 class="text-center"><strong>Añadir nuevo coordinador</strong></h1>
                    </div>

            </div>
            <div class="modal-body">@csrf
                <div class="card-body text-dark">
                
                    <div class="row">

                        <div class="form-group col col-8">

                          <label class="form-label">Coordinador</label>
                          <input id="nombre" class="form-control" type="text" name="nombre"
                          value="{{ isset($coordinador->nombre)?$coordinador->nombre:old('coordinador') }}">

                        </div>

                        <div class="form-group col col-4">
    
                            <label class="form">Teléfono de contacto</label>
                            <input id="telefono_contacto" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="telefono_contacto"
                            value="{{ isset($coordinador->telefono_contacto)?$coordinador->telefono_contacto:old('telefono_contacto') }}">

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col">
                            <label class="form">Carrera</label>
    
                            <select id="id_carrera" name="id_carrera" class="form-control">
                            <option selected>Seleccionar carrera</option>
                                @foreach ( $carrera as $carreras)
        
                                    <option value="{{$carreras->id}}">{{ $carreras->carrera }}</option>
        
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
    
                            <label class="form">Correo</label>
                            <input id="email" class="form-control" type="email" name="email"
                            value="{{ isset($coordinador->email)?$coordinador->email:old('email') }}">
    
                        </div>
    
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

{{-- Fin de Modal de Registro --}}
