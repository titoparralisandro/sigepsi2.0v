<?php

namespace App\Http\Controllers;

use App\Models\Tipos_asesoria;
use Illuminate\Http\Request;

class Tipos_asesoriaController extends Controller
{
    public function index(){

        $tipo_asesoria = Tipos_asesoria::all();
        return view('tipos_asesoria.index')->with('tipo_asesoria',$tipo_asesoria);
    }

    public function create(){

        return view('tipos_asesoria.create');
    }

    public function store(Request $request){

        $tipo_asesoria = new Tipos_asesoria();

        $tipo_asesoria->tipo_asesoria = $request->get('tipo_asesoria');

        $tipo_asesoria->save();

        return redirect('/tipos_asesoria')->with('respuesta', 'creado');
    }

    public function show(Tipos_asesoria $tipo_asesorias, $id){

        $tipo_asesoria = Tipos_asesoria::findOrFail($id);
        return view('tipos_asesoria.show', compact(['tipo_asesoria', 'id']));
    }

    public function edit($id){

        $tipo_asesoria = Tipos_asesoria::find($id);
        return view('tipos_asesoria.edit')->with('tipo_asesoria',$tipo_asesoria);
    }

    public function update(Request $request, $id){

        $tipo_asesoria = Tipos_asesoria::find($id);

        $tipo_asesoria->tipo_asesoria = $request->get('tipo_asesoria');

        $tipo_asesoria->save();

        return redirect('/tipos_asesoria')->with('respuesta','editado');
    }

    public function destroy($id){

        $tipo_asesoria = Tipos_asesoria::find($id);

        $tipo_asesoria->delete();
        return redirect('/tipos_asesoria')->with('respuesta','eliminado');
    }
}
