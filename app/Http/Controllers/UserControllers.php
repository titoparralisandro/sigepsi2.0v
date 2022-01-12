<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $usuarios = User::all();
        return view('usuarios.index',['usuarios'=>$usuarios,'roles'=>$roles]);
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
        $user = new User();

        $user->name     =   $request->get('name');
        $user->email    =   $request->get('email');
        $user->password =   Hash::make($request->get('password'));
        $user->assignRole($request->get('rol'));
        $user->save();

        return redirect('/ListUsers')->with('respuesta', 'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        $user = User::find($request->get('id'));
        $userRole = $user->roles->pluck('name')->all();

        $html="<div class='form-group'>";
        $html.="<label>Nombre de usuario</label>";
        $html.="<input type='text' id='name' name='name' class='form-control' readonly value='".$user->name."'>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Correo de usuario</label>";
        $html.="<input type='email' id='email' name='email' class='form-control' readonly value='".$user->email."'>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Rol de usuario</label>";
        $html.="<input type='text' id='roles' name='roles' class='form-control' readonly value='".$userRole[0]."'>";
        $html.="</div>";
        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->get('id'));
        $roles = Role::all();
        $userRole = $user->roles->pluck('name')->all();

        $html="<div class='form-group'>";
        $html.="<label>Nombre de usuario</label>";
        $html.="<input type='text' id='id' name='id' hidden value='".$user->id."'>";
        $html.="<input type='text' id='name' name='name' class='form-control' required value='".$user->name."'>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Correo de usuario</label>";
        $html.="<input type='email' id='email' name='email' class='form-control' required value='".$user->email."'>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Contraseña</label>";
        $html.="<input type='password' id='password' name='password' class='form-control' required>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Confirmacion de contraseña</label>";
        $html.="<input type='password' id='password_Cnf' name='password_Cnf' class='form-control' required>";
        $html.="</div>";
        $html.="<div class='form-group'>";
        $html.="<label>Rol de usuario</label>";
        $html.="<select class='form-control' name='rol' id='rol' required>";
        $html.="<option value='null'>Seleccione una opcion</option>";
            foreach($roles as $rol){
                if($userRole[0] == $rol->name){
                    $html.="<option value='".$rol->id."' selected>".$rol->name."</option>";
                }else{
                    $html.="<option value='".$rol->id."'>".$rol->name."</option>";
                }
            }
        $html.="</select>";
        $html.="</div>";
        return $html;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->get('password') == $request->get('password_Cnf')){
            $user = User::find($request->get('id'));
            $user->name     =   $request->get('name');
            $user->email    =   $request->get('email');
            $user->password =   Hash::make($request->get('password'));
            $user->roles()->sync([$request->get('rol')]);
            //$user->assignRole($request->get('rol'));
            $user->save();
            return response()->json(['error' => false]);
        }else{
            return response()->json(['error' => true,'message' => 'Contraseñas no coinciden']);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
