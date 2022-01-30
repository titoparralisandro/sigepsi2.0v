<?php

namespace App\Http\Controllers;

use App\Models\Testimonio;
use App\Models\Comunidade;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class TestimonioController extends Controller
{
    public function index(){
        $testimonio = Testimonio::all();
        $comunidad = Comunidade::all();
        $proyecto = Proyecto::all();
        return view('testimonio.index', ["testimonio"=>$testimonio,
                                        "comunidad"=>$comunidad,
                                        "proyecto"=>$proyecto]);
    }

    public function create(){
        return view('testimonio.create');
    }

}
