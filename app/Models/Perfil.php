<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfil extends Model
{
    /** @use HasFactory<\Database\Factories\PerfilFactory> */
    use HasFactory;

    protected $hidden = ['created_at','updated_at','inmueble_id','id'];
    public function inmueble():BelongsTo{
        return $this->belongsTo(Inmueble::class);
    }
}
