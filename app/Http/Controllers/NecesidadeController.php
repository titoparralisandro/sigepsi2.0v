<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidade;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

use App\Models\User;

class NecesidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $estados = Estado::all();
        return view('comunidades.index',[ "estados"=>$estados]);
    }

    public function create(){
        return view('comunidades.create');
    }

    public function store(Request $request){

        // $comunidad = new Comunidade();

        // $comunidad->rif = $request->get('rif');

        // $comunidad->save();

        // return redirect('/comunidades')->with('respuesta', 'creado');

    }

    public function edit(Request $request){

    }

    public function show($id){

    }

}
