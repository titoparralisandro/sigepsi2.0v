<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<img src="{{ public_path('/images/cintillo.jpg') }}" width="100%" height="">

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
background-color:#365985;
color:#FFF;
}

table td,th{
border:2px solid black;
}

table th{
color:yellow; 
}

.menu{
background-color:#69C;
color:#FFF;
}

.menu a{
color:#FFF; 

}

footer{
color:#000; 
background-color:white;
padding: 0.5px;
}

#padding{
    padding: 5.5px;

}

#h1footer{
    font:14px Arial, Tahoma, Verdana, Helvetica, sans-serif;
}
</style>

<br><br><br>
@php date_default_timezone_set("America/Caracas"); @endphp
<h3>Fecha de reportes: {{date("d/m/Y")}}</h3> 
<h3>Hora de reportes:  {{date("G:i:s")}}</h3>  
<br><br>
<h1>Listado de usuarios SIGEPSI</h1>
<br><br><br>
<table >
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $usuario)
        <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
.page-break {
    page-break-after: always;
}
</style>

<br><br><br><br><br><br><br><br>

<hr>
<footer >
    <div id="padding">
    <h1 id="h1footer">
    <strong id="footer" > &copy; 2022 | <a href="{{ url('')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS) <b>Versión</b> 2.0</h1>
    </div>
</footer>
<hr>
<!--
<h1>Página 1</h1>
<div class="page-break"></div>
<h1>Página 2</h1>
-->