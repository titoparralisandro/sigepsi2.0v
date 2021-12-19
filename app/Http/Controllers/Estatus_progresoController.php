<?php

namespace App\Http\Controllers;

use App\Models\Estatus_progreso;
use Illuminate\Http\Request;

class Estatus_progresoController extends Controller
{
    public function index(){

        $estatus_progreso = Estatus_progreso::all();
        return view('estatus_progresos.index')->with('estatus_progreso',$estatus_progreso);
    }

    public function create(){

        return view('estatus_progresos.create');
    }

    public function store(Request $request){

        $estatus_progreso = new Estatus_progreso();

        $estatus_progreso->estatus_progreso = $request->get('estatus_progreso');

        $estatus_progreso->save();

        return redirect('/estatus_progresos')->with('respuesta', 'creado');
    }

    public function show(Estatus_progreso $estatus_progresos, $id){

        $estatus_progreso = Estatus_progreso::findOrFail($id);
        return view('estatus_progresos.show', compact(['estatus_progreso', 'id']));
    }

    public function edit($id){

        $estatus_progreso = Estatus_progreso::find($id);
        return view('estatus_progresos.edit')->with('estatus_progreso',$estatus_progreso);
    }

    public function update(Request $request, $id){

        $estatus_progreso = Estatus_progreso::find($id);

        $estatus_progreso->estatus_progreso = $request->get('estatus_progreso');

        $estatus_progreso->save();

        return redirect('/estatus_progresos')->with('respuesta','editado');
    }

    public function destroy($id){

        $estatus_progreso = Estatus_progreso::find($id);

        $estatus_progreso->delete();
        return redirect('/estatus_progresos')->with('respuesta','eliminado');
    }
}
