<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    public function lineas_investigaciones(){
        return $this->hasMany(Lineas_investigacione::class, 'id');
    }

    public function especialidades(){
        return $this->hasMany(Especialidade::class, 'id');
    }
}
