<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Estructura;
use App\Models\Lineas_investigacione;
use App\Models\Trayecto;
use App\Models\Producto;
use App\Models\Items_estructura;

class EstructuraController extends Controller
{
    public function index(){
        $estructura = Estructura::all();
        $carrera = Carrera::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $producto = Producto::all();
        return view('estructura.index',["lineas_investigacion"=>$lineas_investigacion,
                                        "carrera"=>$carrera,
                                        "producto"=>$producto, 'estructura' => $estructura]);
    }

    public function create(){
        $carrera = Carrera::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $trayecto = Trayecto::all();
        $producto = Producto::all();
        $item = Items_estructura::all();
        return view('estructura.create',["lineas_investigacion"=>$lineas_investigacion,
                                        "carrera"=>$carrera,
                                        "producto"=>$producto, 
                                        "item"=>$item,
                                        "trayecto"=>$trayecto]);
    }

    public function store(Request $request){
        $carrera = Carrera::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $trayecto = Trayecto::all();
        $producto = Producto::all();
        $item = Items_estructura::all();
        return view('estructura.index',["lineas_investigacion"=>$lineas_investigacion,
                                        "carrera"=>$carrera,
                                        "producto"=>$producto, 
                                        "item"=>$item,
                                        "trayecto"=>$trayecto]);

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
