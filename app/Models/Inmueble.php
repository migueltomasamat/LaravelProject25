<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inmueble extends Model
{
    /** @use HasFactory<\Database\Factories\InmuebleFactory> */
    use HasFactory;

    /**
     * @var string[]
     */
    protected $hidden = ['ciudad_id','created_at','updated_at','propietario_id'];
    /**
     * @var string[]
     */
    protected $fillable = ['numcat','direccion','numero','bloque','piso','puerta','propietario_id','ciudad_id'];

    /**
     * @var string[]
     */
    protected $with = ['propietario','ciudad','perfil'];

    /**
     *
     * Relaciona el inmueble con la ciudad donde está situado
     *
     * @return BelongsTo
     */
    public function ciudad():BelongsTo
    {
        return $this->belongsTo(Ciudad::class);
    }

    /**
     * @return HasOne
     */
    public function perfil():HasOne{
        return $this->hasOne(Perfil::class);
    }

    /**
     * @return BelongsTo
     */
    public function propietario():BelongsTo{

        return $this->belongsTo(User::class,'propietario_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function ofertas():BelongsToMany{
        return $this->belongsToMany(User::class,'ofertas')
            ->withTimestamps()
            ->withPivot(['precio','fecha_vencimiento']);
    }
}
