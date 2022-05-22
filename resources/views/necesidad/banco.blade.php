@extends('adminlte::page')

@section('title', '| Necesidades')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')

<div class="card-header bg-primary">
    <div class="color-palette">
      <h1 class="text-center"><strong>Estudio de la necesidad ({{ $necesidad->id }})</strong></h1>
    </div>
</div>

  <div class="card border-dark">
    <div class="card-body text-dark">
        <center><label class="form-label">Necesidad</label></center>
        <textarea class="form-control" cols="25" rows="3" disabled>{{ $necesidad->necesidad }}</textarea><hr>

            <form action="{{ route('banco') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="id_necesidad" id="id_necesidad" value="{{$necesidad->id}}">
                            
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Carrera</label>
                        <select class="form-control" name="id_carrera" id="id_carrera" required>
                        <option selected value="">Seleccionar carrera</option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id}}">{{ $carrera->carrera}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="row">
                    <div class="form-group col col-5 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Especialidad</label>
                                <select class="form-control" name="id_especialidad" id="id_especialidad" required>
                                    <option value=""></option>
                        
                                </select>
                        </div>
                        <div class="form-group col col-7 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Linea de investigación</label>
                            <select class="form-control" name="id_lineas_investigacion" id="id_lineas_investigacion" required>
                                <option value=""></option>
                            </select>
                        </div>
                </div>
                        <div class="mb-3">
                            <label class="form-label">Estatus Situación</label>
                            <textarea id="situacion" class="form-control" name="situacion" cols="25" rows="4"
                            placeholder="Escriba su dirección de forma detallada." required></textarea>
                        </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
        </div>
  </div>
  
@stop

@section('js')

    <script>

        $("#id_carrera").change((e)=> {
            var valor =e.target.value;
            $.ajax({
                type: "POST",
                url: "{{ url('/getdataInvest')}}",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":valor
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione una opción</option>";
                    for (let i in response) {
                        opciones+= '<option value="'+response[i].id+'">'+response[i].text+'</option>';
                    }
                    $("#id_lineas_investigacion").empty().append(opciones);
                }
            });
        });
        // $("#id_especialidad").select2();
        $("#id_carrera").change((e)=> {
            var valor =e.target.value;
            $.ajax({
                type: "POST",
                url: '{{url("/getdataEspe")}}',
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":valor
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione una opción</option>";
                    for (let i in response) {
                        opciones+= '<option value="'+response[i].id+'">'+response[i].text+'</option>';
                    }
                    $("#id_especialidad").empty().append(opciones);
                }
            });
        });
    </script>

@stop