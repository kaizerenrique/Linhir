<?php

namespace App\Traits\Operaciones;
use App\Models\Actividad;

trait Operaciones 
{
    public function elegiractividad()
    {
        $result = Actividad::activo()->inRandomOrder()->limit(1)->first();

        return $result;
    }
}
