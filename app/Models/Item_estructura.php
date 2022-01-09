<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_estructura extends Model
{
    use HasFactory;

    // item forenkey
    public function items(){
        return $this->belongsTo(Estructura::class, 'id_item_estructura');
    }

    // estructuras forenkey
    public function estructuras(){
        return $this->belongsTo(Items_estructura::class, 'id_estructura');
    }

}
