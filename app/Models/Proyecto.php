<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    // estatus proyecto forenkey
    public function estatus_proyectos(){
        return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    }

    // // estatus proyecto forenkey
    // public function estatus_proyectos(){
    //     return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    // }

    // // estatus proyecto forenkey
    // public function estatus_proyectos(){
    //     return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    // }

    // // estatus proyecto forenkey
    // public function estatus_proyectos(){
    //     return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    // }

    // // estatus proyecto forenkey
    // public function estatus_proyectos(){
    //     return $this->belongsTo(Estatus_proyecto::class, 'id_estatus_proyecto');
    // }

}
