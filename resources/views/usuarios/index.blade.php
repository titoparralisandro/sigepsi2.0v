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

<div class="card border-dark">
    <div class="card-body text-dark">
        <button href="#" class="btn btn-success" >Añadir nuevo Usuario</button>
        <hr>
        <!-- table table-striped table-bordered nowrap -->
        <table id="example" class="table table-bordered table-hove"  style="width:100%">
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
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                <a class="btn btn-warning" href="{{route('usuarios.edit', $usuario)}}">Asignar rol</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
  '
Registro eliminado con éxito.',
  'success'
  )
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

</script>
@stop
