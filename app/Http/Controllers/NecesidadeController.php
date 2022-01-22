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
        $necesidad = Necesidade::all();
        return view('necesidad.index',["necesidad"=>$necesidad,"estados"=>$estados]);
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
        ->first();

        $necesidad = new Necesidade();
        
        $necesidad->id_comunidad = $id->id;
        $necesidad->necesidad = $request->get('necesidad');
        $necesidad->id_estatus_necesidad = 1;
        $necesidad->id_estado = $request->get('id_estado');
        $necesidad->id_municipio = $request->get('id_municipio');
        $necesidad->id_parroquia = $request->get('id_parroquia');
        $necesidad->direccion = $request->get('direccion');

        $necesidad->save();

        return redirect('/necesidad')->with('respuesta', 'creado');

    }

    public function show(Necesidade $necesidades, $id){
        $necesidad = Necesidade::findOrFail($id);
        return view('necesidad.show', compact(['necesidad', 'id']));
    }

    public function edit(Request $request){

    }

}
