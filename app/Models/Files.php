<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    // producto forenkey
    public function proyecto(){
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    protected $fillable = [
        'documento',
        'id_proyecto'
    ];
}
