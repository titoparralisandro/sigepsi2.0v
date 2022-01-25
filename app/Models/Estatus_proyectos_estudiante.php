<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus_proyectos_estudiante extends Model
{
    use HasFactory;

    // proyectos forenkey
    public function proyectos_estudiantes(){
        return $this->hasMany(Proyectos_estudiante::class, 'id');
    }
}
