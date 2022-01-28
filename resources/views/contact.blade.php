@extends('layouts.app')
@section('content')

<!-- about breadcrumb -->
<section class="w3l-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
            <h2 class="title mt-5 pt-lg-5 pt-sm-3">Ponte en contacto</h2>
            <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active"> / Contactanos </li>
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
<!-- contact block -->
<!-- contact1 -->
@csrf
<section class="w3l-contact-1 pb-5" id="contact">
    <div class="contacts-9 py-lg-5 py-md-4">
        <div class="container">
            <div class="d-grid contact-view">
                <div class="cont-details">
                    <h3 class="title-big mb-4">Ponte en contacto</h3>
                    <p class="mb-sm-5 mb-4">Si quieres desarrollar alguna aplicación web y necesitas ayuda ponte en contacto con nosotros.</p>

                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Nuestra dirección de la oficina principal</h6>
                            <p class="pr-lg-5">Antiguo edificio La Fosforera, Av. Intercomunal de Antímano, Caracas 1000, Distrito Capital</p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Si necesitas ayuda, llámanos</h6>
                            <p><a href="tel:+(212) 5550000">+(212) 5550000</a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Contacta con nuestro soporte</h6>
                            <p><a href="mailto:soporte.sigepsi@gmail.com" class="mail">soporte.sigepsi@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="map-content-9">
                    <h5 class="mb-sm-4 mb-3">Escríbenos</h5>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="twice-two">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                required value="{{ isset($comentario->name)?$comentario->name:old('name') }}">

                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo"
                                required value="{{ isset($comentario->email)?$comentario->email:old('email') }}">
                        </div>
                        <div class="twice">
                            <input type="text" class="form-control" name="asunto" id="asunto"
                                placeholder="Asunto" required value="{{ isset($comentario->asunto)?$comentario->asunto:old('asunto') }}">
                        </div>

                            <textarea name="comentario" class="form-control" id="comentario" placeholder="Mensaje"
                            required value="{{ isset($comentario->comentario)?$comentario->comentario:old('comentario') }}"></textarea>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-style mt-4">Enviar mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /contact1 -->
<div class="map-iframe">
  <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7846.886581515321!2d-66.97782746092781!3d10.465677779608738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a5f8a59d74de9%3A0x9ef687489afc1498!2sUniversidad%20Polit%C3%A9cnica%20Territorial%20de%20Caracas%20Mariscal%20Sucre!5e0!3m2!1ses-419!2sve!4v1641061720603!5m2!1ses-419!2sve"
        width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!-- //contact block -->

@endsection

@section('js')
    @if(session('respuesta')=='creado')
        <script>
            alert('su mensdaje ha sido enviado');
        </script>
    @endif
@stop
