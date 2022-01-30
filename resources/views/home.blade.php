@extends('adminlte::page')

@section('title', '| Inicio')

@section('content_header')

<div class="container card" style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding-top: 30px;">

	<h3 class="text-center" style="padding-bottom:10px; color: rgb(0,0,0,.7);"><strong>BIENVENIDOS AL SISTEMA DE GESTIÓN DE PROYECTOS SOCIO INTEGRADORES DE LA UNIVERSIDAD POLITÉCNICA TERRITORIAL DE CARACAS "MARISCAL SUCRE"</strong></h3>

	<p class="text-center" style="padding-bottom: 20px; width: 80%; font-size:18px;">
		La implementación de este sistema tiene como objetivo el control y seguimiento de los proyectos socio integradores realizados en la UPTCMS.
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

        {{-- <body onload="startTime()">
            <div id="clockdate">
                <div class="clockdate-wrapper">
                  <div id="clock"></div>
                  <div id="date"></div>
                </div>
              </div> --}}
{{-- <span id="liveclock" style="left:0;top:0; font-size:36px; font-family:'Arial'"></span> --}}

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

@section('css')

<style>
/* date_default_timezone_set('America/Caracas');
        $DateAndTime = date('d-m-Y h:i a', time()); */
.clockdate-wrapper {
    background-color: #333;
    padding:25px;
    max-width:350px;
    width:100%;
    text-align:center;
    border-radius:5px;
    margin:0 auto;
    margin-top:15%;
}
#clock{
    background-color:#333;
    font-family: sans-serif;
    font-size:60px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
    color:#888;
    text-shadow:0px 0px 1px #333;
    font-size:30px;
    position:relative;
    top:-27px;
    left:-10px;
}
#date {
    letter-spacing:10px;
    font-size:14px;
    font-family:arial,sans-serif;
    color:#fff;
}

</style>

@stop

@section('js')

<script>
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;

    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script>




@stop
