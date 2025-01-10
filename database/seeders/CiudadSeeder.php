<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciudades=[];
        $fichero=fopen(Storage::path('municipios.csv'),'r');
        while(($datos=fgetcsv($fichero))!==false){
            $ciudades[]=[
                'codigo'=>$datos[0],
                'nombre'=>$datos[1],
                'cod_provincia'=>$datos[2]
            ];
        }
        fclose($fichero);
        foreach ($ciudades as $ciudad){
            DB::table('ciudads')->insert([
                'codigo'=>$ciudad['codigo'],
                'nombre'=>$ciudad['nombre'],
                'cod_provincia'=>$ciudad['cod_provincia']
            ]);
        }
    }
}
