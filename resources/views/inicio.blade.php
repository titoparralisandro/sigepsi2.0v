@extends('layouts.app')

@section('content')

<!-- main-slider -->

<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Comunidad</h5>
                                    <p class="mt-4 pr-lg-4">Si eres una comunidad y necesitas una ayuda a encontrar una solución a un proceso en concreto podemos ayudarte</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="{{url('register')}}"> ¿Registrate e inscribe tu situación o problemática?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            {{-- <div class="item">
                <li>
                    <div class="slider-info  banner-view banner-top1 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Biblioteca digital </h5>
                                    <p class="mt-4 pr-lg-4">Desde sus incios como universidad hemos ayudado a diversas comunidades y organizaciones como escuelas y entes gubernamentales con sus diferentes procesos, aportando un granito de arena en apoyo al desarrollo del país en diversas áreas</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.html"> Ver portafolio </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div> --}}
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top2 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Información</h5>
                                    <p class="mt-4 pr-lg-4"> SIGEPSI 2.0v no es un software más, es una herramienta desarrolla en pro del desarrollo de una educación de calidad. </p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="{{url('about')}}"> Ver más </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top3 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Contacto</h5>
                                    <p class="mt-4 pr-lg-4">Si deseas adquirir nustro software e implmentarlo en la casa de estudio o realizar un comentario</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="{{url('contact')}}"> Contacto </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>

    <div class="waveWrapper waveAnimation">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
        </svg>
    </div>
</section>
<section class="w3l-aboutblock1 py-5" id="about">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row">
            <div class="col-lg-6 align-self">
                <h3 class="title-big mx-0">SIGEPSI 2.0v</h3>
                <p class="mt-lg-4 mt-3">Plantea como objetivo el desarrollo de un sistema informático el cual permita gestionar toda la información referente al proyecto socio integradores que se lleven a cabo en la institución, a través de los requerimientos proporcionados de los usuarios, para el desarrollo, implementación y evaluación de este sistema informático.</p>
            </div>
            <div class="col-lg-6 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <img src="{{ asset('images/aaaa.png') }}" alt="" class="img-fluid radius-image">
            </div>
        </div>
    </div>
</section>
<!-- /main-slider -->
<section class="w3l-features py-5" id="facilities">
    <div class="call-w3 py-lg-5 py-md-4 py-2">
        <div class="container">
            <div class="row main-cont-wthree-2">
                <div class="col-lg-5 feature-grid-left">
                    <h5 class="title-small mb-1">Objetivos</h5>
                    <h3 class="title-big mb-4">General</h3>
                    <p class="text-para">Desarrollar el Sistema de Gestión de Proyectos Socio Integradores de la Universidad Politécnica Territorial de Caracas “Mariscal Sucre” (SIGEPSI) 2.0v.</p>
                    <a href="{{ url('about') }}" class="btn btn-primary btn-style mt-md-5 mt-4">Ver más información</a>
                </div>
                <div class="col-lg-7 feature-grid-right mt-lg-0 mt-5">
                    <div class="call-grids-w3 d-grid">
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span style="font-size: 45px;"><i class="fas fa-clipboard-list"></i></span></a>
                            <h4><a href="#feature" class="title-head">Diagnosticar</a></h4>
                            <p>El contexto donde se desenvuelve el sistema en la Universidad Politécnica Territorial de Caracas “Mariscal Sucre”.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span style="font-size: 45px;"><i class="fas fa-pencil-ruler"></i></span></a>
                            <h4><a href="#feature" class="title-head">Planificar</a></h4>
                            <p>Bajo las deficiencias del sistema actual y los nuevos requerimientos para un mejor abordaje de la problemática.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span style="font-size: 45px;"><i class="fas fa-laptop-code"></i></span></a>
                            <h4><a href="#feature" class="title-head">Implementar</a></h4>
                            <p>El Sistema de Gestión de Proyectos Socio Integradores en la Universidad Politécnica Territorial de Caracas “Mariscal Sucre” (SIGEPSI) 2.0v.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span style="font-size: 45px;"><i class="fas fa-tasks"></i></span></a>
                            <h4><a href="#feature" class="title-head">Evaluar</a></h4>
                            <p>El desenvolvimiento del SIGEPSI 2.0v en la Universidad Politécnica Territorial de Caracas “Mariscal Sucre”.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- middle -->
<div class="middle py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="welcome-left text-center py-lg-4">
            <h3 class="title-big">Para mayor información</h3>
            <a href="{{ url('about') }}" class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2">Acerca del sistema</a>
            <a href="{{ url('contact') }}" class="btn btn-style btn-primary mt-sm-5 mt-4">Contactarnos</a>
        </div>
    </div>
</div>
<!-- //middle -->
<!-- testimonials -->
<section class="w3l-testimonials" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-4 py-md-3 pb-lg-0">

            <h5 class="title-small text-center mb-1">Comunidades</h5>
            <h3 class="title-big text-center mb-sm-5 mb-4">Testimonios</h3>
            <!-- /grids -->
            <div class="testimonial-width">
                <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote class="center">
                                    <q>Después de casi dos años de pelear con mi sistema web
                                        donde ofrecemos cursos en una escuela online , me sentía perdido y con
                                        una gran frustración al no controlar muchos conceptos. Afortunadamente
                                         encontré a la <b>UPTECMS</b> y me aportó
                                         algo que considero fundamental para cualquier profesional no experto
                                         en informática: tranquilidad y seguridad. </q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team1.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Roberto Sánchez Cánovas</h3>
                                        <p class="indentity">Director Comuna Venceremos </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>La presente es para señalar un gran agradecimiento inicialmente a la
                                          universidad por  brindarnos la oportunidad de ser formados como profesionales utiles
                                        al desarrollo de nuestra patria, a nuestros Tutor y profesores de
                                        las distintas asignaturas,de igual manera a la comunidad que nos
                                        abrió las puertas para el desarrollo de este proyecto
                                         socio integrador.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team2.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Alexandra Chacón</h3>
                                        <p class="indentity">Estudiante</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team2.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Roy Linderson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team4.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Mike Thyson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team2.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team3.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team2.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('images/team3.jpg') }}" class="img-fluid"
                                            alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /grids -->
    </div>
    <!-- //grids -->
</section>
<!-- //testimonials -->
@endsection
