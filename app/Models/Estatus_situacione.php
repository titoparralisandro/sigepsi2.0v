<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus_situacione extends Model
{
    use HasFactory;

    public function situaciones(){
        return $this->hasMany(sitauciones::class);
    }
}
