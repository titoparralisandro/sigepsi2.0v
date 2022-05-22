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

        $user = new User();
        $user->name =  "Comite";
        $user->email = "comite@comite.com";
        $user->password = Hash::make('admin123');
        $user->assignRole('Comite');
        $user->save();

        $user4 = new User();
        $user4->name =  "Director Universitario";
        $user4->email = "director@sigepsi.com";
        $user4->password = Hash::make('admin123');
        $user4->assignRole('Director');
        $user4->save();

    }
}
