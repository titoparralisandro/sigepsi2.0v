<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    // estatus proyecto forenkey
    public function estatus_proyectos(){
        return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    }

    // // especialidad forenkey
     public function especialidad(){
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
     }

    // // linea_investigacion forenkey
     public function linea_investigacion(){
         return $this->belongsTo(Lineas_investigacione::class, 'id_linea_investigacion');
     }

    // // trayecto forenkey
     public function trayecto(){
        return $this->belongsTo(Trayecto::class, 'id_trayecto');
     }

    // // comunidad forenkey
     public function comunidad(){
         return $this->belongsTo(Comunidade::class, 'id_comunidad');
     }

    // // estado forenkey
    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    // // municipio forenkey
    public function municipio(){
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
    // // parroquia forenkey
    public function parroquia(){
        return $this->belongsTo(Parroquia::class, 'id_parroquia');
    }

    // documentos forenkey
    public function file(){
        return $this->hasMany(File::class, 'id');
    }
}
