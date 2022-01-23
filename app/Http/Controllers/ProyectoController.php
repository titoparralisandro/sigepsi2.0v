<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Proyecto;
use App\Models\Carrera;
use App\Models\Trayecto;
use App\Models\Especialidade;
use App\Models\Lineas_investigacione;
use App\Models\Estado;
use App\Models\Evaluacione;
use App\Models\Estructuras_evaluacione;
use App\Models\Files;
use Illuminate\Http\Request;

use Illuminate\Http\File;

class ProyectoController extends Controller
{
    public function index(){
        $proyecto= DB::table('proyectos')
            ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
            ->join("carreras","proyectos.id_especialidad","carreras.id")
            ->join("trayectos","proyectos.id_trayecto","trayectos.id")
            ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
            ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
            ->get();
        return view('proyecto.index',["proyecto"=>$proyecto]);
    }

    public function create(Request $request){
        $especialidad = Especialidade::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $carrera = Carrera::all();
        $trayecto = Trayecto::all();
        $estados = Estado::all();
        return view('proyecto.create',["lineas_investigacion"=>$lineas_investigacion,
                                        "carrera"=>$carrera,
                                        "estados"=>$estados,
                                        "especialidad"=>$especialidad,
                                        "trayecto"=>$trayecto]);
    }
    public function evaluar($id)
    {
        $proyecto= DB::table('proyectos')
        ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
        ->join("carreras","proyectos.id_especialidad","carreras.id")
        ->join("trayectos","proyectos.id_trayecto","trayectos.id")
        ->select("proyectos.*","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","trayectos.descripcion")
        ->where("proyectos.id","=",$id)
        ->get();
        return view('proyecto.evaluar',['data'=>$proyecto[0]]);
    }

    public function SaveEvaluar(Request $request)
    {

        $progresos=0;
        $progresosT=0;
        $ArrayProgre = explode(",",$request->get("progresos"));
        $ArrayItem = array();
        $ArrayItemV = array();
        $i=0;
        foreach ($ArrayProgre as $value) {
            $key = explode("_",$value);
            if(count($key)>1){
                $ArrayItem[$i]=$key[1];
            }else{
                $ArrayItemV[$i]=$value;
                $progresos+=$value;
            }
            $i++;
        }
        $progresosT=round($progresos/count($ArrayItemV),0,PHP_ROUND_HALF_UP);
        $evaluaciones = new Evaluacione();
        $evaluaciones->id_proyecto = $request->get("proyecto");
        $evaluaciones->progreso =$progresosT;
        $evaluaciones->save();

        $data =json_decode($request->get("items"));
        foreach ($data as $key => $value) {
           $dataDetalle =json_decode($value,true);
           $estru_eval = new Estructuras_evaluacione();
           $estru_eval->id_evaluacion = $evaluaciones->id;
           $estru_eval->id_items_estructura = $dataDetalle["items"];
           $estru_eval->id_estructura = $dataDetalle["estructura"];
           if($dataDetalle["value"] == "Pendiente"){
                $estru_eval->id_estatus_progreso = 1;
           }else{
                $estru_eval->id_estatus_progreso = 2;
           }
           $estru_eval->save();
        }
        return response()->json(["exito"=>true]);
    }

    public function getalumnos(Request $request)
    {
        $comunidades = DB::table('personas')
            ->join("trayectos","trayectos.id","personas.trayecto")
            ->whereRaw("cod_carrera = '".$request->get('carrera')."' AND (CAST(cedula AS VARCHAR(10)) LIKE '".$request->get('q')."%' OR nombres LIKE '".$request->get('q')."%' OR apellidos LIKE '".$request->get('q')."%')")
            ->select("personas.id","personas.nombres","personas.apellidos","trayectos.trayecto","personas.cedula")
            ->get();
        $html="";
        foreach ($comunidades as $comunidad) {
            $html .="<tr>";
            $html .="<td>".$comunidad->id."</td>";
            $html .="<td>".$comunidad->cedula."</td>";
            $html .="<td>".$comunidad->nombres." ".$comunidad->apellidos."</td>";
            $html .="<td>".$comunidad->trayecto."</td>";
            $html .="<td><button class='btn btn-success' type='button' onclick=\"selectAlumno(".$comunidad->id.",'".$comunidad->nombres." ".$comunidad->apellidos."','".$comunidad->trayecto."','".$comunidad->cedula."')\">Seleccionar</button></td>";
            $html .="</tr>";
        }
        return $html;
    }

