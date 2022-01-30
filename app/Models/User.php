<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        $foto = 'vendor/adminlte/dist/img/avatar5.png';
        return $foto;//este url nos genera imágenes ramdom
    }

    public function adminlte_desc()
    {
        $user = auth()->user();
        return $user->roles->pluck('name')->implode(' ');
    }

    public function comunidad(){
        return $this->hasMany(Comunidade::class, 'id');
    }

    public function profesor(){
        return $this->hasMany(Profesore::class, 'id');
    }

    public function persona(){
        return $this->hasOne(Persona::class, 'id_user');
    }
}
