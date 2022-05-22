<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class ComentarioController extends Controller
{
    // Solo si se usa una ruta
    //public function __invoke(){
    //view('comment');
    //return 'comentarios';
    //}

    public function index(){
    $comentarios = Comment::all();
    return view('comentario.index')->with('comentarios',$comentarios);
    }

    public function show($id){
    $comentario = Comment::findOrFail($id);
    return view('comentario.show', compact(['comentario', 'id']));
    }

    public function store(Request $request){

        $campos = [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'asunto' => 'required|string|max:50',
            'comentario' => 'required',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'asunto.required' => 'El asunto es requerido',
            'required' => 'EL :attribute es requerido',
            'comentario.required' => 'El comentario es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $comentario = new Comment();
        $comentario->name = $request->get('name');
        $comentario->email = $request->get('email');
        $comentario->asunto = $request->get('asunto');
        $comentario->comentario = $request->get('comentario');

        $comentario->save();

        return redirect('/perfil')->with('respuesta', 'creado');
    }

    public function destroy($id)
    {
        $comentario = Comment::find($id);
        $comentario->delete();
        return redirect('/comentario')->with('respuesta','eliminado');
    }
}
