<?php

namespace App\Traits\Notificaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\Carbon;


trait Discord
{

    public function notificacion()
    {
        $date = Carbon::now();
        $linhir_url_bot = config('app.linhir_bot_discord');
        $registro = 'Kills';
        $client = new Client();

        $response = $client->post($linhir_url_bot,[
            'json' => [
                "content" => "Prueba de mensaje", 
                "username" => "Bot de mensaje", 
                "avatar_url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg", 

                "embeds" => [ 
                    [ 
                        "title" => $registro, 
                        "type" => "rich", 
                        "description" => "Esta es una descripción",  
                        "url" => "https://linhir.xyz/",  
                        "timestamp" => $date, 

                        "thumbnail" => [
                            "url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg"
                        ],
 
                        "image" => [
                            "url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg"
                        ],
 
                        "author" => [
                            "name" => "Linhir Web Bot",
                            "url" => "https://linhir.xyz/" 
                        ] 
                    ] 
                ]
            ]
        ]);

        $alfa = $response->getBody();
        
        return $alfa;

    }

} 