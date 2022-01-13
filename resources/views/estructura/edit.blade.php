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
    <form action="#" method="POST" id="formEstruct" onsubmit="sendata(this, event)">
        @foreach ($estructura as $estruc)
            <div class="row">
                <div class="form-group col-4">
                    <input type="text" class="form-control" name="id" id="id" readonly value="{{$estruc->id}}" hidden>
                    <label class="form-label">Carrera</label>
                    <input type="text" class="form-control" name="id_carrera" id="id_carrera" readonly value="{{$estruc->carrera}}">
                </div>
                <div class="form-group col-6">
                    <label class="form-label">Linea de investigación</label>
                    <input type="text" class="form-control" name="id_lineas_investigacion" id="id_lineas_investigacion" readonly value="{{$estruc->linea_investigacion}}">
                </div>
                <div class="form-group col-2">
                    <label class="form-label">Trayecto</label>
                    <input type="text" class="form-control" name="id_trayecto" id="id_trayecto" readonly value="{{$estruc->trayecto}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control" name="id_producto" id="id_producto" readonly value="{{$estruc->producto}}">
                </div>
            </div>
        @endforeach
        <hr>
        <div class="form-group container">
            <form >
                <div class="contenerdor form-group container" id="a">
                   <div class="col-3" style="float: right;">
                        Puntos Disponibles:  <label id="puntos"></label>
                    </div>
                    <div class="contenerdor">
                        <table class="table table-striper" id="table_item">
                            <thead class="text-center">
                                <tr >
                                    <th width="40%">Item</th>
                                    <th width="40%">Peso</th>
                                </tr>
                            </thead>
                            <tbody id="tableItem" class="text-center">
                                @php
                                    $increment = 0;
                                    $puntos = 100;
                                @endphp
                                @foreach ($items as $item)
                                @php
                                    $increment++;
                                    $puntos -= $item->peso;
                                @endphp
                                    <tr id='file_{{$increment}}'>
                                        <td>
                                            <select name='item{{$increment}}' id='item{{$increment}}' class='form-control'>
                                                <option value="{{$item->id_items}}" selected>{{$item->item}}</option>
                                                @foreach ($itemsAll as $itemsA)
                                                    @if ($itemsA->id <> $item->id_items)
                                                        <option value="{{$itemsA->id}}">{{$itemsA->item}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type='text' id='point_estruct{{$increment}}' name='point_estruct{{$increment}}' onchange='calcular_punto(this.value)' value="{{$item->peso}}" class='form-control' minlength='1' maxlength='2'>
                                        </td>
                                    </tr>
                                @endforeach
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
        </div>
    </form>
  </div>
</div>

<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/home')}}">Sistema de Gestión de Proyectos Socio Integradores</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>

@stop

@section('js')

<script>

    var punto = @php echo $puntos @endphp;
    var objetivo = document.getElementById('puntos');
    objetivo.innerHTML = punto;

    icremento =@php if (isset($increment)) {echo $increment;}else{ echo 0;} @endphp;

    function sendata(form,e) {
        e.preventDefault();
        var form = form[0];
        var dataItems = new Array();
        var dataFinal = new Object();
        var table = $("#tableItem")[0].children;

        for (var i = 0; i < table.length; i++) {
            dataItems.push(new Object({'item':$("#item"+(i+1)).val(),'point':$("#point_estruct"+(i+1)).val()}));
        }

        dataFinal.items=dataItems;
        dataFinal.id_estructura=$("#id")[0].value;
        var puntod=parseInt($("#puntos")[0].innerHTML);
        if (puntod==0) {
            $.ajax({
                type: "POST",
                url: "/EditEstruc",
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
        } else {
            Swal.fire({
                title: 'faltan puntos por asignar',
                text: "Todos los puntos deben estar asignados",
                icon: 'error',
            })
        }

    }

    function calcular_punto(valor) {
        var total = 0;
        var dataFinal = new Object();
        var table = $("#tableItem")[0].children;
        if(valor>0){
            for (var i = 0; i < table.length; i++) {
                total += parseInt($("#point_estruct"+(i+1)).val());
            }
            if(total<100){
                punto = 100-total;
            }else{
                punto= 0;
            }
            $("#puntos").html(punto);
        }else{
            Swal.fire({
                title: 'Datos errados',
                text: "el peso del item debe ser mayor 0",
                icon: 'error',
            })
        }
    }

    function crear(obj) {
        var rowCount = $('#table_item tbody tr').length;
        var inputEmpty = 0;
        if(rowCount>0){
            for (let i = 0; i < rowCount; i++) {
                if ($('#table_item tbody tr')[i].children[1].children[0].value == '') {
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
                    line +="<td><input type='text' id='point_estruct"+icremento+"' name='point_estruct"+icremento+"' onchange='calcular_punto(this.value)' class='form-control' minlength='1' maxlength='2'></td>";
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
</script>
@stop
