<?php

namespace App\Traits\AlbionOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personaje;

trait Gremio
{
    /**
	* Esta función realiza una consulta a la Pagina del gameinfo.albiononline 
    * para buscar información de los gremios por nombre. 
	* 
	* @param string   $text	cadena de texto que contiene el nombre del gremio
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

			if (!empty($respuesta->guilds)) {
				return $respuesta->guilds;
			} else {
				return false;
			}	

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }
	}
    
    /**
	* Esta función realiza una consulta a la Pagina del gameinfo.albiononline 
    * para buscar información de los gremios por su id. 
	* 
	* @param string   $text	cadena de texto que contiene el ID
	*
	* @return Retorna un array.
	*/	

    public function consultargremio($text)
	{
        try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/';
			$response = Http::get($url.$text.'/data');

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido			

            $respuesta = json_decode($respuesta); //convertimos en json	

			
			return $respuesta;
			

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }
	} 

    /**
	* Esta función realiza una consulta a la Pagina del gameinfo.albiononline 
    * para buscar información de los gremios por su id, lista de usuarios. 
	* 
	* @param string   $text	cadena de texto que contiene el ID
	*
	* @return Retorna un array.
	*/	

    public function integrantesdelgremio($text)
	{
        try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/';
			$response = Http::get($url.$text.'/members');

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido			

            $integrantes = json_decode($respuesta);


			foreach ($integrantes as $integrante) {
				if (Personaje::where('Id_albion', $integrante->Id)->exists()) {
					$info = $integrantes;
				} else {
					$info = Personaje::create([
						'Id_albion' => $integrante->Id,
						'Name' => $integrante->Name,
						'GuildId' => $integrante->GuildId
					]);
				}
			}
			
			return $info;
			

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }
	}
}    