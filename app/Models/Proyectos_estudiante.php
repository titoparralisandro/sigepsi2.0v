<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos_estudiante extends Model
{
    use HasFactory;

        // // proyectos forenkey
        public function proyectos(){
            return $this->belongsTo(Proyecto::class, 'id_proyecto');
        }

        // // estudiantes forenkey
        public function estudiantes(){
            return $this->belongsTo(Persona::class, 'id_estudiante');
        }

        // // parroquia forenkey
        public function estatus_proyectos_estudiantes(){
            return $this->belongsTo(Estatus_proyectos_estudiante::class, 'id_estatus_estudiante');
        }
}
