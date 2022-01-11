<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Carrera;
use App\Models\Trayecto;
use App\Models\Especialidade;
use App\Models\Lineas_investigacione;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
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

    public function municipios(Request $request){
        if(isset($request->texto)){
            $municipios = Municipio::whereid_estado($request->texto)->get();
            return response()->json(['lista' => $municipios,'success' => true]);
        }else { return response()->json(['success' => false]); }
    }

    public function parroquias(Request $request){
        if(isset($request->texto)){
            $parroquias = Parroquia::whereid_municipio($request->texto)->get();
            return response()->json(['lista' => $parroquias,'success' => true]);
        }else { return response()->json(['success' => false]);  }
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

        // return redirect('/proyecto')->with('respuesta', 'creado');




    }
}
