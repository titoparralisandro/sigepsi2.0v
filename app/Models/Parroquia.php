<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    protected $fillable=['parroquia','id_municipio'];

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }

    public function necesidades(){
        return $this->hasMany(Necesidade::class, 'id');
    }
}
