<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'detalle',
        'inicioactividad',
        'finactividad',
        'estado',
        'imagen_referencia'
    ];

    /**
    * Realiza una busqueda de los elementos activos
    */

    public function scopeActivo( $query)
    {
         return $query->where('estado', 1);
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }
}
