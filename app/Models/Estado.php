<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['estado'];

    public function municipios(){
        return $this->hasMany(Municipio::class, 'id_estado');
    }
    public function proyectos(){
        return $this->hasMany(Proyecto::class, 'id');
    }
    public function necesidades(){
        return $this->hasMany(Necesidade::class, 'id');
    }
    public function comunidades(){
        return $this->hasMany(Comunidade::class, 'id_estado');
    }
}
