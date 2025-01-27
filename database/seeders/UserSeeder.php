<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creación de usuarios uno por uno
        User::factory()->create([
            'name' => 'Miguel',
            'email' => 'miguel@mail.com',
            'address'=>'Reina Sofia',
            'password'=>Hash::make('123456789')
        ])->assignRole('Admin');


        User::factory()->create([
            'name' => 'Inma',
            'email' => 'inma@mail.com',
            'address'=>'Reina Sofia',
            'password'=>Hash::make('123456789')
        ])->assignRole('Agente');

        User::factory()->create([
            'name' => 'Nora',
            'email' => 'nora@mail.com',
            'address'=>'Reina Sofia',
            'password'=>Hash::make('123456789')
        ])->assignRole('Usuario');

        //Creación usuarios múltiples
        User::factory(100)->create()->each(function($user){
            $user->assignRole('Usuario');
        });


    }
}
