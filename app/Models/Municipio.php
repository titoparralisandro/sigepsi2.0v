<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['municipio','id_estado'];

    public function estados(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function parroquias(){
        return $this->hasMany(Parroquia::class, 'id_municipio');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }
}
