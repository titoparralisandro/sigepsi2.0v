<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tipos_comunidade;
use App\Models\Comunidade;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ComunidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $comunidad = Comunidade::all();
        $tipo_comunidad = Tipos_comunidade::all();
        $estados = Estado::all();
        return view('comunidades.index',["comunidad"=>$comunidad,"tipo_comunidad"=>$tipo_comunidad,"estados"=>$estados]);
    }

    public function getcomunidad(Request $request)
    {
        $comunidades = DB::table('comunidades')
            ->whereRaw("id_estado = '".$request->get('estado')."' and id_municipio = '".$request->get('municipio')."' and id_parroquia = '".$request->get('parroquia')."'")
            ->get();
        $html="";
        foreach ($comunidades as $comunidad) {
            $html .="<tr>";
            $html .="<td>".$comunidad->id."</td>";
            $html .="<td>".$comunidad->nombre."</td>";
            $html .="<td><button class='btn btn-secondary' type='button' onclick=\"selectComunid(".$comunidad->id.",'".$comunidad->nombre."')\">Seleccionar</button></td>";
            $html .="</tr>";
        }
        return $html;
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

        // Registro de usuario de comunidades oculto

        $user = new User();
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $contraseña = 'admin123';
        // $contraseña = rand(10000000, 99999999);
        $user->password = Hash::make($contraseña);
        $user->assignRole("Comunidad");

        $user->save();

        $comunidad = new Comunidade();

        $comunidad->rif = $request->get('rif');
        $comunidad->id_user = $user->id;
        $comunidad->nombre = $request->get('nombre');
        $comunidad->id_tipo_comunidad = $request->get('id_tipo_comunidad');
        $comunidad->telefono_contacto = $request->get('telefono_contacto');
        $comunidad->persona_contacto = $request->get('persona_contacto');
        $comunidad->email = $request->get('email');
        $comunidad->id_estado = $request->get('id_estado');
        $comunidad->id_municipio = $request->get('id_municipio');
        $comunidad->id_parroquia = $request->get('id_parroquia');
        $comunidad->direccion = $request->get('direccion');

        $comunidad->save();

        return redirect('/comunidades')->with('respuesta', 'creado');

    }

    public function edit(Request $request)
    {
        $comunidades    = DB::table('comunidades')->where("id","=",$request->input("id"))->get();
        $estados        = Estado::all();
        $municipios     = Municipio::all();
        $parroquias     = Parroquia::all();
        $tipo_comunidad = Tipos_comunidade::all();
        foreach ($comunidades as $comunidad) {
            $html = "<div class='row'>";
            $html.="<div class='form-group col-4'>";
            $html.="<label class='form-label'>RIF</label>";
            $html.="<input class='form-control' id='id' name='id' type='text' hidden maxlength='10' value='".$comunidad->id."'>";
            $html.="<input class='form-control' id='rif' name='rif' type='text'maxlength='10' value='".$comunidad->rif."'>";
            $html.="</div>";
            $html.="<div class='form-group col-8'>";
            $html.="<label class='form-label'>Tipo de comunidad</label>";
            $html.="<select name='id_tipo_comunidad' id='id_tipo_comunidad' class='form-control'>";
            foreach ($tipo_comunidad as $tipo_comunid) {
                $html.="<option value='".$tipo_comunid->id."'>".$tipo_comunid->tipo_comunidad."</option>";
            }
            $html.="</select>";
            $html.="</div>";
            $html.="</div>";
            $html.="<div class='form-group'>";
            $html.="<label class='form-label'>Comunidad</label>";
            $html.="<input class='form-control' id='nombre' name='nombre' type='text' value='".$comunidad->nombre."'>";
            $html.="</div>";
            $html.="<div class='row'>";
            $html.="<div class='form-group col-3'>";
            $html.="<label class='form'>Teléfono de contacto</label>";
            $html.="<input class='form-control' id='telefono_contacto' name='telefono_contacto' type='tel' maxlength='11' value='".$comunidad->telefono_contacto."'>";
            $html.="</div>";
            $html.="<div class='form-group col-4'>";
            $html.="<label class='form'>Persona de contacto</label>";
            $html.="<input class='form-control' id='persona_contacto' name='persona_contacto' type='text' maxlength='50' value='".$comunidad->persona_contacto."'>";
            $html.="</div>";
            $html.="<div class='form-group col-5'>";
            $html.="<label class='form'>Correo</label>";
            $html.="<input class='form-control' id='email' name='email' type='email' value='".$comunidad->email."'>";
            $html.="</div>";
            $html.="</div>";
            $html.="<div class='row'>";
            $html.="<div class='form-group col'>";
            $html.="<label class='form-label'>Estado</label>";
            $html.="<select name='id_estado' id='id_estado' class='form-control' onchange='getMunicipio(event)'>";
            foreach ($estados as $estado) {
                if($estado->id_estado == $comunidad->id_estado){
                    $html.="<option value='".$estado->id_estado."' selected>".$estado->estado."</option>";
                }else{
                    $html.="<option value='".$estado->id_estado."'>".$estado->estado."</option>";
                }
            }
            $html.="</select>";
            $html.="</div>";
            $html.="<div class='form-group col'>";
            $html.="<label class='form-label'>Municipio</label>";
            $html.="<select name='id_municipio' id='id_municipio' class='form-control' onchange='getParroquia(event)'>";
            foreach ($municipios as $municipio) {
                if($municipio->id_municipio == $comunidad->id_municipio){
                    $html.="<option value='".$municipio->id_municipio."' selected>".$municipio->municipio."</option>";
                }else{
                    $html.="<option value='".$municipio->id_municipio."'>".$municipio->municipio."</option>";
                }
            }
            $html.="</select>";
            $html.="</div>";
            $html.="<div class='form-group col'>";
            $html.="<label class='form-label'>Parroquia</label>";
            $html.="<select name='id_parroquia' id='id_parroquia' class='form-control'>";
            foreach ($parroquias as $parroquia) {
                if($parroquia->id_parroquia == $comunidad->id_parroquia){
                    $html.="<option value='".$parroquia->id_parroquia."' selected>".$parroquia->parroquia."</option>";
                }else{
                    $html.="<option value='".$parroquia->id_parroquia."'>".$parroquia->parroquia."</option>";
                }
            }
            $html.="</select>";
            $html.="</div>";
            $html.="</div>";
            $html.="<div class='form-group'>";
            $html.="<label class='form-label'>Dirección</label>";
            $html.="<textarea class='form-control' id='direccion' name='direccion' cols='25' rows='4' >".$comunidad->direccion."</textarea>";
            $html.="</div>";
            $html .= "</div>";
        }
        return $html;
    }

    public function show($id){
        $comunidades = DB::table('comunidades')
            ->join('tipos_comunidades', 'tipos_comunidades.id', '=', 'comunidades.id_tipo_comunidad')
            ->join('parroquias', 'parroquias.id_parroquia', '=', 'comunidades.id_parroquia')
            ->leftJoin('municipios', 'municipios.id_municipio', '=', 'parroquias.id_municipio')
            ->leftJoin('estados', 'estados.id_estado', '=', 'municipios.id_estado')
            ->select("comunidades.*","parroquias.parroquia","municipios.municipio","estados.estado","tipos_comunidades.tipo_comunidad")
            ->where("comunidades.id","=",$id)
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
        return $html;
    }

    public function Savedit(Request $request)
    {
        $array = array();
        foreach ($request->request as $key => $value) {
           if($key != "_token" && $key != "id"){
                $array[$key] =$value;
           }
        }
        $response = DB::table('comunidades')
              ->where('id', $request->input("id"))
              ->update($array);
        return response()->json($response);
    }
}

