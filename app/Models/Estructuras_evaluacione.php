<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructuras_evaluacione extends Model
{
    use HasFactory;

    // evaluacion forenkey
    public function evaluaciones(){
        return $this->belongsTo(Evaluacione::class, 'id_evaluacion');
    }

    // items forenkey
    public function items_estruturas(){
        return $this->belongsTo(Items_estructura::class, 'id_items_estructura');
    }

    // estatus progreso forenkey
    public function estatus_pogresos(){
        return $this->belongsTo(Estatus_progreso::class, 'id_estatus_progreso');
    }
}
