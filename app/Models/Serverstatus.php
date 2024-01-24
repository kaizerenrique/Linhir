<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serverstatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'message',
    ];
}
