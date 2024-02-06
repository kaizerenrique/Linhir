<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = [
        'actividad_id',
        'detalle',
    ];

    public function actividades(){
        return $this->belongsTo(Actividad::class);
    }

}
