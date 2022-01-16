<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items_estructura extends Model
{
    use HasFactory;

    public function item_estructura(){
        return $this->hasMany(Item_estructura::class, 'id');
    }
    public function estructuras_evaluaciones(){
        return $this->hasMany(Estructuras_evaluacione::class, 'id');
    }
}
