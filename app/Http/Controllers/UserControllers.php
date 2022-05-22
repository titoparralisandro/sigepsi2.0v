<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str; 
// para el uso de helper y ayudar el llenado
use Illuminate\Support\Str;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $roles = Role::all();
        $usuarios = User::all();
        //return  $usuarios->roles()->pluck('name');
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
        $roles = Role::all();
        return view('usuarios.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        //$roles = Role::all();
        //$usuarios = User::all();
        //$user = find($user->id);

        $campos = [
            'name' => 'required|string|max:50',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'password.required' => 'El password es requerido',
            'required' => 'EL :attribute es requerido',
        ];
        //return $user;
        $this->validate($request, $campos, $mensaje);
        //Str::slug($name, '-'),
        //Hash::make($request->get('password'));
        //$user->password = $request->get('password');
        $user->name = $request->get('name');
        $numero_usuarios = count(User::all());
        //return $numero_usuarios;
        //$user->slug = Str::slug($user->name.($numero_usuarios+1), '-');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $request->roles = $request->get('role');
        $user->assignRole($request->roles);
        //return $user->password;
        //return $request->roles;
        $user->save();
        return redirect('usuarios')->with('respuesta', 'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        //
        return view("usuarios.show");
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf(User $user){
        //
        $user = User::all();
        //return $user;
        //->setPaper('A5', 'portrait')
        //->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        //$pdf = App::make('dompdf.wrapper');
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();
$pdf = PDF::loadView('usuarios.pdf',['user'=>$user])->setPaper('a4', 'landscape');
        //return $user;
        return $pdf->stream();    
        //return view('usuarios.pdf', compact('user'));
    }

        public function pdfUsuario(User $user){
        //
        //return $user->id;
        $user = User::find($user->id);
        //return $user;

        $pdf = PDF::loadView('usuarios.pdfusuario',['user'=>$user])->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
        return $pdf->stream();
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
        //return $user;
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
        //$user->slug = Str::slug($user->name.($numero_usuarios+1), '-');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->roles()->sync($request->roles);
        $user->update();
        //return $request;
        return redirect()->route('usuarios.index', $user->id)->with('respuesta','editar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        //
        //return $user;
        $user->delete();
        return redirect('usuarios')->with('respuesta','eliminado');
    }
}
