<?php

namespace App\Traits\Notificaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\Carbon;


trait Discord
{

    public function notificacion($infonota)
    {
        $date = Carbon::now();
        $linhir_url_bot = config('app.linhir_bot_discord');
        $registro = $infonota['tip'];
        $client = new Client();

        $response = $client->post($linhir_url_bot,[
            'json' => [
                "username" => "Bot de mensaje", 
                "avatar_url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg", 

                "embeds" => [ 
                    [ 
                        "title" => $registro, 
                        "type" => "rich", 
                        "description" => $infonota['description'],  
                        "url" => "https://linhir.xyz/",  
                        "timestamp" => $date, 

                        "thumbnail" => [
                            "url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg"
                        ],
 
                        "image" => [
                            "url" => $infonota['imagen']
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