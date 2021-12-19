<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name =  "Administrador";
        $user->email = "admin@sigepsi.com";
        $user->password = "admin123";
        $user->assignRole('Administrator');

        $user->save();

        $usuario2 = new User();

        $usuario2->name =  "Samuel Hernandez";
        $usuario2->email = "sami@gmail.com";
        $usuario2->password = "123456789";

        $usuario2->save();
    }
}
