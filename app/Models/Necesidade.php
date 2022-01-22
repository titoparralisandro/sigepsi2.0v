<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Necesidade extends Model
{
    use HasFactory;

    public function comunidades(){
        return $this->belongsTo(Comunidade::class, 'id_comunidad');
    }

    public function estatus_necesidades(){
        return $this->belongsTo(Estatus_necesidade::class);
    }

    // estado forenkey
    public function estados(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    // municipio forenkey
    public function municipios(){
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
    // parroquia forenkey
    public function parroquias(){
        return $this->belongsTo(Parroquia::class, 'id_parroquia');
    }
}
