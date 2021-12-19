<?php

namespace App\Http\Controllers;

use App\Models\Estatus_comunidade;
use Illuminate\Http\Request;

class Estatus_comunidadeController extends Controller
{
    public function index(){

        $estatus_comunidad = Estatus_comunidade::all();
        return view('estatus_comunidades.index')->with('estatus_comunidad',$estatus_comunidad);
    }

    public function create(){

        return view('estatus_comunidades.create');
    }

    public function store(Request $request){

        $estatus_comunidad = new Estatus_comunidade();

        $estatus_comunidad->estatus_comunidad = $request->get('estatus_comunidad');

        $estatus_comunidad->save();

        return redirect('/estatus_comunidades')->with('respuesta', 'creado');
    }

    public function show(Estatus_comunidade $estatus_comunidades, $id){

        $estatus_comunidad = Estatus_comunidade::findOrFail($id);
        return view('estatus_comunidades.show', compact(['estatus_comunidad', 'id']));
    }

    public function edit($id){

        $estatus_comunidad = Estatus_comunidade::find($id);
        return view('estatus_comunidades.edit')->with('estatus_comunidad',$estatus_comunidad);
    }

    public function update(Request $request, $id){

        $estatus_comunidad = Estatus_comunidade::find($id);

        $estatus_comunidad->estatus_comunidad = $request->get('estatus_comunidad');

        $estatus_comunidad->save();

        return redirect('/estatus_comunidades')->with('respuesta','editado');
    }

    public function destroy($id){

        $estatus_comunidad = Estatus_comunidade::find($id);

        $estatus_comunidad->delete();
        return redirect('/estatus_comunidades')->with('respuesta','eliminado');
    }
}
