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
<<<<<<< HEAD
        return view('necesidad.show', compact(['necesidad', 'id']));
=======

        $estados        = DB::table('estados')
                        ->select('estado')
                        ->where('estados.id_estado', '=',$necesidad->id_estado)
                        ->get();
                        foreach ($estados as $estadoss) {
                            $a="<div class='form-group col-4'>";
                            $a.="<label class='form-label'>Estado</label>";
                            $a.="<input disabled class='form-control' type='text' value='".$estadoss->estado."'>";
                            $a.="</div>";
                        }
        $municipios     = DB::table('municipios')
                        ->select('municipio')
                        ->where('municipios.id_municipio', '=',$necesidad->id_municipio)
                        ->get();
                        foreach ($municipios as $municipioss) {
                            $a.="<div class='form-group col-4'>";
                            $a.="<label class='form-label'>Municipio</label>";
                            $a.="<input disabled class='form-control' type='text' value='".$municipioss->municipio."'>";
                            $a.="</div>";
                        }
        $parroquias     = DB::table('parroquias')
                        ->select('parroquia')
                        ->where('parroquias.id_parroquia', '=',$necesidad->id_parroquia)
                        ->get();
                        foreach ($parroquias as $parroquiass) {
                            $a.="<div class='form-group col-4'>";
                            $a.="<label class='form-label'>Parroquia</label>";
                            $a.="<input disabled class='form-control' type='text' value='".$parroquiass->parroquia."'>";
                            $a.="</div>";
                        }
        $comunidades = DB::table('comunidades')
            ->join('necesidades', 'necesidades.id_comunidad', '=', 'comunidades.id')
            ->join('tipos_comunidades', 'tipos_comunidades.id', '=', 'comunidades.id_tipo_comunidad')
            ->join('parroquias', 'parroquias.id_parroquia', '=', 'comunidades.id_parroquia')
            ->leftJoin('municipios', 'municipios.id_municipio', '=', 'parroquias.id_municipio')
            ->leftJoin('estados', 'estados.id_estado', '=', 'municipios.id_estado')
            ->select("comunidades.*","parroquias.parroquia","municipios.municipio","estados.estado","tipos_comunidades.tipo_comunidad")
            ->where([ ['necesidades.id_comunidad', '=', $necesidad->id] ])
            ->get(); 
            
            foreach ($comunidades as $comunidad) {
                $html = "<div class='row'>";
                $html.="<div class='form-group col-4'>";
                $html.="<label class='form-label'>RIF</label>";
                $html.="<input disabled class='form-control' type='text'maxlength='10' value='".$comunidad->rif."'>";
                $html.="</div>";
                $html.="<div class='form-group col-8'>";
                $html.="<label class='form-label'>Tipo de comunidad</label>";
                $html.="<input disabled class='form-control' type='text'maxlength='10' value='".$comunidad->tipo_comunidad."'>";
                $html.="</div>";
                $html.="</div>";
                $html.="<div class='form-group'>";
                $html.="<label class='form-label'>Comunidad</label>";
                $html.="<input disabled class='form-control' type='text' value='".$comunidad->nombre."'>";
                $html.="</div>";
                $html.="<div class='row'>";
                $html.="<div class='form-group col-3'>";
                $html.="<label class='form'>Teléfono de contacto</label>";
                $html.="<input disabled class='form-control' type='tel' maxlength='11' value='".$comunidad->telefono_contacto."'>";
                $html.="</div>";
                $html.="<div class='form-group col-4'>";
                $html.="<label class='form'>Persona de contacto</label>";
                $html.="<input disabled class='form-control' type='text' maxlength='50' value='".$comunidad->persona_contacto."'>";
                $html.="</div>";
                $html.="<div class='form-group col-5'>";
                $html.="<label class='form'>Correo</label>";
                $html.="<input class='form-control' disabled type='email' value='".$comunidad->email."'>";
                $html.="</div>";
                $html.="</div>";
                $html.="<div class='row'>";
                $html.="<div class='form-group col'>";
                $html.="<label class='form-label'>Estado</label>";
                $html.="<input class='form-control' type='text' disabled value='".$comunidad->estado."'>";
                $html.="</div>";
                $html.="<div class='form-group col'>";
                $html.="<label class='form-label'>Municipio</label>";
                $html.="<input type='text' id='id_municipio' name='id_municipio' class='form-control' disabled value='".$comunidad->municipio."'>";
                $html.="</div>";
                $html.="<div class='form-group col'>";
                $html.="<label class='form-label'>Parroquia</label>";
                $html.="<input type='text' id='id_parroquia' name='id_parroquia' class='form-control' disabled value='".$comunidad->parroquia."'>";
                $html.="</div>";
                $html.="</div>";
                $html.="<div class='form-group'>";
                $html.="<label class='form-label'>Dirección</label>";
                $html.="<textarea class='form-control' disabled cols='25' rows='4' >".$comunidad->direccion."</textarea>";
                $html.="</div>";
                $html .= "</div>";
            }

        return view('necesidad.show',['html'=>$html, 'a'=>$a, "necesidad"=>$necesidad, "estados"=>$estados, "municipios"=>$municipios , "parroquias"=>$parroquias]);
>>>>>>> 074e84dc8eb7ce2c095c4ac978404f9e28ff23e3
    }

    public function edit(Request $request){

    }

}
