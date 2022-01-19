<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Proyecto;
use App\Models\Carrera;
use App\Models\Trayecto;
use App\Models\Especialidade;
use App\Models\Lineas_investigacione;
use App\Models\Estado;
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
            ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto")
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
        return view('proyecto.evaluar');
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
        $proyecto->id_especialidad = $request->get('especialidad');
        $proyecto->id_linea_investigacion = $request->get('linea_investigacion');
        $proyecto->id_trayecto = $request->get('trayecto');
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


        //
        //OJOOOOOO OJOOOOOO ---> VER VER Editar ::
     //los permisos en linux 775 chmod para que guarde la ruta para que guarde los PDF
    }


}
