<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'EventId',
        'BattleId',
        'tipo',
        'created_at'
    ];

    public function personaje(){
        return $this->belongsTo(Personaje::class);
    }
}
