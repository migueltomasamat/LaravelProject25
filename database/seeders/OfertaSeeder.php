<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use App\Models\User;
use Database\Factories\OfertaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<30;$i++){
            DB::table('ofertas')->insert([
                'inmueble_id'=>DB::table('inmuebles')->inRandomOrder()->firstOrFail('id')->id,
                'user_id'=>DB::table('users')->inRandomOrder()->firstOrFail('id')->id,
                'precio'=>fake()->randomFloat(2,1000,10000000),
            ]);

        }
    }
}
