<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banca_situaciones extends Model
{
    use HasFactory;

    protected $fillable = ['id_necesidad', 'necesidad', 'Carrera', 'id_especialidad', 'id_lineas_investigacion', 'Situacion'];
    protected $hidden = ['id'];

}
