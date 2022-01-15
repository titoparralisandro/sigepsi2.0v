<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public $fillable = [
            'cedula',
            'nacionalidad',
            'nombres',
            'apellidos',
            'fec_nac',
            'edo_res',
            'direccion',
            'cod_carrera',
            'trayecto',
            'trimestre',
            'seccion',
            'turno'
            ];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
