<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siace extends Model
{
    protected $connection = 'siace';

    protected $table = 'public.estudiantes_iutoms';
}
