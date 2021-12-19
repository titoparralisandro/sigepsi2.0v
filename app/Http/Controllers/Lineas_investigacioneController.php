<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Lineas_investigacione;
use Illuminate\Http\Request;

class Lineas_investigacioneController extends Controller
{
    public function index(){

        $lineas_investigacion = Lineas_investigacione::all();
        return view('lineas_investigacion.index', compact('lineas_investigacion'));

    }
    public function create(){

        $carrera = Carrera::all();
        return view('lineas_investigacion.create', compact('carrera'));

    }

    public function store(Request $request){

        $linea_investigacion = new Lineas_investigacione();

        $linea_investigacion->linea_investigacion = $request->get('linea_investigacion');
        $linea_investigacion->id_carrera = $request->get('id_carrera');

        $linea_investigacion->save();

        return redirect('/lineas_investigacion')->with('respuesta', 'creado');
    }

    public function show(Lineas_investigacione $linea_investigaciones, $id){

        $linea_investigacion = Lineas_investigacione::findOrFail($id);
        return view('lineas_investigacion.show', compact(['linea_investigacion', 'id']));

    }

    public function edit($id){

        $carrera = Carrera::all();
        $linea_investigacion = Lineas_investigacione::find($id);
        return view('lineas_investigacion.edit', compact( 'carrera' ))->with('linea_investigacion',$linea_investigacion);

    }

    public function update(Request $request, $id){

        $linea_investigacion = Lineas_investigacione::find($id);

        $linea_investigacion->linea_investigacion = $request->get('linea_investigacion');
        $linea_investigacion->id_carrera = $request->get('id_carrera');

        $linea_investigacion->save();

        return redirect('/lineas_investigacion')->with('respuesta','editado');
    }

    public function destroy($id){

        $lineas_investigacion = Lineas_investigacione::find($id);

        $lineas_investigacion->delete();
        return redirect('/lineas_investigacion')->with('respuesta','eliminado');
    }
}
