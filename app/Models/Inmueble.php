<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inmueble extends Model
{
    /** @use HasFactory<\Database\Factories\InmuebleFactory> */
    use HasFactory;

    protected $hidden = ['ciudad_id','created_at','updated_at'];
    protected $fillable = ['numcat','direccion','numero','bloque','piso','puerta','propietario_id','ciudad_id'];

    public function ciudad():BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function perfil():HasOne{
        return $this->hasOne(Perfil::class);
    }

    public function propietario():BelongsTo{

        return $this->belongsTo(User::class,'propietario_id');
    }
}
