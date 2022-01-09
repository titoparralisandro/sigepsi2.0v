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
}
