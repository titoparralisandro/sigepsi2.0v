<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    use HasFactory;

    public function comunidades(){
        return $this->belongsTo(Comunidade::class, 'id_comunidad');
    }

    public function proyectos(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

}
