<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creación de usuarios uno por uno
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'address'=>'Reina Sofia'
        ]);

        User::factory()->create([
            'name' => 'Inma',
            'email' => 'Inma@mail.com',
            'address'=>'Reina Sofia'
        ]);*/

        //Creación usuarios múltiples
        //User::factory(100)->create();


    }
}
