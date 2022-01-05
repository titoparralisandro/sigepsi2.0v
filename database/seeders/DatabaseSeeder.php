<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstatusSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PruebaSeeder::class);
        
        $user = new User();

        $user->name =  "Administrador";
        $user->email = "admin@sigepsi.com";
        $user->password = Hash::make('admin123');
        $user->assignRole('Administrador');

        $user->save();

        $usuario2 = new User();

        $usuario2->name =  "Samuel Hernandez";
        $usuario2->email = "samuelmoiseshernandezrojas@gmail.com";
        $usuario2->password = Hash::make('123456789');
        $user->assignRole('Estudiante');

        $usuario2->save();

        $usuari = new User();
            $usuari->name =  "Moises Villan";
            $usuari->email = "moisesvillan@hotmail.com";
            $usuari->password = Hash::make('123456789');
            $user->assignRole('Estudiante');
        $usuari->save();

        $usu = new User();
            $usu->name =  "Lisandro Parra";
            $usu->email = "titoparralisandro@gmail.com";
            $usu->password = Hash::make('diosandry23');
            $user->assignRole('Estudiante');
        $usu->save();
    }
}
