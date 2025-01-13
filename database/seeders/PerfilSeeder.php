<?php

namespace Database\Seeders;

use Database\Factories\PerfilFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creación de datos de ejemplo específicos
        Perfil::factory()->create([
            'metros'=>100.5,
            'habitaciones'=>6,
            'banyos'=>2,
            'ascensor'=>true,
            'eficiencia'=>'B',
            'anyo'=>1978,
            'inmueble_id'=>4
        ]);
    }
}
