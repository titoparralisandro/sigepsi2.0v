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
        $proyecto = Proyecto::all();
        $especialidad = Especialidade::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $carrera = Carrera::all();
        $trayecto = Trayecto::all();
        $estados = Estado::all();
        return view('proyecto.index',["lineas_investigacion"=>$lineas_investigacion,
                                        "proyecto"=>$proyecto,
                                        "carrera"=>$carrera,
                                        "estados"=>$estados,
                                        "especialidad"=>$especialidad,
                                        "trayecto"=>$trayecto]);
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
    public function store(Request $request){
        $proyectos = Proyecto::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $trayecto = Trayecto::all();

        $proyecto = new Proyecto();

        $proyecto->titulo = $request->get('titulo');
        $proyecto->fecha_inicio = $request->get('fecha_inicio');
        $proyecto->fecha_fin = $request->get('fecha_fin');
        $proyecto->id_especialidad = $request->get('especialidad');
        $proyecto->id_linea_investigacion = $request->get('linea_investigacion');
        $proyecto->id_trayecto = $request->get('trayecto');
        //$proyecto->direccion = $request->get('direccion');

        $proyecto->save();

        $documento = new Files();
        mkdir(public_path('upload/'.$proyecto->id), 0777, true);
        $max_size = (int)ini_get('upload_max_filesize') * 15360;
        $documento->documento = 'upload/'.$proyecto->id.'/proyect_'.$proyecto->id.'.pdf';
        $documento->id_proyecto = $proyecto->id;
        $documento->save();

        copy($request->file('file'), public_path('upload/'.$proyecto->id.'/proyect_'.$proyecto->id.'.pdf'));
        return redirect('/proyecto')->with('respuesta', 'creado');


        //
        //OJOOOOOO OJOOOOOO ---> VER VER Editar ::
     //los permisos en linux 775 chmod para que guarde la ruta para que guarde los PDF
    }


}
