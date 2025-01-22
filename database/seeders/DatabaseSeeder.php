<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PerfilFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CiudadSeeder::class,
            UserSeeder::class,
            InmuebleSeeder::class,
            OfertaSeeder::class
        ]);
    }
}
