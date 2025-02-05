<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;


class Ciudad extends Model
{
    //
    /**
     * @var string[]
     */
    protected $hidden = ['id','created_at','updated_at'];

    /**
     * Obtiene un ID aleatorio de las ciudades almacenadas en la base de datos
     *
     * @return int
     */
    public static function obtenerIdCiudadAleatorio(){
        //Obtener el número total de ciudades que hay en la base de datos
        $numeroCiudades=DB::table('ciudads')->count();


        //Obtener un número aleatorio entre 1 y el total de ciudades
        return mt_rand(1,$numeroCiudades);

    }

    /**
     * Permite accede a los inmuebles propiedad del usuario
     *
     * @return HasMany
     */
    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class);
    }
}
