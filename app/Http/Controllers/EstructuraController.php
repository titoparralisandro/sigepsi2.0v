<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Estructura;
use App\Models\Lineas_investigacione;
use App\Models\Trayecto;
use App\Models\Producto;
use App\Models\Items_estructura;
use App\Models\Item_estructura;
use Illuminate\Support\Facades\DB;

class EstructuraController extends Controller
{
    public function index(){
        $estructura = DB::table('estructuras')
            ->join('carreras', 'carreras.id', '=', 'estructuras.id_carrera')
            ->join('lineas_investigaciones', 'lineas_investigaciones.id', '=', 'estructuras.id_linea_investigacion')
            ->join('productos', 'productos.id', '=', 'estructuras.id_producto')
            ->select("estructuras.id","carreras.carrera","lineas_investigaciones.linea_investigacion","productos.producto")
            ->get();
        return view('estructura.index',['estructura' => $estructura]);
    }
    public function getdataItem()
    {
        $data = DB::table('items_estructuras')
                ->select('id','item as text')
                ->get();
        return response()->json($data);
    }
    public function getdataInvest(Request $request)
    {
        $data = DB::table('lineas_investigaciones')
                ->select('id','linea_investigacion as text')
                ->where('id_carrera','=',$request->get('id'))
                ->get();
        return response()->json($data);
    }
    public function getData($Typedata){
        $data = null;
        switch ($Typedata) {
            case 'carrera':
                $data = DB::table('carreras')
                ->select('id','carrera as text')
                ->get();
                break;
            case 'trayecto':
                $data = DB::table('trayectos')
                ->select('id','descripcion as text')
                ->get();
                break;
            case 'lineas_investigaciones':
                $data = DB::table('lineas_investigaciones')
                ->select('id','linea_investigacion as text')
                ->get();
                break;
            case 'producto':
                $data = DB::table('productos')
                ->select('id','producto as text')
                ->get();
                break;
            case 'Items_estructura':
                $data = Items_estructura::all();
                break;
        }
        return response()->json($data);
    }

    public function create(){
        return view('estructura.create');
    }

    public function store(Request $request){
        $Estruct = new Estructura();
        $Estruct->id_carrera = $request->get('data')['id_carrera'];
        $Estruct->id_linea_investigacion = $request->get('data')['id_lineas_investigacion'];
        $Estruct->id_trayecto = $request->get('data')['id_trayecto'];
        $Estruct->id_producto = $request->get('data')['id_producto'];
        $Estruct->save();
        $items=$request->get('data')['items'];
        for ($i=0; $i < count($items); $i++) {
            $Item_estruc=new Item_estructura();
            $Item_estruc->id_estructura = $Estruct->id;
            $Item_estruc->id_items = $items[$i]['item'];
            $Item_estruc->peso = $items[$i]['point'];
            $Item_estruc->save();
        }
        return response()->json($request->get('data'));
    }

    public function show ($id)
    {
        $estructura = DB::table('estructuras')
            ->join('carreras', 'carreras.id', '=', 'estructuras.id_carrera')
            ->join('lineas_investigaciones', 'lineas_investigaciones.id', '=', 'estructuras.id_linea_investigacion')
            ->join('trayectos', 'trayectos.id', '=', 'estructuras.id_trayecto')
            ->join('productos', 'productos.id', '=', 'estructuras.id_producto')
            ->select("carreras.carrera","lineas_investigaciones.linea_investigacion","productos.producto","trayectos.descripcion as trayecto")
            ->where("estructuras.id","=",$id)
            ->get();
        $items = DB::table('item_estructuras')
            ->join('items_estructuras', 'items_estructuras.id', '=', 'item_estructuras.id_items')
            ->select("items_estructuras.item","item_estructuras.peso")
            ->where("item_estructuras.id_estructura","=",$id)
            ->get();
        return view('estructura.view',['estructura' => $estructura,'items' => $items]);
    }
    public function edit ($id)
    {
        $estructura = DB::table('estructuras')
            ->join('carreras', 'carreras.id', '=', 'estructuras.id_carrera')
            ->join('lineas_investigaciones', 'lineas_investigaciones.id', '=', 'estructuras.id_linea_investigacion')
            ->join('trayectos', 'trayectos.id', '=', 'estructuras.id_trayecto')
            ->join('productos', 'productos.id', '=', 'estructuras.id_producto')
            ->select("estructuras.*","carreras.carrera","lineas_investigaciones.linea_investigacion","productos.producto","trayectos.descripcion as trayecto")
            ->where("estructuras.id","=",$id)
            ->get();
        $items = DB::table('item_estructuras')
            ->join('items_estructuras', 'items_estructuras.id', '=', 'item_estructuras.id_items')
            ->where("item_estructuras.id_estructura","=",$id)
            ->select('item_estructuras.id_items',"items_estructuras.item","item_estructuras.peso")
            ->get();
        $itemsAll = DB::table('items_estructuras')
                ->select('id',"item")
                ->get();
        return view('estructura.edit',['estructura' => $estructura,'items' => $items,'itemsAll'=>$itemsAll]);
    }

    public function saveEdit(Request $request)
    {
        $Estruct = Item_estructura::where('id_estructura', $request->get('data')['id_estructura'])->delete();
        $items=$request->get('data')['items'];
        foreach ($items as $key => $value) {
            if($items[$key]['item'] != "" && $items[$key]['point'] != ""){
                $Item_estruc=new Item_estructura();
                $Item_estruc->id_estructura = $request->get('data')['id_estructura'];
                $Item_estruc->id_items = $items[$key]['item'];
                $Item_estruc->peso = $items[$key]['point'];
                $Item_estruc->save();
            }
        }
        return response()->json($request->get('data'));
    }
}
