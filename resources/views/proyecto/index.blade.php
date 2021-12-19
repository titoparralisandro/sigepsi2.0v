@extends('adminlte::page')

@section('title', ' Comunidades')

@section('plugins.Sweetalert2', true)

@section('plugins.Toastr', true)

@section('plugins.Datatables', true)

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
@section('content_header')


<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Comunidades</strong></h1>
  </div>
</div>
<!-- Modal view -->
    <div class="modal fade xl" id="modal-show" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header card-header bg-primary">
                    <div class="color-palette">
                        <h1 class="text-center"><strong>Ver comunidad</strong></h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card-body text-dark" id="getdata">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<!-- /Modal view -->
<!-- Modal view -->
<div class="modal fade xl" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="#" method="POST" id="formEdit">
            @csrf
            <div class="modal-content ">
                <div class="modal-header card-header bg-primary">
                    <div class="color-palette">
                        <h1 class="text-center"><strong>Ver comunidad</strong></h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card-body text-dark" id="data">

                    </div>
                </div>
                <div class="modal-footer" id="modal_footer">
                    <button type='submit' class='btn btn-primary'>Editar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Modal view -->
<div class="card border-dark">
  <div class="card-body text-dark">
    <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nueva comunidad</button>
    <hr>
    <div>
        <div class="btn-group" id="btn-search">
            <button class="btn btn-primary" type="button" value="Todos">Todos</button>
            <button class="btn btn-primary" type="button" value="Escuela">Escuela</button>
            <button class="btn btn-primary" type="button" value="Centro de salud">Centro de salud</button>
        </div>

    </div>
        <table id="example" class="table table-striped table-bordered nowrap"  style="width:100%">
                <thead>
                    <tr>

                        <th>N°</th>
                        <th>Comunidad</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
            <tbody>
                @foreach ($comunidad as $comunidades)
                <tr>
                    <td>{{ $comunidades->id }}</td>
                    <td>{{ $comunidades->nombre }}</td>
                    <td>{{ $comunidades->persona_contacto }} | {{ $comunidades->telefono_contacto }}</td>
                    <td>{{ $comunidades->tipos_comunidades->tipo_comunidad }} </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary" type="button" onclick="getdata('{{ $comunidades->id }}')">Ver</button>
                            <button class="btn btn-info" type="button" onclick="editdata('{{ $comunidades->id }}')">Editar</button>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
  </div>
</div>

@include('comunidades.modal.create')

@stop

@section('js')
    <script>
        function editdata(id) {
            $.ajax({
                type: "POST",
                url: "/editcomunid",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id
                },
                success: function(response){
                    $("#data").html(response);
                    $('#modal-edit').modal('show');
                }
            });
        }
        function getdata(id) {
            $.ajax({
                type: "GET",
                url: "/showcomunid/"+id,
                async: false,
                cache: false,
                data: {"_token": "{{ csrf_token() }}"},
                success: function(response){
                    $("#getdata").html(response);
                    $('#modal-show').modal('show');
                }
            });
        }
        function getMunicipio(e) {
            $.ajax({
                type: "POST",
                url: "municipios",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "texto" : e.target.value
                },
                success: function(response){
                    console.log(response)
                    var opciones ="<option value='0'>Seleccione su municipio</option>";
                    for (let i in response.lista) {
                        opciones+= '<option value="'+response.lista[i].id_municipio+'">'+response.lista[i].municipio+'</option>';
                    }
                    $("#id_municipio").empty().append(opciones);
                    $("#id_parroquia").empty();
                }
            });
        }
        function getParroquia(e) {
            $.ajax({
                type: "POST",
                url: "parroquias",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "texto" : e.target.value
                },
                success: function(response){
                    var opciones ="<option value='0'>Seleccione su parroquia</option>";
                    for (let i in response.lista) {
                        opciones+= '<option value="'+response.lista[i].id_parroquia+'">'+response.lista[i].parroquia+'</option>';
                    }
                    $("#id_parroquia").empty().append(opciones);
                }
            });
        }
    </script>

    @if(session('respuesta')=='creado')
    <script>
    toastr.success('Prueba, ha sido creada.')
    </script>
    @endif

    @if(session('respuesta')=='eliminado')
    <script>
    Swal.fire(
    'Eliminado!',
    'El registro se ha eliminado con éxito.',
    'success')
    </script>
    @endif

    @if(session('respuesta')=='editado')
    <script>
    toastr.info('Prueba, se ha editado correctamente.')
    </script>
    @endif
    <script>
    $('.toastrDefaultSuccess').click(function() {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $(".eliminar").submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no tiene vuelta atrás!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
            this.submit();
            }
        })

    });
$(document).ready(function() {
        $("#formEdit").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/SaveEditcomunid",
                async: false,
                cache: false,
                data: $("#formEdit").serialize(),
                success: function(response){
                    Swal.fire({
                        title: 'Datos actualizados',
                        text: "Proceso exitoso",
                        icon: 'success',
                    })
                    location.reload();
                }
            });
        });
        var table = $('#example').DataTable( {
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            }
        });
        $('#btn-search').on( 'click', 'button',(e)=> {
            var valor = $(this)[0].activeElement.value;
            if (valor=="Todos") {
                table.search('').columns(3).search('').draw();
            }else{
                table.column(3).search(valor).draw();
            }
        });
    });
</script>
@stop
