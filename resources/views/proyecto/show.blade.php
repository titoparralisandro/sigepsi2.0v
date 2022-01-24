@extends('adminlte::page')

@section('title', ' | Proyecto')

@section('plugins.Toastr', true)

@section('content_header')

{{-- @php 
use App\Models\Files;
$documento = DB::table('files')
            ->select('file')
            ->join('proyectos', 'proyectos.id', '=', 'files.id_proyecto')
            ->where('files.id_proyecto', '=', $proyecto->id)
            ->first();
@endphp --}}

<div class="container d-flex justify-content-center mt-1 ">
    <div class="col-md-12 vorder rounded shadow bg-white">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><a href="#datos-tab" class="nav-link active" data-toggle="pill"><strong>Datos del proyecto </strong></a></li>
            <li class="nav-item"><a href="#equipo-tab" class="nav-link" data-toggle="pill"><strong>Equipo de proyecto</strong></a></li>
            <li class="nav-item"><a href="#comunidad-tab" class="nav-link" data-toggle="pill"><strong>Comunidad</strong></a></li>
            <li class="nav-item"><a href="#documento-tab" class="nav-link" data-toggle="pill"><strong>Documentos</strong></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show fade active p-4" id="datos-tab">

                <div class="form-group">
        
                    <label class="form-label">Título</label>
                    <input class="form-control" type="text" disabled value="{{$proyecto->titulo}}">
    
                </div>
                <div class="row">
                    <div class="form-group col col-2">
            
                        <label class="form-label">Fecha inicio</label>
                        <input class="form-control" type="date" disabled value="{{$proyecto->fecha_inicio}}">
        
                    </div>
                    <div class="form-group col col-2">
            
                        <label class="form-label">Fecha fin</label>
                        <input class="form-control" type="date" disabled value="{{$proyecto->fecha_fin}}">
        
                    </div>
                    <div class="form-group col col-3">
            
                        <label class="form-label">Trayecto</label>
                        <input class="form-control" type="text" disabled value="{{$proyecto->trayectos->trayecto}} ({{$proyecto->trayectos->descripcion}})">
        
                    </div>
                    <div class="form-group col col-5">
            
                        <label class="form-label">Carrera</label>
                        <input class="form-control" type="text" disabled value="{{$proyecto->carreras->carrera}}">
        
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col col-5">
            
                        <label class="form-label">Especialidad</label>
                        <input class="form-control" type="text" disabled value="{{$proyecto->especialidades->especialidad}}">
        
                    </div>
                    <div class="form-group col col-7">
            
                        <label class="form-label">Linea de investigación</label>
                        <input class="form-control" type="text" disabled value="{{$proyecto->linea_investigaciones->linea_investigacion}}">
        
                    </div>
                </div>

                <div class="row">
                    {!!$a!!}
                </div>
                <div class="form-group">
            
                    <label class="form-label">Dirección</label>
                    <textarea class="form-control" cols="25" rows="3" disabled>{{$proyecto->direccion}}{{$proyecto->direccion}}</textarea>
    
                </div>
            </div>

            <div class="tab-pane fade p-4" id="equipo-tab">

                <h4 class="text-center">Asesores</h4>

                <h4 class="text-center">Estudiantes</h4>

            </div>

            <div class="tab-pane fade p-4" id="comunidad-tab">

                <h4 class="text-center">Datos de la comunidad</h4>
                <div>
                     {!!$html!!}
                </div>
               

            </div>

            <div class="tab-pane fade p-4" id="documento-tab">

                <h4 class="text-center">Documentos</h4>

            </div>
        </div>
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