<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class ContactController extends Controller
{   
    public function index(){
        return view('/contact');
    }

    public function store(Request $request){

        $campos = [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'asunto' => 'required',
            'comentario' => 'required',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'asunto.required' => 'El asunto es requerido',
            'required' => 'EL :attribute es requerido',
            'comentario' => 'El comentario es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $comentario = new Comment();
        $comentario->name = $request->get('name');
        $comentario->email = $request->get('email');
        $comentario->asunto = $request->get('asunto');
        $comentario->comentario = $request->get('comentario');

        $comentario->save();

        return redirect('/')->with('respuesta', 'creado');
    }
}
