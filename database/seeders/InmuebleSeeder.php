<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inmueble::factory(10)->hasPropietario()->hasPerfil()->create();
    }
}
