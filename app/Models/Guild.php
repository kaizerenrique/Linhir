<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gremio',
        'nombre_gremio',
        'escudo',
        'estado',
    ];

    /**
    * Realiza una busqueda de los elementos activos
    */

    public function scopeActivo( $query)
    {
         return $query->where('estado', 1);
    }
}
