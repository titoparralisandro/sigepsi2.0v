@extends('adminlte::page')

@section('title', '| Acerca de')

@section('content_header')

<div class="container card" style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding-top: 30px;">

	<div class="container">

		<h1 style="text-align: center; color: rgba(0,0,0,.7); font-size: 30px;">
		<strong>A cerca del Sistema de Gestion de Proyectos Socio Integradores </strong><span class="badge bg-success">v2.0</span>
		</h1>
		
		<p style="font-size: 16px; text-align: justify; color: rgba(0,0,0,.8); font-size:18px; text-indent: 5%; width: 93%; margin: auto; padding-top: 15px; padding-bottom: 15px;">
			Para la implementación del Sistema SIGEPSI 2.0v se debe contar con un servidor, que debe poseer como mínimo con las siguientes características en cuanto a hardware: procesador de 2.4GHz para tiempo de respuesta en ciclos de reloj, disco duro de 80gb de capacidad para alojar todos los paquetes e implementar los softwares necesarios y 2gb de memoria RAM, para un tiempo de respuesta optimo entre Servidor/Cliente. En cuanto al Software debe acondicionarse con sistema operativo Linux preferiblemente distribución Debían, servidor web (apache2, Nginx, Cherokee o Lighthttp) instalado con PHP 5.6v y servidor de bases de datos PostgreSQL 9.6 o superior. Debido a que el sistema estará compuesto y desarrollado en lenguaje de programación PHP utilizando el Framework Laravel 8 para estructurarlo, debe contar con los requerimientos antes mencionados.
		</p>
	</div>

	<div class="row" style="display: flex; justify-content: space-around;">

		<div class="col-sm-6 card text-center">
			<h5 class="alert alert-primary"><strong>SIGEPSI 1.0v (2016)</strong></h5>
			<strong style="color: rgba(0,0,0,.7); font-size: 17px;">Integrantes</strong>
			<p style="color: rgba(0,0,0,.7); font-size: 15px;">
				<i class="fas fa-fw fa-user-graduate"></i> Norifer González, <i class="fas fa-fw fa-user-graduate"></i> Vanessa Lezama, <i class="fas fa-fw fa-user-graduate"></i> Edwin Camacho.
			</p>

			<strong style="color: rgba(0,0,0,.7); font-size: 17px;">Docentes Colaboradores</strong>
			<p style="color: rgba(0,0,0,.7); font-size: 15px;">
				<i class="fas fa-fw fa-user-tie"></i> Ing. Alfredo Agreda, <i class="fas fa-fw fa-user-tie"></i> Lic. Edwuard Castañeda, <i class="fas fa-fw fa-user-tie"></i> Ing. Osman Pérez.
			</p>
		</div>

		<div class="col-sm-6 card text-center">
			<h5 class="alert alert-primary"><strong>SIGEPSI 2.0v (2022)</strong></h5>
			<strong style="color: rgba(0,0,0,.7); font-size: 17px;">Integrantes</strong>
			<p style="color: rgba(0,0,0,.7); font-size: 15px;">
				<i class="fas fa-fw fa-user-graduate"></i>Lisandro Parra, <i class="fas fa-fw fa-user-graduate"></i> Moises Villan, <i class="fas fa-fw fa-user-graduate"></i> Samuel Hernandez.
			</p>

			<strong style="color: rgba(0,0,0,.7); font-size: 17px;">Docentes Colaboradores</strong>
			<p style="color: rgba(0,0,0,.7); font-size: 15px;">
				<i class="fas fa-fw fa-user-tie"></i> Lic. Edwuard Castañeda, <i class="fas fa-fw fa-user-tie"></i> Msc. Alfredo Agreda, <i class="fas fa-fw fa-user-tie"></i> Ing. Yovanny Urbina.
			</p>
		</div>
	</div>
</div>

{{-- este footer hay que replicasrlo en todos lados yuju --}}
	<footer class="main-footer" >
		<strong> &copy; 2022 | <a href="{{ url('/a_cerca_de')}}">SIGEPSI</a> | </strong>
		Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
		<div class="float-right d-none d-sm-inline-block">
		<b>Versión</b> 2.0
		</div>
	</footer>

@stop
