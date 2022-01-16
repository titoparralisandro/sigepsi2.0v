<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacione extends Model
{
    use HasFactory;

    // item_estructuras forenkey
    public function estructuras_evaluaciones(){
        return $this->hasMany(Estructuras_evaluacione::class, 'id');
    }

    // proyecto forenkey
    public function proyectos(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    // estrcutura forenkey
    public function estructuras(){
        return $this->belongsTo(Estructura::class, 'id_estructura');
    }

}
