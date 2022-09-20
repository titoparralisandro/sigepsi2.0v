<?php

namespace App\Http\Controllers;

use App\Models\Coordinador;
use App\Models\Carrera;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinador = Coordinador::all();
        $carrera = Carrera::all();
        return view('coordinador.index', ["carrera"=>$carrera,"coordinador"=>$coordinador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Registro de usuario de coordinador oculto

        $user = new User();
            $user->name = $request->get('nombre');
            $user->email = $request->get('email');
            $contraseña = 'admin123';
            $user->password = Hash::make($contraseña);
            $user->assignRole("Coordinador");
                
        $user->save();
        
        $coordinador = new Coordinador();
            $coordinador->id_user = $user->id;
            $coordinador->nombre = $user->name;
            $coordinador->telefono_contacto = $request->get('telefono_contacto');
            $coordinador->email = $user->email;
            $coordinador->id_carrera = $request->get('id_carrera');

        $coordinador->save();
        
        $carrera = DB::table('carreras')
            ->select('carreras.carrera')
            ->where([['carreras.id', '=', $coordinador->id_carrera]])
            ->join('coordinadors', 'coordinadors.id_carrera', '=', 'carreras.id')
            ->pluck('carreras.carrera')
            ->first();

        $details = [
            "title"=>"Registro de nuevo Coordinador: $coordinador->nombre",
            "body"=>"Se ha registrado como nuevo coordinador en el sistema, perteneciente al departamento: $carrera",
            "informacion" =>"Usuario: $coordinador->email"." | Contraseña: $contraseña "
        ];
                
        Mail::to($request->email, "Admin")->send(new TestMail($details));
                
        return redirect('/coordinador')->with('respuesta', 'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinador $coordinadores, $id)
    {
        $coordinador = Coordinador::findOrFail($id);
        return view('coordinador.show', ["coordinador"=>$coordinador]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinador $coordinadores, $id)
    {

        $coordinador = Coordinador::findOrFail($id);
        $carrera = Carrera::all();

        return view('coordinador.edit', ["carrera"=>$carrera,"coordinador"=>$coordinador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coordinador = Coordinador::find($id);
        $user_coordinador= $coordinador->id_user;

        // Registro de usuario de comunidades oculto

        $user = User::find($user_coordinador);
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
                
        $user->save();
        
        $departamento = Coordinador::find($id);
        $departamento->id_user = $user->id;
        $departamento->nombre = $user->name;
        $departamento->telefono_contacto = $request->get('telefono_contacto');
        $departamento->email = $user->email;
        $departamento->id_carrera = $request->get('id_carrera');

        $departamento->save();
        
        $carrera = DB::table('carreras')
            ->select('carreras.carrera')
            ->where([['carreras.id', '=', $coordinador->id_carrera]])
            ->join('coordinadors', 'coordinadors.id_carrera', '=', 'carreras.id')
            ->pluck('carreras.carrera')
            ->first();

        $details = [
            "title"=>"Actualización del usuario de coordinación: $coordinador->nombre",
            "body"=>"Se ha actualizado el usuario en el sistema, perteneciente al departamento: $carrera",
            "informacion" =>"Usuario: $coordinador->email"
        ];
                
        Mail::to($request->email, "Admin")->send(new TestMail($details));
//
        return redirect('/coordinador')->with('respuesta', 'creado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinador $coordinador)
    {
        //
    }
}
