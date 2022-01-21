@extends('adminlte::page')

@section('title', 'Evaluar')

@section('plugins.Select2', true)
@section('plugins.Dropzone', true)

@section('content_header')
<div class="card-header bg-primary ">
    <div class="color-palette">
        <h1 class="text-center"><strong>{{ $data->titulo}}</strong></h1>
    </div>
</div>
<div class="card border-dark">
    <div class="card-body text-dark">
            <div class="row">
                <div class="form-group col-4">
                    <label class="form-label">Carrera</label>
                    <input type="text" class="form-control" name="id_carrera" id="id_carrera" readonly value="{{ $data->carrera}}">
                </div>
                <div class="form-group col-6">
                    <label class="form-label">Linea de investigación</label>
                    <input type="text" class="form-control" name="id_lineas_investigacion" id="id_lineas_investigacion" readonly value="{{ $data->linea_investigacion}}">
                </div>
                <div class="form-group col-2">
                    <label class="form-label">Trayecto</label>
                    <input type="text" class="form-control" name="id_trayecto" id="id_trayecto" readonly value="{{ $data->trayecto." ".$data->descripcion}}">
                </div>
            </div>
        <hr>
        <div class="form-group container">
            <div id="divProducto">
            </div>
        </div>
    </div>
</div>

<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/home')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>

@stop

@section('js')
<script>
    $(document).ready(() =>{
        $.ajax({
            type: "POST",
            url: "/getProdestruc",
            async: false,
            cache: false,
            data: {
                "_token" : "{{ csrf_token() }}",
                "especialidad" : "{{ $data->id_especialidad }}",
                "lineas_investigacion" : "{{ $data->id_linea_investigacion }}"
            },
            success: function(response){
                $("#divProducto").empty().append(response);
            }
        });
        var valor_barra=0;
        var valores_barra = [];
        $('select').change(function(e){
            var element = e.currentTarget;
            var id = element.dataset.id
            var peso = element.dataset.peso
            if (element.value == "Culminado") {
                valor_barra += parseInt(peso);
            }else{
                var valor_actual = $("#bar_progress_"+id)[0].textContent
                valor_barra = parseInt(valor_actual)-parseInt(peso);
            }
            $("#bar_"+id).css("width",valor_barra+"%");
            $("#bar_progress_"+id).html(valor_barra);
        });
        $('li').click(function(e){
            var container = $(this).parent()[0].children;
            var element = e.currentTarget;
            var id=element.id.split("_");
            valores_barra[id[0]+"_"+(id[1]-1)] = valor_barra;
            valor_barra=0;
        })
    });

</script>
@stop
