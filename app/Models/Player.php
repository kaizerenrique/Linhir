<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Id_albion',
    ];

    public function Gremio(){
        return $this->belongsTo(Guild::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
