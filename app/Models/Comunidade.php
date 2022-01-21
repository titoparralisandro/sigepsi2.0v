<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tipos_comunidades(){
        return $this->belongsTo(Tipos_comunidade::class, 'id_tipo_comunidad');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }

    public function necesidades(){
        return $this->hasMany(Necesidade::class, 'id');
    }
}
