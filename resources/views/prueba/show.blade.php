@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
<div class="bg-primary color-palette"><h1 class="text-center"><strong>Ver</h1></strong></div>
@stop

@section('content')
<div class="bg-info color-palette"><h4 class="text-center"> <hr> </h4>
<div class="bg-white color-palette"><h4 class="text-center">{{ $prueba->id }}</h4>
<div class="bg-white color-palette"><h4 class="text-center">{{ $prueba->name }}</h4>
<div class="bg-white color-palette"><h4 class="text-center">{{ $prueba->apellido }}</h4>
<div class="bg-white color-palette"><h4 class="text-center">{{ $prueba->cedula }}</h4>
<div class="bg-info color-palette"><h4 class="text-center"> <hr><hr> </h4>
<!--<h1>{{ $id }}</h1>-->
</div></div></div></div></div></div>
<a href="{{ route('prueba.index') }}" class="btn btn-primary">volver</a>
<!--
{{ $prueba }}
{{ $id }}
-->
@stop

@section('css')

@stop

@section('js')

@stop