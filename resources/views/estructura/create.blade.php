@extends('adminlte::page')

@section('title', '| Estrcutura')

@section('plugins.Select2', true)

@section('content_header')
<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Estructura evaluativa</strong></h1>
  </div>
</div>

<div class="card border-dark">
  <div class="card-body text-dark">
    <div class="row">

        <div class="form-group col-4">

            <label class="form-label">Carrera</label>
            <select name="id_carrera" id="id_carrera" class="form-control">
            <option selected>Seleccionar carrera</option>
                @foreach ($carrera as $item)
                    <option value="{{$item->id_carrera}}">{{$item->carrera}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group col-6">

            <label class="form-label">Linea de investigación</label>
            <select name="id_lineas_investigacion" id="id_lineas_investigacion" class="form-control">
                <option selected>Seleccionar linea de investigación</option>
                    @foreach ($lineas_investigacion as $item)
                        <option value="{{$item->id_lineas_investigacion}}">{{$item->linea_investigacion}}</option>
                    @endforeach
            </select>

        </div>

        <div class="form-group col-2">

            <label class="form-label">Taryecto</label>
            <select name="id_trayecto" id="id_trayecto" class="form-control">
                <option selected>Seleccionar trayecto</option>
                    @foreach ($trayecto as $item)
                        <option value="{{$item->id_trayecto}}">{{$item->trayecto}} {{$item->descripcion}}</option>
                    @endforeach
            </select>

        </div>

    </div>
    <div class="row">
        <div class="form-group col-12">

            <label class="form-label">Producto</label>
            <select name="id_producto" id="id_producto" class="form-control">
                <option selected>Seleccionar producto</option>
                @foreach ($producto as $item)
                        <option value="{{$item->id_producto}}">{{$item->producto}}</option>
                @endforeach
            </select>  
                
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
                                <th>Item</th>
                                <th>Peso</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody id="tableItem" class="text-center">

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-center">
                                <button type="button" class="btn btn-success" id="sendData">Enviar</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </form>
       </div>
    </div>
  </div>
</div>

@stop

@section('js')

<script>
    $(function() {
    $("#sendData").click(function(e) {
            var dataFinal = new Array();
            var table = $("#tableItem")[0].children;
            for (let i = 0; i < table.length; i++) {
                dataFinal.push(new Object({'item':$("#item"+(i+1)).val(),'point':$("#point_estruct"+(i+1)).val()}));
            }
            $.ajax({
                type: "POST",
                url: "items_estructura",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data" : JSON.stringify(dataFinal)
                },
                success: function(response){

                }
            });
    })
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
        if(punto>0){
            
            icremento++;
            var line = "";
            line +="<tr id='file_"+icremento+"'>";
            line +="<td><select name='item"+icremento+"' id='item"+icremento+"' class='form-control'><option value='null'>Selecione un item</option></select></td>";
            line +="<td><input type='text' id='point_estruct"+icremento+"' name='point_estruct"+icremento+"' onchange='calcular_punto(this.value)' class='form-control' minlength='1' maxlength='2'></td>";
            line +="<td><button class='btn btn-primary' type='button' onclick='removeItem(file_"+icremento+")'><i class='fa fa-trash'></i></button></td>";
            line +="</tr>";
            $("#tableItem").append(line);
        }else{
            $("#btnADD").attr("hidden",true);
        }
    }
    
    function borrar(obj) {
        field = document.getElementById('field');
        field.removeChild(document.getElementById(obj));
    }
$("#item").select2({});
$("#id_carrera").select2({});
$("#id_lineas_investigacion").select2({});
$("#id_trayecto").select2({});
</script>
@stop
