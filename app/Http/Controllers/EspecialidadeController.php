<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index(){

        $especialidad = Especialidade::all();
        return view('especialidad.index')->with('especialidad',$especialidad);
    }

    public function create(){

        return view('especialidad.create');
    }

    public function store(Request $request){

        $especialidad = new Especialidade();

        $especialidad->especialidad = $request->get('especialidad');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->estatus= $request->get('estatus');

        $especialidad->save();

        return redirect('/especialidad')->with('respuesta', 'creado');
    }

    public function show(Especialidade $especialidades, $id){

        $especialidad = Especialidade::findOrFail($id);
        return view('especialidad.show', compact(['especialidad', 'id']));
    }

    public function edit($id){

        $especialidad = Especialidade::find($id);
        return view('especialidad.edit')->with('especialidad',$especialidad);
    }

    public function update(Request $request, $id){

        $especialidad = Especialidade::find($id);

        $especialidad->especialidad = $request->get('especialidad');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->estatus= $request->get('estatus');

        $especialidad->save();

        return redirect('/especialidad')->with('respuesta','editado');
    }

    public function destroy($id){

        $especialidad = Especialidade::find($id);

        $especialidad->delete();
        return redirect('/especialidad')->with('respuesta','eliminado');
    }
}
