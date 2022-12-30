<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto_asesor extends Model
{
    protected $table = "proyecto_asesores";
    use HasFactory;
    
    // // proyectos forenkey
    public function proyectos(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    // // estudiantes forenkey
    public function Profesores(){
        return $this->belongsTo(Profesore::class, 'id_asesor');
    }

    // // parroquia forenkey
    public function Tipos_asesoria(){
        return $this->belongsTo(Tipos_asesoria::class, 'id_tipo_asesoria');
    }
}
