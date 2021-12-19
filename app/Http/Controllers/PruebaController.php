<?php

namespace App\Http\Controllers;

use App\Models\Pruebas;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prueba = Pruebas::all();
        //$prueba = Pruebas::find(1);
        //$prueba = Pruebas::where('id', 2)->get();
        return view('prueba.index')->with('prueba',$prueba);
        //return $prueba;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('prueba.create');
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
        $campos = [
            'name' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'cedula' => 'required|string|min:8|max:10',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'cedula.required' => 'El cédula es requerida',
            'required' => 'EL :attribute es requerido',
            'cedula.min' => 'La cédula debe tener mínimo 8 dígitos',
            'cedula.max' => 'La cédula debe tener máximo 10 dígitos',
        ];

        $this->validate($request, $campos, $mensaje);

        $prueba = new Pruebas();
        
        $prueba->name = $request->get('name');
        $prueba->apellido = $request->get('apellido');
        $prueba->cedula = $request->get('cedula');

        $prueba->save();

        return redirect('/prueba')->with('respuesta', 'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pruebas $Pruebas
     * @return \Illuminate\Http\Response
     *
     * public function show(Pruebas $Pruebas)
     * public function show($id)
     **/
    public function show(Pruebas $Pruebas, $id)
    {
        $prueba = Pruebas::findOrFail($id);
        //compact('id') = ['id' => $id] 
        //return view('prueba.show',['id' => $id]);
        //return $Pruebas; // nada
        //return $prueba;
        return view('prueba.show', compact(['prueba', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pruebas $Pruebas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $prueba = Pruebas::find($id);
        //return $prueba;
        return view('prueba.edit')->with('prueba',$prueba);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pruebas $Pruebas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'name' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'cedula' => 'required|string|min:8|max:10',
        ];

        $mensaje = [
            'name.required' => 'El nombre es requerido',
            'cedula.required' => 'El cédula es requerida',
            'required' => 'EL :attribute es requerido',
            'cedula.min' => 'La cédula debe tener mínimo 8 dígitos',
            'cedula.max' => 'La cédula debe tener máximo 10 dígitos',
        ];

        $this->validate($request, $campos, $mensaje);
        $prueba = Pruebas::find($id);
        
        $prueba->name = $request->get('name');
        $prueba->apellido = $request->get('apellido');
        $prueba->cedula = $request->get('cedula');

        $prueba->save();

        //return $prueba;
        return redirect('/prueba')->with('respuesta','editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pruebas $Pruebas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prueba = Pruebas::find($id);
        //return $prueba;
        $prueba->delete();
        return redirect('/prueba')->with('respuesta','eliminado');
    }
}
