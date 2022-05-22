<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $comunidad= DB::table('comunidades')->count();
        $comunidades= $comunidad - 1;

        $proyecto= DB::table('proyectos')->count();
        $proyectos= $proyecto - 1;

        $persona= DB::table('personas')->count();
        $personas= $persona - 1;

        $linea= DB::table('lineas_investigaciones')->count();
        $lineas= $linea - 1;

        return view('/about',["comunidades"=>$comunidades,
                                "proyectos"=>$proyectos,
                                "personas"=>$personas,
                                "lineas"=>$lineas]);
    }
}
