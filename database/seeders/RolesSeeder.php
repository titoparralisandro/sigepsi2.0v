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
        Role::create(array( 'id' => 1, 'name' => 'Administrador', 'guard_name' => 'web'));
        Role::create(array( 'id' => 2, 'name' => 'Director', 'guard_name' => 'web'));
        /* División de Investigación, Extensión, Postgrado y Producción */
        Role::create(array( 'id' => 3, 'name' => 'DIEPP', 'guard_name' => 'web'));
        Role::create(array( 'id' => 4, 'name' => 'Coordinador', 'guard_name' => 'web'));
        /* Comite son quienes estudian las problematicas y registran las situaciones en el banco de situaciones */
        Role::create(array( 'id' => 5, 'name' => 'Comite', 'guard_name' => 'web'));
        Role::create(array( 'id' => 6, 'name' => 'Asesor', 'guard_name' => 'web'));
        Role::create(array( 'id' => 7, 'name' => 'Estudiante', 'guard_name' => 'web'));
        Role::create(array( 'id' => 8, 'name' => 'Comunidad', 'guard_name' => 'web'));
    }
}
