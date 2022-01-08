<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trayecto extends Model
{
    use HasFactory;

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }

    public function estructuras(){
        return $this->hasMany(Estructura::class, 'id');
    }
}
