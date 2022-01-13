@extends('adminlte::page')

@section('title', 'Perfil')

@section('plugins.Select2', true)
@section('plugins.Dropzone', true)

@section('content_header')

<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-10 vorder rounded shadow bg-white">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#perfil-tab" class="nav-link active" data-toggle="pill">Perfil</a></li>
            <li class="nav-item"><a href="#configuracion-tab" class="nav-link" data-toggle="pill">Configuración</a></li>
            <li class="nav-item"><a href="#contacto-tab" class="nav-link" data-toggle="pill">Contacto</a></li>
            <li class="nav-item"><a href="#ayuda-tab" class="nav-link" data-toggle="pill">Ayuda</a></li>
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
                <?php $user = auth()->user()->name; ?>
                <h6>Name:</h6>
                <p>{{ auth()->user()->name }} </p>
                <h6>Email:</h6>
                <p>{{ auth()->user()->email }} </p>
                <h6>Contraseña:</h6>
                <p>{{ auth()->user()->password }} </p>

                <label class="form-label">Imagen de perfil:</label>
                <input type="file" name="avatar" class="form-control btn">

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
        </div>
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

</script>
@stop
