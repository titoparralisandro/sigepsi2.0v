@extends('layouts.app')

@section('content')

<!-- about breadcrumb -->
<section class="w3l-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
            <h2 class="title mt-5 pt-lg-5 pt-sm-3">Nuestro Sistema</h2>
            <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-5">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active"> / Nosotros </li>
            </ul>
        </div>
    </div>
    <div class="waveWrapper waveAnimation">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
        </svg>
    </div>
</section>
<!-- //about breadcrumb -->
<section id="about" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-graduation-cap"></span>
                        </div>
                        <div class="info">
                            <p>Nuestra</p>
                            <h4><a href="#">Misión</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">Ser una herramienta tecnológica que propicie el desarrollo integral de las casas de estudio y su potencial estudiantil en concordancia con el trabajo comunitario.</p>
                    </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-book"></span>
                        </div>
                        <div class="info">
                            <p>Nuestra</p>
                            <h4><a href="#">Visión</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">Ser una herramienta tecnológica al alcance de todas las casas de estudio a nivel universitario y posibles comunidades contibuyendo con el desarrollo del país.</p>
                    </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-trophy"></span>
                        </div>
                        <div class="info">
                            <p>Nuestra</p>
                            <h4><a href="#">Meta</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">Brindar control y seguimiento oportuno de los proyectos socio integradores que se lleven a cabo dentro de las casas de estudio donde se implementen esta herramienta tecnológica.</p>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="w3l-block py-5" id="">
    <div class="container py-lg-5 py-md-3">
        <div class="row">
            <div class="col-lg-6 about-right-faq align-self">
                <span class="title-small text-center mb-2">Historia</span>
                <h3 class="title-big mx-0 text-center" >del Sistema</h3>
                <p class="mt-lg-4 mt-3 mb-lg-5 mb-4 text-center">
                    SIGEPSI 2.0v surge a partir de una fase de diagnóstico donde se encontró que en la universidad pionera <strong>UPTECMS</strong>, el desarrollo y seguimiento de los proyectos socio integradores se están realizando de forma manual, por ende se carece de un aval donde los estudiantes y los docentes sean respaldados por las actividades que se desarrollen en el mismo, y el aval estadístico que dé respuesta a ¿Cuáles son los avances de los proyectos que se están desarrollando? ¿Hasta dónde están llegando los proyectos? ¿Cuáles son los resultados que se les ofrece a las comunidades?.</p>
                <div class="two-grids mt-md-0 mt-md-5 mt-4">
                    <div class="grids_info">
                        <h4>Problemática</h4>
                        <p class="center">Donde en su primera versión, desprende de si otras series de dificultades:
                            <br>•	Proceso no actualizado.
                            <br>•	Módulos pendientes.
                            <br>•	Nivel de seguimiento básico.</p>
                    </div>
                    <div class="grids_info" >
                        <h4><b>Justificación</b></h4>
                        <p class="center">El sistema otorga las ventajas de:
                            <br>•	Procesos optimizados y actualizados.
                            <br>•	Seguimiento oportuno.
                            <br>•	Innovación tecnológica.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 left-wthree-img mt-lg-0 mt-sm-5 mt-4" style="display: flex;justify-content: center;align-items: center;">
                <img src="{{ asset('images/proyect.png') }}" alt="" class="img-fluid radius-image">
            </div>
        </div>
    </div>
</section>
<!-- stats -->
<section class="w3l-stats py-5" id="stats">
    <div class="gallery-inner container py-lg-5 py-md-4">
        <span class="title-small text-center mb-1"></span>
        <h3 class="title-big text-center mb-5">Progresos</h3>
        <div class="row stats-con">
            <div class="col-md-3 col-6 stats_info counter_grid">
                <p class="counter">{{$comunidades}}</p>
                <span class="plus">+</span><br>
                <h3>Comunidades registradas</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid1">
                <p class="counter">{{$lineas}}</p>
                <span class="plus">+</span><br>
                <h3>Áreas de conocimientos registradas (Lineas de investigación)</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid mt-md-0 mt-4">
                <p class="counter">{{$proyectos}}</p>
                <span class="plus">+</span><br>
                <h3>Proyectos realizados y en desarrollo</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid2 mt-md-0 mt-4">
                <p class="counter">{{$personas}}</p>
                <span class="plus">+</span><br>
                <h3>Estudiantes registrados en los diferentes proyectos</h3>
            </div>
        </div>
    </div>
</section>
<!-- //stats -->

@endsection
