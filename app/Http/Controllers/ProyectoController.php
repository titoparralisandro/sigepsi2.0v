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
use Illuminate\Http\Request;

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

    public function create(){
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

    public function store(Request $request){

        // $comunidad = new Comunidade();

        // $comunidad->rif = $request->get('rif');
        // if($comunidad->id_user == null){
        //     $comunidad->id_user = null;
        // }else{
        //     $comunidad->id_user = $request->get('id_user');
        // }
        // $comunidad->nombre = $request->get('nombre');
        // $comunidad->id_tipo_comunidad = $request->get('id_tipo_comunidad');
        // $comunidad->telefono_contacto = $request->get('telefono_contacto');
        // $comunidad->persona_contacto = $request->get('persona_contacto');
        // $comunidad->email = $request->get('email');
        // $comunidad->id_estado = $request->get('id_estado');
        // $comunidad->id_municipio = $request->get('id_municipio');
        // $comunidad->id_parroquia = $request->get('id_parroquia');
        // $comunidad->direccion = $request->get('direccion');

        // $comunidad->save();

        // return redirect('/proyecto')->with('respuesta', 'creado');

    }
}
