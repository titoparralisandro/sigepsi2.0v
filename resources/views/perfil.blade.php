@extends('adminlte::page')

@section('title', 'Perfil')

@section('plugins.Select2', true)

@section('content_header')

<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-10 vorder rounded shadow bg-white">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#perfil-tab" class="nav-link active" data-toggle="pill">Perfil</a></li>
            <li class="nav-item"><a href="#configuracion-tab" class="nav-link" data-toggle="pill">Configuración</a></li>
            <li class="nav-item"><a href="#contacto-tab" class="nav-link" data-toggle="pill">Contacto</a></li>
            <li class="nav-item"><a href="#ayuda-tab" class="nav-link" data-toggle="pill">Ayuda</a></li>
            <li class="nav-item"><a href="#prueba-tab" class="nav-link" data-toggle="pill">Prueba</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show fade active justify-content-center px-5" id="perfil-tab">

                <img src="vendor/adminlte/dist/img/avatar5.png" width="150px" height="150px" class="rounded-circle border border-primary mx-auto d-flex my-2">
                <h2 class="text-center my-3">Perfil</h2>

                <div class="mx-auto my-3 d-flex justify-content-center">

                    <button class="btn btn-success btn-sm">Ver perfil <i class="fas fa-user"></i></button>
                    <button class="btn btn-info mx-3 btn-sm">Editar perfil <i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-primary btn-sm">Mensaje <i class="fas fa-envelope"></i></button>

                </div>

                <hr>

                <h4>Información</h4>

                <div class="form-group">

                    <h6><i class="fas fa-briefcase"></i> Trabajas en:</h6>
                    <p>Cantv Sede Principal Nea.</p>

                </div>
                <div class="form-group">

                    <h6><i class="fas fa-university"></i> Estudias en:</h6>
                    <p>Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS).</p>

                </div>
                <div class="form-group">

                    <h6><i class="fas fa-home"></i> Vives en:</h6>
                    <p>Caracas, Distrito Capital. Caricuao.</p>

                </div>

            </div>

            <div class="tab-pane fade p-5" id="configuracion-tab">

                <h4 class="text-center">Configuración</h4>

                <h6>Name:</h6>
                <p>the providers <a href="#" class="float-rigth">Edit/Change</a></p>
                <h6>Email:</h6>
                <p>titoparralisandro@gmail.com <a href="#" class="float-rigth">Edit/Change</a></p>
                <h6>Contraseña:</h6>
                <p>********* <a href="#" class="float-rigth">Edit/Change</a></p>
                <h6>Teléfono:</h6>
                <p>0426-410.92.26 <a href="#" class="float-rigth">Edit/Change</a></p>

            </div>

            <div class="tab-pane fade p-5" id="contacto-tab">

                <h4 class="text-center">Contacto</h4>

                <div class="form-group ">

                <form>

                <label class="form-label">Estudiante:</label>
                <input id="estudiante" class="form-control" type="text" disabled name="estudiante" value="Lisandro Parra">

                </div>

                <div class="form-group">

                <label class="form-label">Email:</label>
                <input id="email" class="form-control" type="text" disabled readonly name="email" value="titoparralisandro@gmail.com">

                </div>

                <div class="form-group ">

                <label class="form-label">Comentario:</label>
                <textarea id="comentario" class="form-control" name="comentario" cols="25" rows="5" placeholder="Escribe tu comentario, este puede ser una sugerencia, reclamo, inconveniente, entre otros."></textarea>

                </div>

                <button type="submit" class="btn btn-success">Enviar </button>
                </form>

            </div>

            <div class="tab-pane fade p-5" id="ayuda-tab">

                <h4 class="text-center">Ayuda</h4>

                <h6>Lenguaje utilizado para el desarrollo del sistema:</h6>
                <p>PHP v{{ PHP_VERSION }} </p>
                <h6>Framework utilizado:</h6>
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
                <h6>Framework adicionales utilizados:</h6>
                <p>Boostrap v4.4 </p>


            </div>

            <div class="tab-pane fade p-5" id="prueba-tab">

                <h4 class="text-center">Estructura</h4>
                <form>
                    <div class="contenerdor form-group" id="a">
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

                <select id='item' class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>

                  <div class="form-group">
                    <select id='item' class="form-control select2 select2-danger" data-dropdown-css-class='select2-danger'>
                    </select>
                    </div>
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
$("#item").select2({});
function borrar(obj) {
    field = document.getElementById('field');
    field.removeChild(document.getElementById(obj));
}

</script>
@stop
