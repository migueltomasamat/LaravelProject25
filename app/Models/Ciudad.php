<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;


class Ciudad extends Model
{
    //

    public static function obtenerIdCiudadAleatorio(){
        //Obtener el número total de ciudades que hay en la base de datos
        $numeroCiudades=DB::table('ciudads')->count();


        //Obtener un número aleatorio entre 1 y el total de ciudades
        return mt_rand(1,$numeroCiudades);

    }

    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class);
    }
}
