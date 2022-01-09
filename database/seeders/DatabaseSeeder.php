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

    }
}
