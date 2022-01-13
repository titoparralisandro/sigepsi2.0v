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
            'email',
            'edo_res',
            'direccion',
            'cod_carrera',
            'trayecto',
            'trimestre',
            'seccion',
            'turno',
            'sexo'
            ];
}
