@extends('layouts.app')

@section('content')

<!-- about breadcrumb -->
<section class="w3l-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
            <h2 class="title mt-5 pt-lg-5 pt-sm-3">Nuestra Universidad</h2>
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
                            <h4><a href="#url">Misión</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">Ser la casa de estudio vanguardia en aportes para nuestro país.</p>
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
                            <h4><a href="#url">Visión</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p>
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
                            <h4><a href="#url">Meta</a></h4>
                        </div>
                    </div>
                    <p class="mt-4">If you are looking for
                        high-quality and reliable online courses.</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="w3l-aboutblock1 py-5" id="about">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row">
            <div class="col-lg-6 align-self">
                <span class="title-small mb-2">About Us</span>
                <h3 class="title-big mx-0">Welcome to the Coursing - all available online courses</h3>
                <p class="mt-lg-4 mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                    ultrices ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Non quae, fugiat.</p>
                <p class="mt-3 mb-lg-5">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                    ultrices ligula. Semper at. Lorem ipsum dolor sit amet elit. Non quae.</p>
            </div>
            <div class="col-lg-6 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <img src="assets/images/about.jpg" alt="" class="img-fluid radius-image">
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="w3l-servicesblock w3l-servicesblock1 py-5" id="progress">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row">
            <div class="col-lg-6 align-self pr-lg-4">
                <div class="progress-info info1">
                    <h6 class="progress-tittle">Figma illustrations <span class="">80%</span></h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%"
                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <div class="progress-info info2">
                    <h6 class="progress-tittle">PHP programming <span class="">95%</span>
                    </h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%"
                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <div class="progress-info info3">
                    <h6 class="progress-tittle">Web design & development <span class="">90%</span></h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%"
                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <div class="progress-info info4">
                    <h6 class="progress-tittle">Adobe Photoshop <span class="">75%</span></h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%"
                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
                <div class="progress-info info2 mb-0">
                    <h6 class="progress-tittle">Wordpress design <span class="">95%</span></h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%"
                            aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5 pl-lg-4">
                <span class="title-small mb-2">Progress bars</span>
                <h3 class="title-big">  What you have in our Popular Online Courses</h3>
                <p class="mt-md-4 mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                    ultrices in ligula. Semper at. Lorem ipsum dolor sit amet
                    elit. Non quae, fugiat nihil ad. Lorem ipsum dolor sit amet. Lorem ipsum init
                    dolor sit, amet elit. Dolor ipsum non velit, culpa! elit ut et.</p>
                    <a href="#url" class="btn btn-primary btn-style mt-md-5 mt-4">Get started now</a>
            </div>
        </div>
    </div>
</section> --}}
<section class="w3l-block py-5" id="">
    <div class="container py-lg-5 py-md-3">
        <div class="row">
            <div class="col-lg-6 about-right-faq align-self">
                <span class="title-small mb-2">Start online course</span>
                <h3 class="title-big mx-0"> Enhance your skills with best online courses</h3>
                <p class="mt-lg-4 mt-3 mb-lg-5 mb-4">Se propone como estrategia de aprendizaje que permite la construcción del conocimiento a partir del aprender haciendo, donde se propicia el reconocimiento en principio por el propio participante de sus conocimientos, habilidades y destrezas, que luego debe desarrollar a partir del desarrollo de <b>Proyectos Socio Integradores</b> convirtiéndose en crecimiento personal y confianza en el participante de su proceso formativo y del rol profesional a desempeñar. </p>
                <div class="two-grids mt-md-0 mt-md-5 mt-4">
                    <div class="grids_info">
                        <h4>Global Certificate</h4>
                        <p class="">Pellen tesque libero ut justo,
                            ultrices in ligula elit sed.</p>
                    </div>
                    <div class="grids_info">
                        <h4>Books and library</h4>
                        <p class="">Pellen tesque libero ut justo,
                            ultrices in ligula elit sed.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <img src="assets/images/about1.jpg" alt="" class="img-fluid radius-image">
            </div>
            <div class="col-lg-3 col-6  left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <img src="assets/images/about2.jpg" alt="" class="img-fluid radius-image">
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
                <p class="counter">30 </p>
                <span class="plus">+</span><br>
                <h3>Comunidades Registradas</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid1">
                <p class="counter">56</p>
                <span class="plus">+</span><br>
                <h3>Proyectos realizados</h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid mt-md-0 mt-4">
                <p class="counter">70</p>
                <span class="plus">+</span><br>
                <h3></h3>
            </div>
            <div class="col-md-3 col-6 stats_info counter_grid2 mt-md-0 mt-4">
                <p class="counter">243 </p>
                <span class="plus">+</span><br>
                <h3>Profesionales en diferentes áreas </h3>
            </div>
        </div>
    </div>
</section>
<!-- //stats -->

@endsection
