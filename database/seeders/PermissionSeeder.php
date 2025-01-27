<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Agente']);
        Role::create(['name'=>'Usuario']);

        Permission::create(['name'=>'ver inmueble']);
        Permission::create(['name'=>'editar inmueble']);
        Permission::create(['name'=>'borrar inmueble']);
        Permission::create(['name'=>'crear inmueble']);

        Permission::create(['name'=>'ver ofertas']);
        Permission::create(['name'=>'editar ofertas']);
        Permission::create(['name'=>'modificar ofertas']);
        Permission::create(['name'=>'borrar ofertas']);

        Permission::create(['name'=>'ver tu oferta']);
        Permission::create(['name'=>'editar tu oferta']);
        Permission::create(['name'=>'modificar tu oferta']);
        Permission::create(['name'=>'borrar tu oferta']);

        $admin = Role::findByName('Admin');
        $admin->givePermissionTo([
            'ver inmueble',
            'editar inmueble',
            'borrar inmueble',
            'crear inmueble',
            'ver ofertas',
            'editar ofertas',
            'modificar ofertas',
            'borrar ofertas'
        ]);

        $agente = Role::findByName('Agente');
        $agente->givePermissionTo([
            'ver inmueble',
            'editar inmueble',
            'borrar inmueble',
            'crear inmueble',
            'ver ofertas',
        ]);

        $usuario = Role::findByName('Usuario');
        $usuario->givePermissionTo([
            'ver inmueble',
            'ver tu oferta',
            'editar tu oferta',
            'modificar tu oferta',
            'borrar tu oferta',
            'crear inmueble',
            'editar inmueble'
        ]);

    }
}
