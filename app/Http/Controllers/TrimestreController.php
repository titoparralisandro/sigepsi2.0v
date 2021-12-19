<?php

namespace App\Http\Controllers;

use App\Models\Trimestre;
use Illuminate\Http\Request;

class TrimestreController extends Controller
{
    public function index(){

        $trimestre = Trimestre::all();
        return view('trimestre.index')->with('trimestre',$trimestre);
    }

    public function create(){

        return view('trimestre.create');
    }

    public function store(Request $request){

        $campos = [
            'trimestre' => 'required|string|max:5',
            'descripcion' => 'required|string|max:50',
            'estatus' => 'required|boolean',
        ];

        $mensaje = [
            'trimestre.required' => 'El nombre del trimestre es requerido',
            'descripcion.required' => 'La descripción del trimestre es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $trimestre = new Trimestre();

        $trimestre->trimestre = $request->get('trimestre');
        $trimestre->descripcion = $request->get('descripcion');
        $trimestre->estatus= $request->get('estatus');

        $trimestre->save();

        return redirect('/trimestre')->with('respuesta', 'creado');
    }

    public function show(Trimestre $trimestres, $id){

        $trimestre = Trimestre::findOrFail($id);
        return view('trimestre.show', compact(['trimestre', 'id']));
    }

    public function edit($id){

        $trimestre = trimestre::find($id);
        return view('trimestre.edit')->with('trimestre',$trimestre);
    }

    public function update(Request $request, $id){

        $campos = [
            'trimestre' => 'required|string|max:5',
            'descripcion' => 'required|string|max:50',
            'estatus' => 'required|boolean',
        ];

        $mensaje = [
            'trimestre.required' => 'El nombre del trimestre es requerido',
            'descripcion.required' => 'La descripción del trimestre es requerida',
        ];

        $this->validate($request, $campos, $mensaje);
        $trimestre = Trimestre::find($id);

        $trimestre->trimestre = $request->get('trimestre');
        $trimestre->descripcion = $request->get('descripcion');
        $trimestre->estatus= $request->get('estatus');

        $trimestre->save();

        return redirect('/trimestre')->with('respuesta','editado');
    }

    public function destroy($id){

        $trimestre = Trimestre::find($id);

        $trimestre->delete();
        return redirect('/trimestre')->with('respuesta','eliminado');
    }
}
