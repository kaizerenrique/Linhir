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
        $registro = 'Kills';
        $client = new Client();

        $response = $client->post('https://discord.com/api/webhooks/1131277636715429908/e3cWEF6MJSXPgfUykRq2bjxrwD2UlB-OWxFy60sZPLwnGqxlh5K0EdCvczpgZAHxxlEa',[
            'json' => [
                "content" => "Prueba de mensaje", 
                "username" => "Bot de mensaje", 
                "avatar_url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg", 

                "embeds" => [ 
                    [ 
                        "title" => $registro, 
                        "type" => "rich", 
                        "description" => "Esta es una descripción",  
                        "url" => "https://nubecolectiva.com/",  
                        "timestamp" => $date, 

                        "thumbnail" => [
                            "url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg"
                        ],
 
                        "image" => [
                            "url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg"
                        ],
 
                        "author" => [
                            "name" => "Nube Colectiva",
                            "url" => "https://nubecolectiva.com/" 
                        ] 
                    ] 
                ]
            ]
        ]);

        $alfa = $response->getBody();
        
        return $alfa;

    }

} 