<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
    use HasFactory;

    // carrera forenkey
    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    // linea_investigacion forenkey
    public function linea_investigacion(){
        return $this->belongsTo(Lineas_investigacione::class, 'id_linea_investigacion');
    }

    // trayecto forenkey
    public function trayecto(){
        return $this->belongsTo(Trayecto::class, 'id_trayecto');
    }

    // producto forenkey
    public function productos(){
        return $this->belongsTo(Trayecto::class, 'id_producto');
    }    

    // items_estructuras forenkey
    public function items(){
        return $this->belongsTo(Trayecto::class, 'id_items');
    }     

}
