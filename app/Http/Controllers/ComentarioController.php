<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{

    public function index(){
    $comentarios = Comment::all();
    return view('comentario.index')->with('comentarios',$comentarios);
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

    public function show($id){
        $comentario = Comment::findOrFail($id);
        $comments = DB::table('comments')
                        ->select('comments.*')
                        ->where('comments.id', '=',$comentario->id)
                        ->get();
        // dd($comments);
        foreach ($comments as $comentarios) {
        $html="    <div class='row'>";
        $html.="    <div class='form-group col col-6'>";
        $html.="      <label class='form-label'>Usuario</label>";
        $html.="      <input disabled class='form-control' type='text' value='$comentarios->name'>";
        $html.="    </div>";
        $html.="    <div class='form-group col col-6'>";
        $html.="      <label class='form-label '>Correo</label>";
        $html.="      <input disabled class='form-control' type='text' value='$comentarios->email'>";
        $html.="    </div>";
        $html.="  </div>";
        $html.="    <div class='form-group'>";
        $html.="      <label class='form-label '>Asunto</label>";
        $html.="      <input disabled class='form-control' type='text' value='$comentarios->asunto'>";
        $html.="    </div>";
        $html.="    <div class='form-group'>";
        $html.="        <label class='form-label'>Comentario</label>";
        $html.="        <textarea disabled class='form-control' cols='25' rows='4'>$comentarios->comentario</textarea>";
        $html .="    </div>";
                        }
        return view('comentario.show', ['html'=>$html, 'id']);
    }

    public function destroy($id)
    {
        $comentario = Comment::find($id);
        $comentario->delete();
        return redirect('/comentario')->with('respuesta','eliminado');
    }
}
