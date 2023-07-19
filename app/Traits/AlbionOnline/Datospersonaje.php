<?php

namespace App\Traits\AlbionOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personaje;
use App\Models\Evento;

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
    
	public function kills($identificador)
	{
		try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/players/';
			$response = Http::get($url.$identificador.'/kills');

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido		

            $respuesta = json_decode($respuesta); //convertimos en json	

			$this->eventos($respuesta , $identificador);

			return $respuesta;			

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }

	}

	public function deaths($identificador)
	{
		try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/players/';
			$response = Http::get($url.$identificador.'/deaths');

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido		

            $respuesta = json_decode($respuesta); //convertimos en json	

			$this->eventos($respuesta , $identificador);			

			return $respuesta;			

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }

	}

	public function eventos($respuesta , $identificador )
	{
		$configuraciones = Personaje::where('Id_albion', $identificador)->get();

			foreach ($configuraciones as $config){
				$idpersonaje = $config->id;
			}

			$per = Personaje::find($config->id);

			foreach ($respuesta as $resp) {
				if (Evento::where('EventId', $resp->EventId)->exists()) {
					$info = 'false';
				} else {

					$info = $per->eventos()->create([
						'EventId' => $resp->EventId,
						'BattleId' => $resp->BattleId
					]);
				}
				
			}			

			return $info;

	}
}