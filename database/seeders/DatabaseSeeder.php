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

        $user1 = new User();
        $user1->name =  "Administrador";
        $user1->email = "admin@sigepsi.com";
        $user1->password = Hash::make('admin123');
        $user1->assignRole('Administrador');
        $user1->save();

        // $user2 = new User();
        // $user2->name =  "moises";
        // $user2->email = "moises@hotmail.com";
        // $user2->password = Hash::make('admin123');
        // $user2->assignRole('Estudiante');
        // $user2->save();

        // $user3 = new User();
        // $user3->name =  "Ivoo";
        // $user3->email = "ivoo@ivoo.com";
        // $user3->password = Hash::make('admin123');
        // $user3->assignRole('Comunidad');
        // $user3->save();

        // $user4 = new User();
        // $user4->name =  "Director";
        // $user4->email = "director@director.com";
        // $user4->password = Hash::make('admin123');
        // $user4->assignRole('Director');
        // $user4->save();


    }
}
