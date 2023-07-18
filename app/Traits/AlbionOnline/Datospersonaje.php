<?php

namespace App\Traits\AlbionOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait Datospersonaje
{
    /**
	* Esta función realiza una consulta a la Pagina del gameinfo.albiononline 
    * para buscar información de los personajes. 
	* 
	* @param string   $text	cadena de texto que contiene el nombre del personaje
	*
	* @return Retorna un array.
	*/	

    public function consultar($text)
	{
        try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/search?q=';
			$response = Http::get($url.$text);

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido			

            $respuesta = json_decode($respuesta); //convertimos en json	

			if (!empty($respuesta->players)) {
				return $respuesta->players;
			} else {
				return false;
			}	

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }
	} 
    
}