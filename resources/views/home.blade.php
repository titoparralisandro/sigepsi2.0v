@extends('adminlte::page')

@section('title', '| Inicio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@stop

{{-- @section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Bienvenida</h1>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Bienvenida</li>
                    </ol>
                </div>
            </div>
        </div>
  </section>
@stop  --}}

@section('content')

<div class="card" >
	<div class="contenedor ">
		<div class="fixed" style="padding: 25px;">
			<div class="principal">
				<h2 class="animate__animated animate__backInDown">
					<strong style="color: rgba(0,0,0,.7); padding-bottom:60px; font-size:35px;">Sistema de Gestión de Proyectos Socio Integradores de la Universidad Politécnica Territorial de Caracas "Mariscal Sucre"</strong>
				</h2>
				<p class="animate__animated animate__backInLeft" style="color: rgba(0,0,0,.7); padding-bottom:40px; font-size:19px; width: 80%;
				margin: auto;">
					La implementación de este sistema tiene como objetivo el control y seguimiento de los proyectos socio integradores realizados en la UPTCMS. A su vez nos permitirá como institución tener un historial o banco de proyectos ejecutados.
				</p>	
			</div>

			<div class="animate__animated animate__backInLeft" style="display: flex; justify-content: center; font-size:17px; text-align:justify;">
				<div class="col-sm-4" style="display: flex; justify-content: center; ">
					<div class="card" style="box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);">
						<div class="card-body justify-content-center" style="    display: flex !important;
						flex-direction: column !important;
						justify-content: center !important;
						align-items: center !important;  ">
						<h5 class="card-title"><p class="alert alert-warning">Información para ingresar al sistema</p></h5>
						<p class="card-text center">En caso de ser estudiante para ingresar al sistema se debe utilizar el correo y contraseña asignados en el Sistema Integrado de Admisión y Control de Estudios (SIACE).</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4 animate__animated animate__backInLeft" style="display: flex; justify-content: center; font-size:17px; text-align:justify;">
					<div class="card" style="box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);">
						<div class="card-body justify-content-center" style="    display: flex !important;
						flex-direction: column !important;
						justify-content: center !important;
						align-items: center !important; ">
						<h5 class="card-title"><p class="alert alert-warning">Soporte sigepsi</h5>
							<p class="card-text center"> Si tiene algún inconveniente con respecto al sistema puede plantear su problemática a través de la dirección de correo electrónico soporte.sigepsi@gmail.com</p>
						</div>
					</div>
				</div>
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
