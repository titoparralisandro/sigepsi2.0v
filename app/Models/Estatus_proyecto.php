<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus_proyecto extends Model
{
    use HasFactory;

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }
}
