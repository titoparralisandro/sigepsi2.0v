<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banca_situaciones extends Model
{
    use HasFactory;

    protected $hidden = ['id'];
    
    public function especialidades(){
        return $this->belongsTo(Especialidade::class, 'id_especialidad');
    }
    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
    public function lineas_investigaciones(){
        return $this->belongsTo(Lineas_investigacione::class, 'id_linea_investigacion');
    }
    public function necesidades(){
        return $this->belongsTo(Necesidade::class, 'id_necesidad');
    }
}
