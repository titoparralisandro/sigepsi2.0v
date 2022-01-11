<?php

namespace App\Http\Controllers;

use App\Models\Profesore;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfesoreController extends Controller
{
    public function index(){

        $asesor = Profesore::all();
        return view('asesor.index')->with('asesor',$asesor);
    }

    public function create(){

        return view('asesor.create');
    }

    public function store(Request $request){
        
        // Registro de usuario de comunidades oculto

        $user = new User();
        $user->name = $request->get('primer_nombre').' '.$request->get('primer_apellido');
        $user->email = $request->get('email');
        $contraseña = rand(10000000, 99999999);
        $user->password = Hash::make($contraseña);
        $user->assignRole("Asesor");
                
        $user->save();

        $asesor = new Profesore();

        $asesor->primer_nombre = $request->get('primer_nombre');
        $asesor->segundo_nombre = $request->get('segundo_nombre');
        $asesor->primer_apellido = $request->get('primer_apellido');
        $asesor->segundo_apellido = $request->get('segundo_apellido');
        $asesor->telefono = $request->get('telefono');
        $asesor->email = $request->get('email');
        $asesor->cedula = $request->get('cedula');
        
        $asesor->save();

        return redirect('/asesor')->with('respuesta', 'creado');
    }

    public function show(Profesore $asesores, $id){

        $asesor = Profesore::findOrFail($id);
        return view('asesor.show', compact(['asesor', 'id']));
    }

    public function edit($id){

        $profesor = Profesore::find($id);
        return view('asesor.edit')->with('profesor',$profesor);
    }

    public function update(Request $request, $id){

        $profesor = Profesore::find($id);

        $profesor->primer_nombre = $request->get('primer_nombre');
        $profesor->segundo_nombre = $request->get('segundo_nombre');
        $profesor->primer_apellido = $request->get('primer_apellido');
        $profesor->segundo_apellido = $request->get('segundo_apellido');
        $profesor->telefono = $request->get('telefono');
        $profesor->email = $request->get('email');
        $profesor->cedula = $request->get('cedula');

        $profesor->save();

        return redirect('/asesor')->with('respuesta','editado');
    }
}
