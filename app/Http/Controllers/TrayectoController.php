<?php

namespace App\Http\Controllers;

use App\Models\Trayecto;
use Illuminate\Http\Request;

class TrayectoController extends Controller
{

    public function index(){

        $trayecto = Trayecto::all();
        return view('trayecto.index')->with('trayecto',$trayecto);
    }

    public function create(){

        return view('trayecto.create');
    }

    public function store(Request $request){

        $campos = [
            'trayecto' => 'required|string|max:50',
            'descripcion' => 'required|string|max:50',
            'estatus' => 'required|boolean',
        ];

        $mensaje = [
            'trayecto.required' => 'El nombre del trayecto es requerido',
            'descripcion.required' => 'La descripción del trayecto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $trayecto = new Trayecto();

        $trayecto->trayecto = $request->get('trayecto');
        $trayecto->descripcion = $request->get('descripcion');
        $trayecto->estatus= $request->get('estatus');

        $trayecto->save();

        return redirect('/trayecto')->with('respuesta', 'creado');
    }

    public function show(Trayecto $trayectos, $id){

        $trayecto = Trayecto::findOrFail($id);
        return view('trayecto.show', compact(['trayecto', 'id']));
    }

    public function edit($id){

        $trayecto = trayecto::find($id);
        return view('trayecto.edit')->with('trayecto',$trayecto);
    }

    public function update(Request $request, $id){

        $campos = [
            'trayecto' => 'required|string|max:50',
            'descripcion' => 'required|string|max:50',
            'estatus' => 'required|boolean',
        ];

        $mensaje = [
            'trayecto.required' => 'El nombre del trayecto es requerido',
            'descripcion.required' => 'La descripción del trayecto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);
        $trayecto = Trayecto::find($id);

        $trayecto->trayecto = $request->get('trayecto');
        $trayecto->descripcion = $request->get('descripcion');
        $trayecto->estatus= $request->get('estatus');

        $trayecto->save();

        return redirect('/trayecto')->with('respuesta','editado');
    }

    public function destroy($id){

        $trayecto = Trayecto::find($id);

        $trayecto->delete();
        return redirect('/trayecto')->with('respuesta','eliminado');
    }
}
