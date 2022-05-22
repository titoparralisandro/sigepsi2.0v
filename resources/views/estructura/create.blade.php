@extends('adminlte::page')

@section('title', '| Estrcutura')

@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Estructura evaluativa</strong></h1>
  </div>
</div>

<div class="card border-dark">
  <div class="card-body text-dark">
    <form action="#" method="post" id="formEstruct">
        <div class="row">
            <div class="form-group col-4">
                <label class="form-label">Carrera</label>
                <select name="id_carrera" id="id_carrera" class="form-control"></select>
            </div>
            <div class="form-group col-6">
                <label class="form-label">Linea de investigación</label>
                <select name="id_lineas_investigacion" id="id_lineas_investigacion" class="form-control"></select>
            </div>
            <div class="form-group col-2">
                <label class="form-label">Trayecto</label>
                <select name="id_trayecto" id="id_trayecto" class="form-control" > </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label class="form-label">Producto</label>
                <select name="id_producto" id="id_producto"  place class="form-control"></select>
            </div>
        </div>
        <hr>

        <div class="form-group container">
            <form >
                <div class="contenerdor form-group container" id="a">
                    <input class="btn btn-success" type="button" id="btnADD" value="Añadir item a la estructura" onclick="crear(this)">
                        <div class="col-3" style="float: right;">
                            Puntos Disponibles:  <label id="puntos"></label>
                        </div>
                    <div class="contenerdor">
                        <table class="table table-striper">
                            <thead class="text-center">
                                <tr >
                                    <th width="40%">Item</th>
                                    <th width="40%">Peso</th>
                                    <th width="20%">Accion</th>
                                </tr>
                            </thead>
                            <tbody id="tableItem" class="text-center">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-center">
                                    <button type="submit" class="btn btn-success" id="sendData">Enviar</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <a href="{{ route('estructura.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </form>
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
    $(function() {
        $("#formEstruct").submit(function(e) {
            e.preventDefault();
            var form = $('#formEstruct')[0];
            var dataItems = new Array();
            var dataFinal = new Object();
            var table = $("#tableItem")[0].children;
            for (let i = 0; i < table.length; i++) {
                dataItems.push(new Object({'item':$("#item"+(i+1)).val(),'point':$("#point_estruct"+(i+1)).val()}));
            }
            dataFinal.items=dataItems;
            dataFinal.id_carrera=$("#id_carrera")[0].value;
            dataFinal.id_producto=$("#id_producto")[0].value;
            dataFinal.id_lineas_investigacion=$("#id_lineas_investigacion")[0].value;
            dataFinal.id_trayecto=$("#id_trayecto")[0].value;
            if (punto==0) {
                $.ajax({
                    type: "POST",
                    url: "/SaveEstruc",
                    async: false,
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : dataFinal
                    },
                    success: function(response){
                        Swal.fire({
                            title: 'Datos registrado con exito',
                            text: "Proceso exitoso",
                            icon: 'success',
                        })
                        window.location.href = "/estructura";
                    }
                });
            }else{
                Swal.fire({
                            title: 'Error en el proceso',
                            text: "la cantidad de punto no es igual a 100",
                            icon: 'error',
                        })
            }

        })
        $("#id_producto").select2({
            ajax: {
                url: '/getdataEstruc/producto',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
        $("#id_carrera").select2({
            ajax: {
                url: '/getdataEstruc/carrera',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
        $("#id_lineas_investigacion").select2();
        $("#id_carrera").change((e)=> {
            var valor =e.target.value;
            $.ajax({
                type: "POST",
                url: "/getdataInvest",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":valor
                },
                success: function(response){
                    console.log(response);
                    var opciones ="<option selected >Seleccione una opción</option>";
                    for (let i in response) {
                        opciones+= '<option value="'+response[i].id+'">'+response[i].text+'</option>';
                    }
                    $("#id_lineas_investigacion").empty().append(opciones);
                }
            });
        });
        $("#id_trayecto").select2({
            ajax: {
                url: '/getdataEstruc/trayecto',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    });
    var punto = 100;
    var objetivo = document.getElementById('puntos');
    objetivo.innerHTML = punto;

    icremento =0;

    function removeItem(id) {
        let data = id.id.split("_");
        punto = punto + parseInt($("#point_estruct"+data[1]).val());
        $("#puntos").html(punto);
        id.remove();
        if ($("#btnADD").is(':hidden') && punto>0) {
            $("#btnADD").attr("hidden",false);
        }
    }

    function calcular_punto(valor) {
        if(valor>0 && punto<=100 && valor<=punto){
            punto = punto-valor;
            $("#puntos").html(punto);
            if (punto==0) {
                $("#btnADD").attr("hidden",true);
            }
        }else{
            if(valor == "" && icremento==1){
                punto = 100;
                $("#puntos").html("100");
            }
        }
    }

    function crear(obj) {
        var rowCount = $('#tableItem tr').length;
        var inputEmpty = 0;
        if(rowCount>0){
            for (let i = 0; i < rowCount; i++) {
                if ($("#point_estruct"+(i+1))[0].value == '') {
                    inputEmpty+=1;
                }
            }
        }
        if($("#id_trayecto")[0].value != '' && $("#id_producto")[0].value != '' && $("#id_lineas_investigacion")[0].value != '' && $('#id_carrera')[0].value != ''){
            if (inputEmpty == 0) {
                if(punto>0){
                    icremento++;
                    var line = "";
                    line +="<tr id='file_"+icremento+"'>";
                    line +="<td><select name='item"+icremento+"' id='item"+icremento+"' class='form-control'></select></td>";
                    line +="<td><input placeholder='Ingresa valores mayores a 1' type='text' id='point_estruct"+icremento+"' name='point_estruct"+icremento+"' onchange='calcular_punto(this.value)' class='form-control' minlength='1' maxlength='2'></td>";
                    line +="<td><button class='btn btn-primary' type='button' onclick='removeItem(file_"+icremento+")'><i class='fa fa-trash'></i></button></td>";
                    line +="</tr>";
                    $("#tableItem").append(line);
                    $("#item"+icremento).select2({
                        ajax: {
                            url: '/getdataItem',
                            dataType: 'json',
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            }
                        }
                    });
                }else{
                    $("#btnADD").attr("hidden",true);
                }
            }else{
                Swal.fire({
                    title: 'Informacón Incompleta',
                    text: "Debe Revisar los  Item por peso",
                    icon: 'error',
                })
            }

        }else{
            Swal.fire({
                title: 'Informacón Incompleta',
                text: "Debe completar el Formulario",
                icon: 'error',
            })
        }

    }

    function borrar(obj) {
        field = document.getElementById('field');
        field.removeChild(document.getElementById(obj));
    }

</script>
@stop