    public function getProdestruc(Request $request)
    {
        $comunidades = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->leftjoin("lineas_investigaciones","estructuras.id_linea_investigacion","lineas_investigaciones.id")
            ->select("productos.producto","productos.id","estructuras.id as estrucId")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."'")
            ->get();
        $nav="<div class='bs-stepper-header' role='tablist'>";
        foreach ($comunidades as $index =>$comunidad) {
            $nav.='<div class="step" data-target="#'.$comunidad->producto.'-part">';
            $nav.='<button type="button" class="step-trigger" role="tab" aria-controls="'.$comunidad->producto.'-part" id="'.$comunidad->producto.'-part-trigger">';
            $nav.='<span class="bs-stepper-circle">'.$comunidad->id.'</span>';
            $nav.='<span class="bs-stepper-label">'.$comunidad->producto.'</span>';
            $nav.='</button>';
            $nav.='</div>';
            if($index != count($comunidades) - 1) {
                $nav.='<div class="line"></div>';
            }
        }
        $nav.="</div>";
        $content="<div class='bs-stepper-content'>";
        foreach ($comunidades as $index =>$producto) {
            $content.='<div id="'.$producto->producto.'-part" class="content" role="tabpanel" aria-labelledby="'.$producto->producto.'-part-trigger">';
            $content.="<div class='form-group p-4'>";
            $content.="<table class='table table-striper'>";
            $content.="<thead class='text-center'>";
            $content.="<tr>";
            $content.="<th width='30%'>Item</th>";
            $content.="<th width='20%'>Peso</th>";
            $content.="<th width='50%'>Estatud</th>";
            $content.="</tr>";
            $content.="</thead>";
            $content.="<tbody id='tableItem' class='text-center'>";
            $item_estructura = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->join("item_estructuras","item_estructuras.id_estructura","estructuras.id")
            ->join("items_estructuras","item_estructuras.id_items","items_estructuras.id")
            ->select("item_estructuras.id","item_estructuras.peso","items_estructuras.item")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."' and estructuras.activa=true and estructuras.id_producto='".$producto->id."'")
            ->get();
            foreach ($item_estructura as $item) {
                $content.="<tr>";
                $content.="<td>".$item->item."</td>";
                $content.="<td>".$item->peso."</td>";
                $content.="<td><select data-id='".$producto->id."' data-peso='".$item->peso."' name='estatud_".$item->id."' id='estatud_".$item->id."' class='form-control'><option value='Pendiente'>Pendiente</option><option value='Culminado'>Culminado</option></select></td>";
                $content.="</tr>";
            }
            $content.="</tbody>";
            $content.="</table>";
            $content.='<div class="progress" style="height:30px">';
            $content.='<div id="bar_'.$producto->id.'" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width:0%;">';
            $content.="<p style='margin-top:15px;font-size:20px'><span id='bar_progress_".$producto->id."'></span>/100</p>";
            $content.="</div>";
            $content.="</div>";
            $content.="</div>";
            if($index != count($comunidades) - 1) {
                if($index>=1){
                    $content.='<a class="btn btn-secondary Prev" id="btnPrev">Anterior</a>';
                }
                $content.='<a class="btn btn-primary next" id="btnNext">Siguiente</a>';
            }else{
                $content.='<a class="btn btn-secondary Prev" id="btnPrev">Anterior</a>';
                $content.='<button type="submit" class="btn btn-success">Registrar</button>';
            }
            $content.="</div>";
        }
        $content.="</div>";
        $html  = '<div class="bs-stepper">';
        $html .= $nav;
        $html .= $content;
        $html .= "</div>";
        return $html;
    }

    public function getProducto(Request $request){
        $comunidades = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->leftjoin("lineas_investigaciones","estructuras.id_linea_investigacion","lineas_investigaciones.id")
            ->select("productos.producto","productos.id")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."'")
            ->get();
        $nav="<ul class='nav nav-tabs'>";
        foreach ($comunidades as $comunidad) {
            $nav.="<li class='nav-item'><a class='nav-link' data-toggle='tab' href='#".$comunidad->producto.$comunidad->id."'>".$comunidad->producto."</a></li>";
        }
        $nav.="</ul>";
        $content="<div class='tab-content'>";
        foreach ($comunidades as $producto) {
            if($producto->id == 1){
                $content.="<div id='".$producto->producto.$producto->id."' class='tab-pane fade active show'>";
            }else{
                $content.="<div id='".$producto->producto.$producto->id."' class='tab-pane fade'>";
            }
            $content.="<div class='form-group p-4'>";
            $content.="<label class='form-label'>Documento de ".$producto->producto."</label>";
            $content.="<input type='file' class='form-control' name='file_".$producto->producto."' id='file_".$producto->producto."'>";
            $content.="</div>";
            $content.="</div>";
        }
        $content.="</div>";
        $html = $nav;
        $html .= $content;
        return $html;
    }

    public function store(Request $request){
        $proyecto = new Proyecto();

        $proyecto->titulo = $request->get('titulo');
        $proyecto->fecha_inicio = $request->get('fecha_inicio');
        $proyecto->fecha_fin = $request->get('fecha_fin');
        $proyecto->id_especialidad = $request->get('id_especialidad');
        $proyecto->id_linea_investigacion = $request->get('id_lineas_investigacion');
        $proyecto->id_trayecto = $request->get('id_trayecto');
        //$proyecto->direccion = $request->get('direccion');

        $proyecto->save();
        mkdir(public_path('upload/'.$proyecto->id), 0777, true);
        foreach ($request->files as $key => $value) {
            $nombre_documento = explode("_",$key);
            $documento = new Files();
            $documento->documento = 'upload/'.$proyecto->id.'/proyect_'.$nombre_documento[1].'.pdf';
            $documento->id_proyecto = $proyecto->id;
            $documento->save();
            copy($request->file($key), public_path('upload/'.$proyecto->id.'/proyect_'.$nombre_documento[1].'.pdf'));
        }

        //$max_size = (int)ini_get('upload_max_filesize') * 15360;

        return redirect('/proyecto')->with('respuesta', 'creado');

        //OJOOOOOO OJOOOOOO ---> VER VER Editar ::
     //los permisos en linux 775 chmod para que guarde la ruta para que guarde los PDF
    }

    public function show(Proyecto $proyectos, $id){

        $proyecto = Proyecto::findOrFail($id);
        return view('proyecto.show', compact(['proyecto', 'id']));
        
    }

}
