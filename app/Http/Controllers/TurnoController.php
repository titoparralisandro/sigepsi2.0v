<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index(){

        $turno = Turno::all();
        return view('turno.index')->with('turno',$turno);
    }

    public function create(){

        return view('turno.create');
    }

    public function store(Request $request){

        $turno = new Turno();

        $turno->turno = $request->get('turno');
        $turno->estatus= $request->get('estatus');

        $turno->save();

        return redirect('/turno')->with('respuesta', 'creado');
    }

    public function show(Turno $turnos, $id){

        $turno = Turno::findOrFail($id);
        return view('turno.show', compact(['turno', 'id']));
    }

    public function edit($id){

        $turno = Turno::find($id);
        return view('turno.edit')->with('turno',$turno);
    }

    public function update(Request $request, $id){

        $turno = Turno::find($id);

        $turno->turno = $request->get('turno');
        $turno->estatus= $request->get('estatus');

        $turno->save();

        return redirect('/turno')->with('respuesta','editado');
    }

    public function destroy($id){

        $turno = Turno::find($id);

        $turno->delete();
        return redirect('/turno')->with('respuesta','eliminado');
    }
}
