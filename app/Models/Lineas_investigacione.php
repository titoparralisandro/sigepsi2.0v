<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas_investigacione extends Model
{
    use HasFactory;

    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }
}
