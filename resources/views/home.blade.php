@extends('adminlte::page')

@section('title', '| Inicio')

@section('content_header')

<div class="container card" style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding-top: 30px;">

	<h3 class="text-center" style="padding-bottom:10px; color: rgb(0,0,0,.7);"><strong>BIENVENIDOS AL SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES DE LA UNIVERSIDAD POLITÉCNICA TERRITORIAL DE CARACAS "MARISCAL SUCRE"</strong></h3>
	
	<p class="text-center" style="padding-bottom: 20px; width: 80%; font-size:18px;">
		La implementación de este sistema tiene como objetivo el control y seguimiento de los proyectos socio integradores realizados en la UPTCMS. A su vez nos permitirá como institución tener un historial o banco de proyectos ejecutados.
	</p>
	
	<div class="row" style="display: flex; justify-content: space-around;">

		<div class="col-sm-5 card text-center">
			<h5 class="alert alert-warning"><strong>Información Para Ingresar al Sistema</strong></h5>
			<p style="font-size:17px;">
				En caso de ser estudiante para ingresar al sistema se debe utilizar el correo y contraseña asignados en el Sistema Integrado de Admisión y Control de Estudios (SIACE).
			</p>
		</div>

		<div class="col-sm-5 card text-center">
			<h5 class="alert alert-warning"><strong>Información Soporte Sigepsi</strong></h5>
			<p style="font-size:17px;">
				Si tiene algún inconveniente con respecto al sistema puede plantear su problemática a través de la dirección de correo electrónico soporte.sigepsi@gmail.com
			</p>
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
