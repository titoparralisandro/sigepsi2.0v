<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Tipos_comunidade;
use App\Models\Comunidade;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipo_comunidad = Tipos_comunidade::all();
        $estados = Estado::all();
        $user = auth()->user();
        $a= $user->roles->pluck('id')->implode(' ');

        if ($a == 8){
            $id_usuario = auth()->id();
            $comunidad = DB::table('comunidades')
                ->select('comunidades')
                ->where([['comunidades.id_user', '=', $id_usuario]])
                ->first();
            if($comunidad==true){
                return view('home');
            }else{
                return view('comuni.create',["tipo_comunidad"=>$tipo_comunidad,"estados"=>$estados]);
            }
        }else{
            return view('home');
        }

    }

    public function store(Request $request){
        
        // Actualización de usuario de comunidades oculto
        $id_usuario = auth()->id();

        $usuario = User::find($id_usuario);
        $usuario->email = $request->get('email');
        $contraseña = 'admin123';
        $usuario->password = Hash::make($contraseña);

        $usuario->save();

        $comunidad = new Comunidade();
        
        $comunidad->rif = $request->get('rif');
        $comunidad->id_user = $id_usuario;
        $comunidad->nombre = auth()->user()->name;
        $comunidad->id_tipo_comunidad = $request->get('id_tipo_comunidad');
        $comunidad->telefono_contacto = $request->get('telefono_contacto');
        $comunidad->persona_contacto = $request->get('persona_contacto');
        $comunidad->email = $request->get('email');
        $comunidad->id_estado = $request->get('id_estadoP');
        $comunidad->id_municipio = $request->get('id_municipioP');
        $comunidad->id_parroquia = $request->get('id_parroquiaP');
        $comunidad->direccion = $request->get('direccion');
        
        $comunidad->save();
        
        $estado = DB::table('estados')
            ->select('estados.estado')
            ->where([['estados.id_estado', '=', $comunidad->id_estado]])
            ->join('comunidades', 'comunidades.id_estado', '=', 'estados.id_estado')
            ->pluck('estados.estado')
            ->first();
       
        $details = [
            "title"=>"Registro de Institución u Organización: $comunidad->nombre",
            "body"=>"Se ha registrado como nueva comunidad en el sistema, perteneciente al estado: $estado",
            "informacion" =>"Usuario: $comunidad->email"." | Contraseña: $contraseña "
        ];
        Mail::to($request->email, "Admin")->send(new TestMail($details));
        
        return redirect('/perfil')->with('respuesta', 'creado');
    }
}
