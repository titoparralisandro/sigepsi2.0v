<?php

namespace App\Http\Controllers;

use App\Models\Items_estructura;
use Illuminate\Http\Request;

class Items_estructuraController extends Controller
{
    public function index(){

        $item = Items_estructura::all();
        return view('items_estructura.index')->with('item',$item);
    }

    public function create(){

        return view('items_estructura.create');
    }

    public function store(Request $request){

        $item = new Items_estructura();

        $item->item = $request->get('item');

        $item->save();

        return redirect('/items_estructura')->with('respuesta', 'creado');
    }

    public function show(Items_estructura $items, $id){

        $item = Items_estructura::findOrFail($id);
        return view('items_estructura.show', compact(['item', 'id']));
    }

    public function edit($id){

        $item = Items_estructura::find($id);
        return view('items_estructura.edit')->with('item',$item);
    }

    public function update(Request $request, $id){

        $item = Items_estructura::find($id);

        $item->item = $request->get('item');

        $item->save();

        return redirect('/items_estructura')->with('respuesta','editado');
    }

    public function destroy($id){

        $item = Items_estructura::find($id);

        $item->delete();
        return redirect('/items_estructura')->with('respuesta','eliminado');
    }
}
