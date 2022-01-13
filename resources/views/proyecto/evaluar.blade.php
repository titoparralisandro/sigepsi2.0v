@extends('adminlte::page')

@section('title', 'Evaluar')

@section('plugins.Select2', true)
@section('plugins.Dropzone', true)

@section('content_header')

<div class="card-header bg-primary ">
    <div class="color-palette">
        <h1 class="text-center"><strong>{{$proyectos->name}}</strong></h1>
    </div>
</div>
<div class="card border-dark">
    <div class="card-body text-dark">
            <div class="row">
                <div class="form-group col-4">
                    <label class="form-label">Carrera</label>
                    <input type="text" class="form-control" name="id_carrera" id="id_carrera" readonly value="">
                </div>
                <div class="form-group col-6">
                    <label class="form-label">Linea de investigación</label>
                    <input type="text" class="form-control" name="id_lineas_investigacion" id="id_lineas_investigacion" readonly value="">
                </div>
                <div class="form-group col-2">
                    <label class="form-label">Trayecto</label>
                    <input type="text" class="form-control" name="id_trayecto" id="id_trayecto" readonly value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control" name="id_producto" id="id_producto" readonly value="">
                </div>
            </div>
        @endforeach
        <hr>
        <div class="form-group container">
            <div class="contenerdor form-group container" id="a">
                <div class="contenerdor">
                    <table class="table table-striper" id="table_item">
                        <thead class="text-center">
                            <tr>
                                <th width="40%">Item</th>
                                <th width="40%">Peso</th>
                            </tr>
                        </thead>
                        <tbody id="tableItem" class="text-center" disabled>
                            @foreach ($items as $item)
                                <tr>
                                    <td  disabled>{{$item->item}}</td>
                                    <td  disabled>{{$item->peso}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer" >
    <strong> &copy; 2022 | <a href="{{ url('/home')}}">SIGEPSI</a> | </strong>
    Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 2.0
    </div>
</footer>

@stop

@section('js')
<script>

</script>
@stop
