@extends('adminlte::page')

@section('title', 'Usuarios')

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
    <h1 class="text-center"><strong>Usuarios</strong></h1>
  </div>
</div>
<!-- Modal view -->
<div class="modal fade xl" id="modal-data" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <form action="/SaveEditUser" method="POST" id="formEdit">
                <div class="modal-header card-header bg-primary">
                    <div class="color-palette">
                        <h1 class="text-center" id="tituloModal"><strong>Ver comunidad</strong></h1>
                    </div>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-body text-dark" id="data">

                    </div>
                </div>
                <div class="modal-footer" id="modal_footer">
                    <button type='submit' class='btn btn-primary' id="btnEdit">Editar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal view -->
<!-- Modal view -->
    <div class="modal fade xl" id="modal-create" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header card-header bg-primary">
                    <div class="color-palette">
                        <h1 class="text-center"><strong>Formulario de registro de usuario</strong></h1>
                    </div>
                </div>
                <form action="/SaveUser" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="roles">Nombre de usuario</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="roles">Correo de usuario</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="roles">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="roles">Confirmacion de contraseña</label>
                            <input type="password" id="password_Cnf" name="password_Cnf" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="roles">Rol de usuario</label>
                            <select class="form-control" name="rol" id="rol" required>
                                <option value="null">Seleccione una opcion</option>
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->name}}">{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
        </div>
    </div>
<!-- /Modal view -->
<div class="card border-dark">
    <div class="card-body text-dark">
        <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nuevo Usuario</button>
        <hr>
        <table id="example" class="table table-striped table-bordered nowrap"  style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary" type="button" onclick="getdata('{{ $usuario->id }}')">Ver</button>
                                <button class="btn btn-info" type="button" onclick="editdata('{{ $usuario->id }}')">Editar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
    <script>
        function getdata(id) {
            $.ajax({
                type: "POST",
                url: "/getUser",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id
                },
                success: function(response){
                    $("#data").html(response);
                    $("#tituloModal").html("<strong>Visualizacion de datos</strong>");
                    $("#btnEdit").hide();
                    $('#modal-data').modal('show');
                }
            });
        }
        function editdata(id) {
            $.ajax({
                type: "POST",
                url: "/editUser",
                async: false,
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id":id
                },
                success: function(response){
                    $("#data").html(response);
                    $("#tituloModal").html("<strong>Edicion de datos</strong>");
                    $("#btnEdit").show();
                    $('#modal-data').modal('show');
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
                url: "/SaveEditUser",
                async: false,
                cache: false,
                data: $("#formEdit").serialize(),
                success: function(response){
                    if(response.error){
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                        })
                    }else{
                        Swal.fire({
                            title: 'Datos actualizados',
                            text: "Proceso exitoso",
                            icon: 'success',
                        })
                        location.reload();
                    }
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
    });
</script>
@stop
