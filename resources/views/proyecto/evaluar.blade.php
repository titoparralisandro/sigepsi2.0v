@extends('adminlte::page')

@section('title', '| Evaluar')

@section('plugins.Select2', true)
@section('plugins.Dropzone', true)
@section('plugins.Bs-stepper', true)
@section('plugins.Sweetalert2', true)

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
            <form action="#" id="FormEva" method="POST">
                <div id="divProducto">
                </div>
            </form>
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
                "proyecto" : "{{ $data->id }}",
                "especialidad" : "{{ $data->id_especialidad }}",
                "lineas_investigacion" : "{{ $data->id_linea_investigacion }}"
            },
            success: function(response){
                $("#divProducto").empty().append(response);
            }
        });
        var stepper = new Stepper($('.bs-stepper')[0])
        var valor_barra=0;
        var valor_actual0;
        var valores_barra = new Array();
        $(".next").click((e)=>{
            var key = "prod_"+(stepper._currentIndex+1);
            if($.inArray(key,valores_barra)>0){
                valores_barra[key]=valor_barra;
            }else{
                valores_barra.push(key,valor_barra)
                valor_barra=0;
            }

            stepper.next();
        });
        $(".Prev").click(()=>{
            valor_barra=valores_barra["prod_"+(stepper._currentIndex+1)];
            valor_actual=valor_barra;
            stepper.previous();
        });
        $('select').change(function(e){
            var element = e.currentTarget;
            var id = element.dataset.id
            var peso = element.dataset.peso
            if (element.value == "Culminado") {
                valor_barra += parseInt(peso);
            }else{
                valor_actual = $("#bar_progress_"+id)[0].textContent
                valor_barra = parseInt(valor_actual)-parseInt(peso);
            }
            $("#bar_"+id).css("width",valor_barra+"%");
            $("#bar_progress_"+id).html(valor_barra);
        });

        $("#FormEva").submit(function (e) {
            e.preventDefault();
            var form = e.target;
            var item = {};
            var j = 0;
            for (let i = 0; i < form.length; i++) {
                var element = form[i];
                if(element.nodeName == "SELECT"){
                    var idItems= element.id.split("_")
                    item[j] =JSON.stringify({
                        "estructura": element.dataset.id,
                        "items": idItems[1],
                        "value": element.value
                    });
                    j++;
                }
            }
            var key = "prod_"+(stepper._currentIndex+1);
            if($.inArray(key,valores_barra)>0){
                valores_barra[key]=valor_barra;
            }else{
                valores_barra.push(key,valor_barra)
            }
            var formData = new FormData();
            formData.append('progresos',valores_barra);
            formData.append('_token',"{{ csrf_token() }}");
            formData.append('proyecto',"{{ $data->id }}");
            formData.append('especialidad',"{{ $data->id_especialidad }}");
            formData.append('lineas_investigacion',"{{ $data->id_linea_investigacion }}");
            formData.append('items',JSON.stringify(item));
            $.ajax({
                type: "POST",
                url: "/SaveEvaluar",
                processData: false,
                contentType: false,
                async: false,
                cache: false,
                data: formData,
                success: function(response){
                    if (response.exito) {
                        Swal.fire({
                            title: 'Datos registrado con exito',
                            text: "Proceso exitoso",
                            icon: 'success'
                        })
                        window.location.href = "/proyecto";
                    }

                }
            });
        });

    });

</script>
@stop
