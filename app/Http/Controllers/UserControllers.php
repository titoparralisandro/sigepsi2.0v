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
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return redirect('store')->with('respuesta', 'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        //
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles = Role::all();

        //return $user;
        //$usuarios = User::all();
        //return $roles;
        return view('usuarios.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $campos = [
            'name' => 'required|string|max:50',
            'email' => 'required',
            'role' => 'required',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'required' => 'EL :attribute es requerido',
        ];
        //return $user;
        $this->validate($request, $campos, $mensaje);
        $request->roles = $request->get('role');
        //$roles = $data->pluck('id_role', 'nombre');
        $request->roles = $request->roles + 1;
        //return $request->roles;
        $user->roles()->sync($request->roles);
        return redirect()->route('usuarios.edit', $user->id)->with('respuesta','creado');
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
        return "destroy";
    }
}
