<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    use HasFactory;

    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

}
