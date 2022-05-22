<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Estilos extra personales **/
                background-color: white;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Estilos extra personales **/
                background-color: white;
                color: black;
                text-align: center;
                line-height: 1.5cm;
            }
        </style>
    </head>
    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header>
<img src="{{ public_path('/images/cintillo.jpg') }}" width="100%" height="">
        </header>

<footer>
 <div >
 <strong> &copy; 2022 | <a href="{{ url('')}}">SIGEPSI</a> | </strong> Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS) <b>Versión</b> 2.0
</div>
</footer>

        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main>
@php date_default_timezone_set("America/Caracas"); @endphp
<h3>Fecha de reportes: {{date("d/m/Y")}}</h3> 
<h3>Hora de reportes:  {{date("G:i:s")}}</h3>  
<br><br>
<h1>Listado de usuarios SIGEPSI</h1>

    <table style="width:100%">
                <thead>
                    <tr>

                        <th>N°</th>
                        <th>Proyecto</th>
                        <th>Carrera</th>
                        <th>Linea de investigación</th>
                        <th>Trayacto</th>
                        <th>Progreso</th>
 

                    </tr>
                </thead>
            <tbody>

                @foreach ($proyecto as $proyectos)
                <tr>
                    <td>{{ $proyectos->id }}</td>
                    <td>{{ $proyectos->titulo }}</td>
                    <td>{{ $proyectos->carrera }}</td>
                    <td>{{ $proyectos->linea_investigacion }} </td>
                    <td>{{ $proyectos->trayecto }}</td>
                    <td> {{ $proyectos->progreso }}% </td>
                </tr>
                @endforeach

            </tbody>
        </table>



        </main>
    </body>
</html>


<style>
body{
font:12px Arial, Tahoma, Verdana, Helvetica, sans-serif;
background-color:white;
color:#000;
}

a h1{
font-size:35px; 
color:#FFF;
}

h2{
color:#FC0;
font-size:15px; 
}

table{
width:100%;
height:auto;
margin:10px 0 10px 0;
border-collapse:collapse;
text-align:center;
background-color:white;
color:black;
}

table td,th{
border:2px solid black;
}

table th{
color:black; 
}

.menu{
background-color:#69C;
color:#FFF;
}

.menu a{
color:#FFF; 

}

</style>


<style>
.page-break {
    page-break-after: always;
}
</style>


<!--
<h1>Página 1</h1>
<div class="page-break"></div>
<h1>Página 2</h1>
-->