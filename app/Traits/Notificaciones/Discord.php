<?php

namespace App\Traits\Notificaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\Carbon;


trait Discord
{

    public function enviar($infonota)
    {
        $date = Carbon::now(); //fecha
        $linhir_url_bot = config('app.linhir_bot_discord');   
        $registro = $infonota['tip'];     
        $client = new Client();
        
        $response = $client->post($linhir_url_bot,[
            'json' => [ 
                "username" => "Linhir_Bot",
                "avatar_url" => "https://www.korosenai.es/wp-content/uploads/2020/02/tanjiro-kamado.jpg",

                "embeds" => [ 
                    [ 
                        "title" => $registro, 
                        "type" => "rich", 
                        "description" => $infonota['description'],  
                        "url" => "https://albiononline.com/killboard/kill/".$infonota['id_evento'],  
                        "timestamp" => $date, 

                        "fields" => [
                            [
                                "name" => "Fecha y Hora",
                                "value"=> $infonota['data']
                            ],                              
                            
                        ], 

                        "image" => [
                            "url" => $infonota['imagen']
                        ],
                        
                    ] 
                ]
            ]
        ]);

        $alfa = $response->getBody();
        
        return $alfa;

    }

    public function status_server($status)
    {
        $date = Carbon::now()->format('Y-m-d H:i'); //fecha
        $linhir_url_bot = config('app.linhir_bot_discord');     
        $client = new Client();

        $escudo = asset('/plantilla/linhir_escudo_400x500.png');
        
        $response = $client->post($linhir_url_bot,[
            'json' => [ 
                "username" => "Linhir_Bot",
                "avatar_url" => $escudo,

                "embeds" => [ 
                    [ 
                        "title" => "Estado del servidor de Albion" , 
                        "type" => "rich", 
                        "description" => $status->status,
                        "color"=> "1127128",
                        "fields" => [
                            [
                                "name" => "UTC",
                                "value"=> $date
                            ],                              
                            
                        ], 
                        
                    ] 
                ]
            ]
        ]);

        $alfa = $response->getBody();
        
        return $alfa;

    }

} 