<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus_progreso extends Model
{
    use HasFactory;

    // estructuras evaluaicones forenkey
    public function estructuras_evaluaciones(){
        return $this->hasMany(Estructuras_evaluacione::class, 'id');
    }
}
