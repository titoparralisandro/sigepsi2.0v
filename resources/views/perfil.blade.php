@extends('adminlte::page')

@section('title', 'Perfil')

@section('plugins.Toastr', true)

@section('content_header')

<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-10 vorder rounded shadow bg-white">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#perfil-tab" class="nav-link active" data-toggle="pill">Perfil</a></li>
            <li class="nav-item"><a href="#contacto-tab" class="nav-link" data-toggle="pill">Contacto</a></li>
            {{--<li class="nav-item"><a href="#configuracion-tab" class="nav-link" data-toggle="pill">Contacto</a></li>
            {{-- <li class="nav-item"><a href="#contacto-tab" class="nav-link" data-toggle="pill">Contacto</a></li>
            <li class="nav-item"><a href="#ayuda-tab" class="nav-link" data-toggle="pill">Ayuda</a></li> --}}
        </ul>

        <div class="tab-content">
            <div class="tab-pane show fade active justify-content-center p-5" id="perfil-tab">
{{-- 
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

                </div> --}}

                <img src="vendor/adminlte/dist/img/avatar.png" width="150px" height="150px" class="rounded-circle border border-primary mx-auto d-flex my-2">
                <h2 class="text-center my-3">Perfil</h2>
<center>
                <div class="row center">
                    <div class="form-group col">
                        <label class="form-label">Nombre:</label>
                        <p>{{ auth()->user()->name }} </p>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Email:</label>
                        <p>{{ auth()->user()->email }} </p>
                    </div>
                </div>

                {{-- <label class="form-label">Imagen de perfil:</label>
                <input type="file" name="avatar" class="form-control btn"> --}}
            </div>
        </center>
            {{-- <div class="tab-pane fade p-5" id="configuracion-tab">

                <h4 class="text-center">Configuración</h4>
                <div class="row center">
                    <div class="form-group col">
                        <label class="form-label">Nombre:</label>
                        <p>{{ auth()->user()->name }} </p>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Email:</label>
                        <p>{{ auth()->user()->email }} </p>
                    </div>
                </div>

                <label class="form-label">Imagen de perfil:</label>
                <input type="file" name="avatar" class="form-control btn">

            </div> --}}

            <div class="tab-pane fade p-5" id="contacto-tab">

                <h4 class="text-center">Contacto</h4>

                <form action="{{ route('comentario.store') }}" method="POST">
                @csrf

                    <input type="hidden" name="name" id="name" value="{{auth()->user()->name}}">
                    <input type="hidden" name="email" id="email" value="{{auth()->user()->email}}">


                <div class="form-group ">

                    <label class="form-label">Asunto:</label>
                    <input id="asunto" class="form-control" type="text" name="asunto"
                    placeholder="Coloca el asunto de tu correo como sugerencias o reporte de falla en el sistema">

                </div>

                <div class="form-group ">

                <label class="form-label">Comentario:</label>
                <textarea id="comentario" class="form-control" name="comentario" cols="25" rows="5" placeholder="Escribe tu comentario, este puede ser una sugerencia, reclamo, inconveniente, entre otros."></textarea>

                </div>

                <button type="submit" class="btn btn-success">Enviar </button>
                </form>

            </div>

            <div class="tab-pane fade p-5" id="ayuda-tab">

                <h4 class="text-center">Credenciales</h4>

                <h6>Contraseña:</h6>
                <p>PHP v{{ PHP_VERSION }} </p>
                <h6>Framework utilizado:</h6>
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
                <h6>Puedes escribirnos a:</h6>
                <p>admin@sigepsi.com</p>


            </div>
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
    @if(session('respuesta')=='creado')
        <script>
            toastr.success('Su Comentario se creo exitosamente.')
        </script>
    @endif
@stop
