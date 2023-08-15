<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;

    protected $fillable = [
        'notificar',
        'avatar_img',
        'deaths_img',
        'kills_img'
    ];
}
