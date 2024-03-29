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
use Illuminate\Http\File;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyecto= DB::table('proyectos')
            ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
            ->join("carreras","carreras.id", "proyectos.id_carrera")
            ->join("trayectos","trayectos.id","proyectos.id_trayecto")
            ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
            ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
            ->get();
        return view('reporte.index',["proyecto"=>$proyecto]);
    }

    public function banca()
    {
        $proyecto= DB::table('banca_situaciones')
        ->join("lineas_investigaciones","banca_situaciones.id_linea_investigacion","lineas_investigaciones.id")
        ->join("carreras","carreras.id", "banca_situaciones.id_carrera")
        ->join("necesidades","necesidades.id","banca_situaciones.id_necesidad")
        ->join("especialidades","especialidades.id","banca_situaciones.id_especialidad")
        ->join("estatus_situaciones","estatus_situaciones.id","banca_situaciones.id_estatus_situacion")
        ->select("banca_situaciones.id",
                "banca_situaciones.situacion",
                "lineas_investigaciones.linea_investigacion",
                "carreras.carrera",
                "especialidades.especialidad",
                "estatus_situaciones.estatus_situacion")
        ->get();
        return view('reporte.banca',["proyecto"=>$proyecto]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {

        $proyecto= DB::table('proyectos')
            ->join("lineas_investigaciones","proyectos.id_linea_investigacion","lineas_investigaciones.id")
            ->join("carreras","carreras.id", "proyectos.id_carrera")
            ->join("trayectos","trayectos.id","proyectos.id_trayecto")
            ->join("evaluaciones","evaluaciones.id_proyecto","proyectos.id")
            ->select("proyectos.id","proyectos.titulo","lineas_investigaciones.linea_investigacion","carreras.carrera","trayectos.trayecto","evaluaciones.progreso")
            ->get();
        //return view('reporte.index',["proyecto"=>$proyecto]);
        
    
    $pdf = PDF::loadView('reporte.pdf',["proyecto"=>$proyecto])->setPaper('a4', 'landscape');
    return $pdf->stream(); 
    }
    public function bancareporte()
    {

        $proyecto= DB::table('banca_situaciones')
/*
            ->join("lineas_investigaciones","banca_situaciones.id_linea_investigacion","lineas_investigaciones.id")
            ->join("carreras","carreras.id", "banca_situaciones.id_carrera")
            ->join("necesidades","necesidades.id","banca_situaciones.id_trayecto")
            ->join("especialidades","especialidades.id","banca_situaciones.id_trayecto")
            ->join("estatus_situaciones","estatus_situaciones.id","banca_situaciones.id_estatus_situacion")
            ->select("banca_situaciones.id",
                    "banca_situaciones.situacion",
                    "lineas_investigaciones.linea_investigacion",
                    "carreras.carrera",
                    "especialidades.especialidad",
                    "estatus_situaciones.estatus_situacion")
            ->get();
*/
        ->join("lineas_investigaciones","banca_situaciones.id_linea_investigacion","lineas_investigaciones.id")
        ->join("carreras","carreras.id", "banca_situaciones.id_carrera")
        ->join("necesidades","necesidades.id","banca_situaciones.id_necesidad")
        ->join("especialidades","especialidades.id","banca_situaciones.id_especialidad")
        ->join("estatus_situaciones","estatus_situaciones.id","banca_situaciones.id_estatus_situacion")
        ->select("banca_situaciones.id",
                "banca_situaciones.situacion",
                "lineas_investigaciones.linea_investigacion",
                "carreras.carrera",
                "especialidades.especialidad",
                "estatus_situaciones.estatus_situacion")
        ->get();
        //return view('reporte.index',["proyecto"=>$proyecto]);
        
    
    $pdf = PDF::loadView('reporte.bancareporte',["proyecto"=>$proyecto])->setPaper('a4', 'landscape');
    return $pdf->stream(); 
    }


}
