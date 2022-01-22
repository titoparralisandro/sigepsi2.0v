<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Necesidade;
use App\Models\Comunidade;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use JeroenNoten\LaravelAdminLte\Components\Form\Select;

class NecesidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $estados = Estado::all();
        return view('necesidad.index',["estados"=>$estados]);
    }

    public function create(){
        return view('comunidades.create');
    }

    public function municipios(Request $request){
        if(isset($request->texto)){
            $municipios = Municipio::whereid_estado($request->texto)->get();
            return response()->json(['lista' => $municipios,'success' => true]);
        }else { return response()->json(['success' => false]); }
    }

    public function parroquias(Request $request){
        if(isset($request->texto)){
            $parroquias = Parroquia::whereid_municipio($request->texto)->get();
            return response()->json(['lista' => $parroquias,'success' => true]);
        }else { return response()->json(['success' => false]);  }
    }

    public function store(Request $request){

        $user = auth()->user()->id;

        $id = DB::table('comunidades')
        ->select('id')
        ->where('id_user','=',$user)
        ->get();
        
        // $comunidad = DB::table('comunidades')
        //     ->join('users', 'comunidades.id_user', '=', 'user.id')
        //     ->where('id_user','=',$user)
        //     ->select('comunidades.id')
        //     ->get();
        // $comunidad = Comunidade::join('users', 'user.id', '=', 'comunidades.id_user')
        //     ->where('id_user','=',$usuario)
        //     ->select('comunidades.id')
        //     ->get();
        //     // ->join('user', 'user.id', '=', 'comunidades.id_user')
        //     ->where('id_user','=',$user)
        //     ->get();
        // $comunidad = Comunidade::join('comunidades', 'comunidades.id_user', '=', $user)
        //     ->select('comunidades.id')
        //     ->get();
            // $comunidad = User::rightJoin('comunidades', 'comunidades.id_user', '=', $user)
            // ->select('comunidades.id')
            // ->get();

        $necesidad = new Necesidade();
        $necesidad->id_comunidad = $id;
        $necesidad->necesidad = $request->get('necesidad');
        $necesidad->id_estatus_necesidad = 1;
        $necesidad->id_estado = $request->get('id_estado');
        $necesidad->id_municipio = $request->get('id_municipio');
        $necesidad->id_parroquia = $request->get('id_parroquia');
        $necesidad->direccion = $request->get('direccion');

        $necesidad->save();

        return redirect('/necesidad')->with('respuesta', 'creado');

    }

    public function edit(Request $request){

    }

    public function show($id){

    }

}
