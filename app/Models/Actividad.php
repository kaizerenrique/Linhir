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
        'created_at'
    ];

    public function asistentes()
    {
        return $this->hasMany(Asistencia::class);
    }
}
