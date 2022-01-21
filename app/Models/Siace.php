<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Siace extends Model
{
    protected $connection = 'siace';

    protected $table = 'public.estudiantes_iutoms';

    // carrera forenkey
    public function cod_carreras(){
        return $this->belongsTo(Siace::class, 'cod_carrera');
    }

    public static function getStudentByEmail($valor)
    {
        return static::whereCorreo($valor)->first();
    }

    public function getFullnameAttribute()
    {
        return Str::title("{$this->nombres} {$this->apellidos}");
    }

    public function getNameAttribute()
    {
        return Str::title("{$this->nombres}");
    }
}
