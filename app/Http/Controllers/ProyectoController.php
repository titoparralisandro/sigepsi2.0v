<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Proyecto;
use App\Models\Carrera;
use App\Models\Trayecto;
use App\Models\Especialidade;
use App\Models\Lineas_investigacione;
use App\Models\Estado;
use App\Models\Evaluacione;
use App\Models\Estructuras_evaluacione;
use App\Models\Proyectos_estudiante;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProyectoController extends Controller
{
    public function index(){
        $user = auth()->user();
        $a= $user->roles->pluck('name')->implode(' ');
        $user_id = auth()->id();
        $result = array();
        // return $a;
        switch ($a) {
            case 'Administrador':
                $proyecto= DB::table('proyectos')
                    ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
                    ->join("carreras","carreras.id", "proyectos.id_carrera")
                    ->join("trayectos","trayectos.id","proyectos.id_trayecto")
                    ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
                    ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
                    ->get();
                    return view('proyecto.index',["proyecto"=>$proyecto]);
                break;
            case 'Estudiante':
                $id_persona = DB::table('personas')
                    ->where("id_user", $user_id)->value("id");
                $id_proyectos = DB::table('proyectos_estudiantes')
                    ->select("id_proyecto")
                    ->where("id_estudiante", $id_persona)->get();
                foreach ($id_proyectos as $key => $value) {
                    $proyectos = DB::table('proyectos')
                        ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
                        ->join("carreras","carreras.id", "proyectos.id_carrera")
                        ->join("trayectos","trayectos.id","proyectos.id_trayecto")
                        ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
                        ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
                        ->where("proyectos.id", $id_proyectos[$key]->id_proyecto)
                        ->get();
                    foreach ($proyectos as $key => $value) {
                        $result[] = $value;
                    } 
                }
                return view('proyecto.index',["proyecto"=>$result]);
                break;
            case 'Asesor':
                $id_profesor = DB::table('profesores')
                    ->where("id_user", $user_id)->value("id");
                $id_proyecto_asesores = DB::table('proyecto_asesores')
                    ->select("id_proyecto")
                    ->where("id_asesor", $id_profesor)->get();
                foreach ($id_proyecto_asesores as $key => $value) {
                    $proyectos = DB::table('proyectos')
                        ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
                        ->join("carreras","carreras.id", "proyectos.id_carrera")
                        ->join("trayectos","trayectos.id","proyectos.id_trayecto")
                        ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
                        ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
                        ->where("proyectos.id", $id_proyecto_asesores[$key]->id_proyecto)
                        ->get();
                        foreach ($proyectos as $key => $value) {
                            $result[] = $value;
                        } 
                }
                return view('proyecto.index',["proyecto"=>$result]);
                break;
            case 'Comunidad':
                $id_comunidad = DB::table('comunidades')
                    ->where("id_user", $user_id)->value("id");
                $proyecto= DB::table('proyectos')
                    ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
                    ->join("carreras","carreras.id", "proyectos.id_carrera")
                    ->join("trayectos","trayectos.id","proyectos.id_trayecto")
                    ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
                    ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
                    ->where("proyectos.id_comunidad", $id_comunidad)
                    ->get();
                    return view('proyecto.index',["proyecto"=>$proyecto]);
                break;
            default:
            case 'Coordinador':
                $carrera = DB::table('coordinadors')
                    ->select('coordinadors.id_carrera')
                    ->where("id_user", $user_id)->value("id");
                $proyecto= DB::table('proyectos')
                    ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
                    ->join("carreras","carreras.id", "proyectos.id_carrera")
                    ->join("trayectos","trayectos.id","proyectos.id_trayecto")
                    ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
                    ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
                    ->where("proyectos.id_carrera", $carrera)
                    ->get();
                    return view('proyecto.index',["proyecto"=>$proyecto]);
            break;
        }

    }
    public function pdf_carta_compromiso($id){


        // return view('proyecto.carta_compromiso');
        return 'proyecto.carta_compromiso';
    }
    // public function pdf_carta_culminacion(){

    //     return view('proyecto.index');
    // }
    // public function pdf_certificado(){

    //     return view('proyecto.index');
    // }
    public function create(Request $request){
        $especialidad = Especialidade::all();
        $lineas_investigacion = Lineas_investigacione::all();
        $carrera = Carrera::all();
        $trayecto = Trayecto::all();
        $estados = Estado::all();
        return view('proyecto.create',["lineas_investigacion"=>$lineas_investigacion,
                                        "carrera"=>$carrera,
                                        "estados"=>$estados,
                                        "especialidad"=>$especialidad,
                                        "trayecto"=>$trayecto]);
    }
    public function evaluar($id)
    {
        $proyecto= DB::table('proyectos')
        ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
        ->join("carreras","proyectos.id_carrera","carreras.id")
        ->join("trayectos","proyectos.id_trayecto","trayectos.id")
        ->select("proyectos.*","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","trayectos.descripcion")
        ->where("proyectos.id","=",$id)
        ->get();
        return view('proyecto.evaluar',['data'=>$proyecto[0]]);
    }

    public function SaveEvaluar(Request $request)
    {

        $progresos=0;
        $progresosT=0;
        $ArrayProgre = explode(",",$request->get("progresos"));
        $ArrayItem = array();
        $ArrayItemV = array();
        $i=0;
        foreach ($ArrayProgre as $value) {
            $key = explode("_",$value);
            if(count($key)>1){
                $ArrayItem[$i]=$key[1];
            }else{
                $ArrayItemV[$i]=$value;
                $progresos+=$value;
            }
            $i++;
        }
        $progresosT=round($progresos/count($ArrayItemV),0,PHP_ROUND_HALF_UP);
        $validarEvaluaciones = Evaluacione::where('id_proyecto','=',$request->get("proyecto"))->count();
        if($validarEvaluaciones>0){
            $evaluaciones = Evaluacione::where('id_proyecto',"=", $request->get("proyecto"))->first();
            $evaluaciones->progreso =$progresosT;
            $evaluaciones->save();
            $data =json_decode($request->get("items"));
            foreach ($data as $key => $value) {
                $dataDetalle =json_decode($value,true);
                $estru_eval = Estructuras_evaluacione::where('id_evaluacion',"=", $evaluaciones->id)->get();
                foreach ($estru_eval as $value) {
                    if($dataDetalle["value"] == "Pendiente"){
                        $value->id_estatus_progreso = 1;
                    }else{
                        $value->id_estatus_progreso = 2;
                    }
                    $value->save();
                }
            }
        }else{
            $evaluaciones = new Evaluacione();
            $evaluaciones->id_proyecto = $request->get("proyecto");
            $evaluaciones->progreso =$progresosT;
            $evaluaciones->save();

            $data =json_decode($request->get("items"));
            foreach ($data as $key => $value) {
                $dataDetalle =json_decode($value,true);
                $estru_eval = new Estructuras_evaluacione();
                $estru_eval->id_evaluacion = $evaluaciones->id;
                $estru_eval->id_items_estructura = $dataDetalle["items"];
                $estru_eval->id_estructura = $dataDetalle["estructura"];
                if($dataDetalle["value"] == "Pendiente"){
                        $estru_eval->id_estatus_progreso = 1;
                }else{
                        $estru_eval->id_estatus_progreso = 2;
                }
                $estru_eval->save();
            }
        }

        return response()->json(["exito"=>true]);
    }

    public function getalumnos(Request $request)
    {
        $comunidades = DB::table('personas')
            ->join("trayectos","trayectos.id","personas.trayecto")
            ->whereRaw("cod_carrera = '".$request->get('carrera')."' AND (CAST(cedula AS VARCHAR(10)) LIKE '".$request->get('q')."%' OR nombres LIKE '".$request->get('q')."%' OR apellidos LIKE '".$request->get('q')."%')")
            ->select("personas.id","personas.nombres","personas.apellidos","trayectos.trayecto","personas.cedula")
            ->get();
        $html="";
        foreach ($comunidades as $comunidad) {

            $html .="<tr>";
            $html .="<td>".$comunidad->id."</td>";
            $html .="<td>".$comunidad->cedula."</td>";
            $html .="<td>".$comunidad->nombres." ".$comunidad->apellidos."</td>";
            $html .="<td>".$comunidad->trayecto."</td>";
            $html .="<td><button class='btn btn-success' type='button' onclick=\"selectAlumno(".$comunidad->id.",'".$comunidad->nombres." ".$comunidad->apellidos."','".$comunidad->trayecto."','".$comunidad->cedula."')\">Seleccionar</button></td>";
            $html .="</tr>";
        }
        return $html;
    }

    public function getProdestruc(Request $request)
    {
        $comunidades = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->leftjoin("lineas_investigaciones","estructuras.id_linea_investigacion","lineas_investigaciones.id")
            ->select("productos.producto","productos.id","estructuras.id as estrucId")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."'")
            ->get();
        $nav="<div class='bs-stepper-header' role='tablist'>";
        foreach ($comunidades as $index =>$comunidad) {
            $nav.='<div class="step" data-target="#'.$comunidad->producto.'-part">';
            $nav.='<button type="button" class="step-trigger" role="tab" aria-controls="'.$comunidad->producto.'-part" id="'.$comunidad->producto.'-part-trigger">';
            $nav.='<span class="bs-stepper-circle">'.$comunidad->id.'</span>';
            $nav.='<span class="bs-stepper-label">'.$comunidad->producto.'</span>';
            $nav.='</button>';
            $nav.='</div>';
            if($index != count($comunidades) - 1) {
                $nav.='<div class="line"></div>';
            }
        }
        $nav.="</div>";
        $content="<div class='bs-stepper-content'>";
        foreach ($comunidades as $index =>$producto) {
            $content.='<div id="'.$producto->producto.'-part" class="content" role="tabpanel" aria-labelledby="'.$producto->producto.'-part-trigger">';
            $content.="<div class='form-group p-4'>";
            $content.="<table class='table table-striper'>";
            $content.="<thead class='text-center'>";
            $content.="<tr>";
            $content.="<th width='30%'>Item</th>";
            $content.="<th width='20%'>Peso</th>";
            $content.="<th width='50%'>Estatud</th>";
            $content.="</tr>";
            $content.="</thead>";
            $content.="<tbody id='tableItem' class='text-center'>";
            $item_estructura = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->join("item_estructuras","item_estructuras.id_estructura","estructuras.id")
            ->join("items_estructuras","item_estructuras.id_items","items_estructuras.id")
            ->select("item_estructuras.id","item_estructuras.peso","items_estructuras.item")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."' and estructuras.activa=true and estructuras.id_producto='".$producto->id."'")
            ->get();
            foreach ($item_estructura as $item) {
                $content.="<tr>";
                $content.="<td>".$item->item."</td>";
                $content.="<td>".$item->peso."</td>";
                $content.="<td><select data-id='".$producto->id."' data-peso='".$item->peso."' name='estatud_".$item->id."' id='estatud_".$item->id."' class='form-control'><option value='Pendiente'>Pendiente</option><option value='Culminado'>Culminado</option></select></td>";
                $content.="</tr>";
            }
            $content.="</tbody>";
            $content.="</table>";
            $content.='<div class="progress" style="height:30px">';
            $content.='<div id="bar_'.$producto->id.'" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width:0%;">';
            $content.="<p style='margin-top:15px;font-size:20px'><span id='bar_progress_".$producto->id."'></span>/100</p>";
            $content.="</div>";
            $content.="</div>";
            $content.="</div>";
            if($index != count($comunidades) - 1) {
                if($index>=1){
                    $content.='<a class="btn btn-secondary Prev" id="btnPrev">Anterior</a>';
                }
                $content.='<a class="btn btn-primary next" id="btnNext">Siguiente</a>';
            }else{
                $content.='<a class="btn btn-secondary Prev" id="btnPrev">Anterior</a>';
                $content.='<button type="submit" class="btn btn-success">Registrar</button>';
            }
            $content.="</div>";
        }
        $content.="</div>";
        $html  = '<div class="bs-stepper">';
        $html .= $nav;
        $html .= $content;
        $html .= "</div>";
        return $html;
    }

    public function getProducto(Request $request){
        $comunidades = DB::table('estructuras')
            ->join("productos","estructuras.id_producto","productos.id")
            ->leftjoin("lineas_investigaciones","estructuras.id_linea_investigacion","lineas_investigaciones.id")
            ->select("productos.producto","productos.id")
            ->whereRaw("estructuras.id_linea_investigacion='".$request->get('lineas_investigacion')."' and estructuras.id_carrera='".$request->get('especialidad')."'")
            ->get();
        $nav="<ul class='nav nav-tabs'>";
        foreach ($comunidades as $comunidad) {
            $nav.="<li class='nav-item'><a class='nav-link' data-toggle='tab' href='#".$comunidad->producto.$comunidad->id."'>".$comunidad->producto."</a></li>";
        }
        $nav.="</ul>";
        $content="<div class='tab-content'>";
        foreach ($comunidades as $producto) {
            if($producto->id == 1){
                $content.="<div id='".$producto->producto.$producto->id."' class='tab-pane fade active show'>";
            }else{
                $content.="<div id='".$producto->producto.$producto->id."' class='tab-pane fade'>";
            }
            $content.="<div class='form-group p-4'>";
            $content.="<label class='form-label'>Documento de ".$producto->producto."</label>";
            $content.="<input type='file' class='form-control' name='file_".$producto->producto."' id='file_".$producto->producto."'>";
            $content.="</div>";
            $content.="</div>";
        }
        $content.="</div>";
        $html = $nav;
        $html .= $content;
        return $html;
    }

    public function store(Request $request){
        $proyecto = new Proyecto();

        $proyecto->titulo = $request->get('titulo');
        $proyecto->id_estatus_proyecto = 1;
        $proyecto->sinopsis = $request->get('sinopsis');
        $proyecto->fecha_inicio = $request->get('fecha_inicio');
        $proyecto->fecha_fin = $request->get('fecha_fin');
        $proyecto->id_carrera = $request->get('id_carrera');
        $proyecto->id_especialidad = $request->get('id_especialidad');
        $proyecto->id_linea_investigacion = $request->get('id_lineas_investigacion');
        $proyecto->id_trayecto = $request->get('id_trayecto');

        $proyecto->id_comunidad = $request->get('id_comunidad');
        $proyecto->id_estado = $request->get('id_estadoP');
        $proyecto->id_municipio = $request->get('id_municipioP');
        $proyecto->id_parroquia = $request->get('id_parroquiaP');
        $proyecto->direccion = $request->get('direccion');

        $proyecto->save();

        $evaluaciones = new Evaluacione();
        $evaluaciones->id_proyecto =  $proyecto->id;
        $evaluaciones->progreso =0;
        $evaluaciones->save();


        $AlumnosId = $request->get('AlumnosId');
        foreach ($AlumnosId as $value) {
            $estudiantes_proyecto = new Proyectos_estudiante();
            $estudiantes_proyecto->id_proyecto = $proyecto->id;
            $estudiantes_proyecto->id_estudiante = $value;
            $estudiantes_proyecto->id_estatus_estudiante = 1;
            $estudiantes_proyecto->observacion = '';
            $estudiantes_proyecto->save();
        }

        mkdir(public_path('storage/'.$proyecto->id), 0777, true);
        foreach ($request->files as $key => $value) {
            $nombre_documento = explode("_",$key);
            $documento = new Files();
            $documento->documento = 'proyect_'.$nombre_documento[1].'.pdf';
            $documento->id_proyecto = $proyecto->id;
            $documento->nombre = $nombre_documento[1];
            $documento->save();
            copy($request->file($key), public_path('storage/'.$proyecto->id.'/proyect_'.$nombre_documento[1].'.pdf'));
        }

        return redirect('/proyecto')->with('respuesta', 'creado');

        //OJOOOOOO OJOOOOOO ---> VER VER Editar ::
     //los permisos en linux 775 chmod para que guarde la ruta para que guarde los PDF
    }

    public function show(Proyecto $proyectos, $id){

        $proyecto = Proyecto::findOrFail($id);

        $estados        = DB::table('estados')
        ->select('estado')
        ->where('estados.id_estado', '=',$proyecto->id_estado)
        ->get();
        foreach ($estados as $estadoss) {
            $a="<div class='form-group col-4'>";
            $a.="<label class='form-label'>Estado</label>";
            $a.="<input disabled class='form-control' type='text' value='".$estadoss->estado."'>";
            $a.="</div>";
        }
        $municipios     = DB::table('municipios')
                ->select('municipio')
                ->where('municipios.id_municipio', '=',$proyecto->id_municipio)
                ->get();
                foreach ($municipios as $municipioss) {
                    $a.="<div class='form-group col-4'>";
                    $a.="<label class='form-label'>Municipio</label>";
                    $a.="<input disabled class='form-control' type='text' value='".$municipioss->municipio."'>";
                    $a.="</div>";
                }
        $parroquias     = DB::table('parroquias')
                ->select('parroquia')
                ->where('parroquias.id_parroquia', '=',$proyecto->id_parroquia)
                ->get();
                foreach ($parroquias as $parroquiass) {
                    $a.="<div class='form-group col-4'>";
                    $a.="<label class='form-label'>Parroquia</label>";
                    $a.="<input disabled class='form-control' type='text' value='".$parroquiass->parroquia."'>";
                    $a.="</div>";
                }

        $comunidades = DB::table('comunidades')
            ->join('proyectos', 'proyectos.id_comunidad', '=', 'comunidades.id')
            ->join('tipos_comunidades', 'tipos_comunidades.id', '=', 'comunidades.id_tipo_comunidad')
            ->join('parroquias', 'parroquias.id_parroquia', '=', 'comunidades.id_parroquia')
            ->leftJoin('municipios', 'municipios.id_municipio', '=', 'parroquias.id_municipio')
            ->leftJoin('estados', 'estados.id_estado', '=', 'municipios.id_estado')
            ->select("comunidades.*","parroquias.parroquia","municipios.municipio","estados.estado","tipos_comunidades.tipo_comunidad")
            ->where([ ['comunidades.id', '=', $proyecto->id_comunidad] ])
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
            }
            $estudiantes = DB::table('personas')
                ->select('personas.*' )
                ->join('proyectos_estudiantes', 'proyectos_estudiantes.id_estudiante', '=', 'personas.id')
                ->whereRaw("proyectos_estudiantes.id_proyecto ='".$proyecto->id."' and personas.id=proyectos_estudiantes.id_estudiante")
                ->get();

            $estud="";
            foreach ($estudiantes as $estudiante) {
                $estud.="<div class='form-group col col-6'>";
                $estud.="<label class='form-label'>Estudiante</label>";
                $estud.="<input disabled class='form-control' type='text' value='".$estudiante->nombres . " " . $estudiante->apellidos."'>";
                $estud.="</div>";
                $estud.="<div class='form-group col col-3'>";
                $estud.="<label class='form-label'>Cédula</label>";
                $estud.="<input disabled class='form-control' type='text' value='".$estudiante->cedula."'>";
                $estud.="</div>";
                $estud.="<div class='form-group col col-3'>";
                $estud.="<label class='form-label'>Trayecto</label>";
                $estud.="<input disabled class='form-control' type='text' value='".$estudiante->trayecto."'>";
                $estud.="</div>";
            }

            $file=DB::table('files')
            ->select('files.*' )
            ->whereRaw("files.id_proyecto =".$proyecto->id)
            ->get();

        return view('proyecto.show',["html"=>$html,"file"=>$file, "estud"=>$estud, "a"=>$a, "proyecto"=>$proyecto, "estados"=>$estados, "municipios"=>$municipios , "parroquias"=>$parroquias]);

    }

}
