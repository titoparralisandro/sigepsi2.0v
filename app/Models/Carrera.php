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

    public function estructuras(){
        return $this->hasMany(Estructura::class, 'id');
    }
    public function siace(){
        return $this->hasMany(Siace::class, 'id');
    }
    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }
    public function bancos(){
        return $this->hasMany(Banca_situaciones::class, 'id');
    }
    public function asesores(){
        return $this->hasMany(Profesore::class, 'id');
    }

    public function coordinadors(){
        return $this->hasMany(Coordinador::class, 'id');
    }
}
