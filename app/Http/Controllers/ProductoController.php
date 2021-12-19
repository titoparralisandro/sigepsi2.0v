<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){

        $producto = Producto::all();
        return view('producto.index')->with('producto',$producto);
    }

    public function create(){

        return view('producto.create');
    }

    public function store(Request $request){

        $producto = new Producto();

        $producto->producto = $request->get('producto');
        $producto->descripcion = $request->get('descripcion');
        $producto->estatus= $request->get('estatus');

        $producto->save();

        return redirect('/producto')->with('respuesta', 'creado');
    }

    public function show(Producto $productos, $id){

        $producto = Producto::findOrFail($id);
        return view('producto.show', compact(['producto', 'id']));
    }

    public function edit($id){

        $producto = Producto::find($id);
        return view('producto.edit')->with('producto',$producto);
    }

    public function update(Request $request, $id){

        $producto = Producto::find($id);

        $producto->producto = $request->get('producto');
        $producto->descripcion = $request->get('descripcion');
        $producto->estatus= $request->get('estatus');

        $producto->save();

        return redirect('/producto')->with('respuesta','editado');
    }

    public function destroy($id){

        $producto = Producto::find($id);

        $producto->delete();
        return redirect('/producto')->with('respuesta','eliminado');
    }
}
