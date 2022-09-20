@extends('adminlte::page')

@section('title', '| Coordinador')

@section('plugins.Sweetalert2', true)
@section('plugins.Inputmask', true)
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

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <h3 style="color: #007bce;font-weight: normal;font-size: 20px;font-family: Arial;text-transform: uppercase;">
    <strong>SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES (SIGEPSI) 2.0v</strong>
    </h3>
</div>

<div class="card-header bg-primary ">
  <div class="color-palette">
    <h1 class="text-center"><strong>Coordinadores / Departamentos</strong></h1>
  </div>
</div>

<div class="card border-dark">

  <div class="card-body text-dark">

            <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Añadir nuevo coordinador</button>

    <hr>
        <table id="example" class="table table-striped table-bordered nowrap"  style="width:100%">
                <thead>
                    <tr>

                        <th>N°</th>
                        <th>Coordinador</th>
                        <th>Carrera</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
            <tbody>
                @foreach ($coordinador as $coordinadores)
                <tr>

                    <td>{{ $coordinadores->id }}</td>
                    <td>{{ $coordinadores->nombre }}</td>
                    <td>{{ $coordinadores->carreras->carrera }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('coordinador.show', $coordinadores->id ) }}">Ver<a>
                        <a class="btn btn-info" href="{{ route('coordinador.edit', $coordinadores->id ) }}">Editar<a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
  </div>
</div>

@include('coordinador.modal.create')

<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/a_cerca_de')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>
@stop

@section('js')

    @if(session('respuesta')=='creado')
    <script>
    toastr.success('Registro creado con éxito.')
    </script>
    @endif

    @if(session('respuesta')=='eliminado')
    <script>
    Swal.fire(
    'Eliminado!',
    'Registro eliminado con éxito.',
    'success')
    </script>
    @endif

    @if(session('respuesta')=='editado')
    <script>
    toastr.info('Registro editado con éxito.')
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
            text: "¡Esta acción no se puede deshacer.!",
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

    });

    $(function () {$('[data-mask]').inputmask()});
</script>
@stop
