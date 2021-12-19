<?php

namespace App\Http\Controllers;

use App\Models\Tipos_comunidade;
use Illuminate\Http\Request;

class Tipos_comunidadeController extends Controller
{
    public function index(){

        $tipos_comunidad = Tipos_comunidade::all();
        return view('tipos_comunidad.index')->with('tipos_comunidad',$tipos_comunidad);
    }

    public function create(){

        return view('tipos_comunidad.create');
    }

    public function store(Request $request){

        $tipo_comunidad = new Tipos_comunidade();

        $tipo_comunidad->tipo_comunidad = $request->get('tipo_comunidad');

        $tipo_comunidad->save();

        return redirect('/tipos_comunidad')->with('respuesta', 'creado');
    }

    public function show(Tipos_comunidade $tipo_comunidades, $id){

        $tipo_comunidad = Tipos_comunidade::findOrFail($id);
        return view('tipos_comunidad.show', compact(['tipo_comunidad', 'id']));
    }

    public function edit($id){

        $tipo_comunidad = Tipos_comunidade::find($id);
        return view('tipos_comunidad.edit')->with('tipo_comunidad',$tipo_comunidad);
    }

    public function update(Request $request, $id){

        $tipo_comunidad = Tipos_comunidade::find($id);

        $tipo_comunidad->tipo_comunidad = $request->get('tipo_comunidad');

        $tipo_comunidad->save();

        return redirect('/tipos_comunidad')->with('respuesta','editado');
    }

    public function destroy($id){

        $tipo_comunidad = Tipos_comunidade::find($id);

        $tipo_comunidad->delete();
        return redirect('/tipos_comunidad')->with('respuesta','eliminado');
    }
}
