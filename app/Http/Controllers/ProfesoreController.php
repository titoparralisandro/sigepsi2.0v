<?php

namespace App\Http\Controllers;

use App\Models\Profesore;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Carrera;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfesoreController extends Controller
{
    public function index(){

        $asesor = Profesore::all();
        return view('asesor.index')->with('asesor',$asesor);
    }

    public function create(){

        $carrera = Carrera::all();
        return view('asesor.create', compact('carrera'));

    }

    public function store(Request $request){

        // Registro de usuario de profesor oculto
        $user = new User();
        $user->name = $request->get('primer_nombre').' '.$request->get('primer_apellido');
        $user->email = $request->get('email');
        $contraseña = 'admin123';
        $user->password = Hash::make($contraseña);
        $user->assignRole("Asesor");

        $user->save();

        $asesor = new Profesore();

        $asesor->id_user = $user->id;
        $asesor->primer_nombre = $request->get('primer_nombre');
        $asesor->segundo_nombre = $request->get('segundo_nombre');
        $asesor->primer_apellido = $request->get('primer_apellido');
        $asesor->segundo_apellido = $request->get('segundo_apellido');
        $asesor->telefono = $request->get('telefono');
        $asesor->email = $request->get('email');
        $asesor->cedula = $request->get('cedula');
        $asesor->id_carrera = $request->get('id_carrera');

        $asesor->save();

        $departamento = DB::table('carreras')
            ->select('carreras.carrera')
            ->where([['carreras.id', '=', $asesor->id_carrera]])
            ->join('profesores', 'profesores.id_carrera', '=', 'carreras.id')
            ->pluck('carreras.carrera')
            ->first();

        $details = [
            "title"=>"Registro de Profesor (a)",
            "body"=>"Se he registrado un nuevo docente del departamento de $departamento en el sistema: $user->name",
            "informacion" =>"Usuario: $user->email"." | Contraseña: $contraseña "
        ];
        Mail::to($request->email, "Admin")->send(new TestMail($details));
        
        return redirect('/asesor')->with('respuesta', 'creado');
    }

    public function show(Profesore $asesores, $id){

        $asesor = Profesore::findOrFail($id);
        return view('asesor.show', compact(['asesor', 'id']));
    }

    public function edit($id){

        $profesor = Profesore::find($id);
        $carrera = Carrera::all();
        return view('asesor.edit', compact( 'carrera' ))->with('profesor',$profesor);
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
        $profesor->id_carrera = $request->get('id_carrera');

        $profesor->save();
        
        $asesor = User::find($profesor->id_user);
        $asesor->name = $request->get('primer_nombre').' '.$request->get('primer_apellido');
        $asesor->email = $request->get('email');
        $contraseña = 'admin123';
        $asesor->password = Hash::make($contraseña);

        $asesor->save();


        $departamento = DB::table('carreras')
            ->select('carreras.carrera')
            ->where([['carreras.id', '=', $profesor->id_carrera]])
            ->join('profesores', 'profesores.id_carrera', '=', 'carreras.id')
            ->pluck('carreras.carrera')
            ->first();

        $details = [
            "title"=>"Actualización de Profesor (a)",
            "body"=>"Se ha actualizado sus datos de docente del departamento de $departamento en el sistema: $asesor->name",
            "informacion" => "Usuario: $asesor->email"." | Contraseña: $contraseña "
        ];

        Mail::to($request->email, "Admin")->send(new TestMail($details));

        return redirect('/asesor')->with('respuesta','editado');
    }
}
