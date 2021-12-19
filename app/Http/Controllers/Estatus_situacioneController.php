<?php

namespace App\Http\Controllers;

use App\Models\Estatus_situacione;
use Illuminate\Http\Request;

class Estatus_situacioneController extends Controller
{
    public function index(){

        $estatus_situacion = Estatus_situacione::all();
        return view('estatus_situaciones.index')->with('estatus_situacion',$estatus_situacion);
    }

    public function create(){

        return view('estatus_situaciones.create');
    }

    public function store(Request $request){

        $estatus_situacion = new Estatus_situacione();

        $estatus_situacion->estatus_situacion = $request->get('estatus_situacion');

        $estatus_situacion->save();

        return redirect('/estatus_situaciones')->with('respuesta', 'creado');
    }

    public function show(Estatus_situacione $estatus_situaciones, $id){

        $estatus_situacion = Estatus_situacione::findOrFail($id);
        return view('estatus_situaciones.show', compact(['estatus_situacion', 'id']));
    }

    public function edit($id){

        $estatus_situacion = Estatus_situacione::find($id);
        return view('estatus_situaciones.edit')->with('estatus_situacion',$estatus_situacion);
    }

    public function update(Request $request, $id){

        $estatus_situacion = Estatus_situacione::find($id);

        $estatus_situacion->estatus_situacion = $request->get('estatus_situacion');

        $estatus_situacion->save();

        return redirect('/estatus_situaciones')->with('respuesta','editado');
    }

    public function destroy($id){

        $estatus_situacion = Estatus_situacione::find($id);

        $estatus_situacion->delete();
        return redirect('/estatus_situaciones')->with('respuesta','eliminado');
    }
}
