<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Id_albion',
        'GuildId'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'personaje_id');
    }
}
