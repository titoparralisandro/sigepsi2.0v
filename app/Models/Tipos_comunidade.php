<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_comunidade extends Model
{
    use HasFactory;

    public function comunidades(){
        return $this->hasMany(Comunidade::class, 'id');
    }
}
