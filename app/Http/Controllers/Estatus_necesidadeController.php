<?php

namespace App\Http\Controllers;

use App\Models\Estatus_necesidade;
use Illuminate\Http\Request;

class Estatus_necesidadeController extends Controller
{
    public function index(){

        $estatus_necesidad = Estatus_necesidade::all();
        return view('estatus_necesidades.index')->with('estatus_necesidad',$estatus_necesidad);
    }

    public function create(){

        return view('estatus_necesidades.create');
    }

    public function store(Request $request){

        $estatus_necesidad = new Estatus_necesidade();

        $estatus_necesidad->estatus_necesidad = $request->get('estatus_necesidad');

        $estatus_necesidad->save();

        return redirect('/estatus_necesidades')->with('respuesta', 'creado');
    }

    public function show(Estatus_necesidade $estatus_necesidades, $id){

        $estatus_necesidad = Estatus_necesidade::findOrFail($id);
        return view('estatus_necesidades.show', compact(['estatus_necesidad', 'id']));
    }

    public function edit($id){

        $estatus_necesidad = Estatus_necesidade::find($id);
        return view('estatus_necesidades.edit')->with('estatus_necesidad',$estatus_necesidad);
    }

    public function update(Request $request, $id){

        $estatus_necesidad = Estatus_necesidade::find($id);

        $estatus_necesidad->estatus_necesidad = $request->get('estatus_necesidad');

        $estatus_necesidad->save();

        return redirect('/estatus_necesidades')->with('respuesta','editado');
    }

    public function destroy($id){

        $estatus_necesidad = Estatus_necesidade::find($id);

        $estatus_necesidad->delete();
        return redirect('/estatus_necesidades')->with('respuesta','eliminado');
    }
}
