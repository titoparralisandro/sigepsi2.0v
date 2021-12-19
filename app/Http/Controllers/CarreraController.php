<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index(){

        $carrera = Carrera::all();
        return view('carrera.index')->with('carrera',$carrera);
    }

    public function create(){

        return view('carrera.create');
    }

    public function store(Request $request){

        $carrera = new Carrera();

        $carrera->carrera = $request->get('carrera');
        $carrera->descripcion = $request->get('descripcion');
        $carrera->estatus= $request->get('estatus');

        $carrera->save();

        return redirect('/carrera')->with('respuesta', 'creado');
    }

    public function show(Carrera $carreras, $id){

        $carrera = Carrera::findOrFail($id);
        return view('carrera.show', compact(['carrera', 'id']));
    }

    public function edit($id){

        $carrera = Carrera::find($id);
        return view('carrera.edit')->with('carrera',$carrera);
    }

    public function update(Request $request, $id){

        $carrera = Carrera::find($id);

        $carrera->carrera = $request->get('carrera');
        $carrera->descripcion = $request->get('descripcion');
        $carrera->estatus= $request->get('estatus');

        $carrera->save();

        return redirect('/carrera')->with('respuesta','editado');
    }

    public function destroy($id){

        $carrera = Carrera::find($id);

        $carrera->delete();
        return redirect('/carrera')->with('respuesta','eliminado');
    }
}
