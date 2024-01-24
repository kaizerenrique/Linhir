<?php

namespace App\Traits\AlbionOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \App\Traits\Notificaciones\Discord;
use App\Models\Serverstatus;

trait Estadodelservidor 
{
    use Discord;

    public function consultar_estado_del_servidor()
    {
        try {
            $url = 'https://serverstatus.albiononline.com/';
            $response = Http::get($url);
            $respuesta = $response->getBody()->getContents();// accedemos a el contenido	
            $respuesta = json_decode($respuesta);
            return $respuesta;

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return false;
        }
    }

    public function guardar_estado()
    {
        $status = $this->consultar_estado_del_servidor();

        if ($status == false) {
            $status = 'error';
        } else {
            $ultimoregistro = Serverstatus::orderBy('created_at', 'desc')->first();

            if ($ultimoregistro == null) {                
                $registro = Serverstatus::create([
                    'status' => $status->status,
                    'message' => $status->message,
                ]);
                $this->status_server($status);
                
            } else {
                
                if ($ultimoregistro->status == $status->status) {                   
                    
                    return $status;
                } else {
                    $registro = Serverstatus::create([
                        'status' => $status->status,
                        'message' => $status->message,
                    ]);
                    $this->status_server($status);
                    return $status;
                }                
            }            
        } 
        
    }

}