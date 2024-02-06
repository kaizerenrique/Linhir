<?php

namespace App\Traits\Operaciones;
use App\Models\Actividad;
use App\Models\Historico;

trait Operaciones 
{
    public function elegiractividad()
    {
        $result = Actividad::activo()->inRandomOrder()->limit(1)->first();

        $data = Historico::latest()->orderBy('id', 'desc')->first();  
        
        if ($data->actividad_id == $result->id ) { 

            $result = Actividad::first();

            Historico::create([
                'actividad_id' => $result->id
            ]);
            
            $resg = [
                'title' => $result->titulo,
                'description' => $result->detalle,
                'image' => $result->imagen_referencia,
                'inicio' => $result->inicioactividad,
                'fin' => $result->finactividad,
            ];

        } else {
            Historico::create([
                'actividad_id' => $result->id
            ]);

            $resg = [
                'title' => $result->titulo,
                'description' => $result->detalle,
                'image' => $result->imagen_referencia,
                'inicio' => $result->inicioactividad,
                'fin' => $result->finactividad,
            ];
        }

        return $resg;        
    }



}
