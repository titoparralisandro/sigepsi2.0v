<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Roles */
        Role::create(array( 'name' => 'Administrador', 'guard_name' => 'web'));
        Role::create(array( 'name' => 'Director', 'guard_name' => 'web'));
        /* División de Investigación, Extensión, Postgrado y Producción */
        Role::create(array( 'name' => 'DIEPP', 'guard_name' => 'web'));
        Role::create(array( 'name' => 'Coordinador', 'guard_name' => 'web'));
        /* Comite son quienes estudian las problematicas y registran las situaciones en el banco de situaciones */
        Role::create(array( 'name' => 'Comite', 'guard_name' => 'web'));
        Role::create(array( 'name' => 'Asesor', 'guard_name' => 'web'));
        Role::create(array( 'name' => 'Estudiante', 'guard_name' => 'web'));
        Role::create(array( 'name' => 'Comunidad', 'guard_name' => 'web'));
    }
}
