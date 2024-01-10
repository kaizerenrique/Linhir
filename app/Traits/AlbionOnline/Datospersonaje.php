<?php

namespace App\Traits\AlbionOnline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personaje;
use App\Models\Evento;
use \App\Traits\Notificaciones\Discord;
use App\Models\Configuracion;
use Carbon\Carbon;

trait Datospersonaje
{
	use Discord;

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
	
	/**
	* Esta función realiza una consulta a la Pagina del gameinfo.albiononline 
    * para buscar información de los personajes segun su id. 
	* 
	* @param string   $identificador cadena de texto que contiene el id de albion 
	* del personaje
	*
	* @return Retorna un array.
	*/

	public function personaje($identificador) 
	{
		try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/players/';
			$response = Http::get($url.$identificador);

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
    * para buscar información de las kills realizadas por el personajes. 
	* 
	* @param string   $identificador cadena de texto que contiene el id de albion 
	* del personaje
	*
	* @return Retorna un array.
	*/	
    
	public function kills($identificador)
	{
		try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/players/';
			$response = Http::get($url.$identificador.'/kills');

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
    * para buscar información de las deaths sufridas por el personajes. 
	* 
	* @param string   $identificador cadena de texto que contiene el id de albion 
	* del personaje
	*
	* @return Retorna un array.
	*/

	public function deaths($identificador)
	{
		try {
            $url = 'https://gameinfo.albiononline.com/api/gameinfo/players/';
			$response = Http::get($url.$identificador.'/deaths');

			$respuesta = $response->getBody()->getContents();// accedemos a el contenido		

            $respuesta = json_decode($respuesta); //convertimos en json							

			return $respuesta;			

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            //report($e);	 
	        return false;
        }

	}

	public function eventos($respuesta , $identificador , $tipo)
	{
		$configuraciones = Personaje::where('Id_albion', $identificador)->get();
		$notificacion = Configuracion::first();
			
			foreach ($configuraciones as $config){
				$idpersonaje = $config->id;
			}
	
			$per = Personaje::find($config->id);

			foreach ($respuesta as $resp) {
				if (Evento::where('EventId', $resp->EventId)->exists()) {				
					
				} else {
					$data = Carbon::parse($resp->TimeStamp)->format('d-m-Y H:i:s');
					$inf = $per->eventos()->create([
						'EventId' => $resp->EventId,
						'BattleId' => $resp->BattleId,
						'tipo' => $tipo,
						'created_at' => $data 
					]);	
					
					if ($notificacion->notificar = true) {
						if ($resp->Victim->GuildName == 'Linhir') {						
							$infonota = [
								'description' => '**'.$resp->Victim->Name.'**'.' a muerto a manos de '.'**'.$resp->Killer->Name.'**',
								'tip' => 'Muerte',
								'imagen' => 'https://media.tenor.com/4dikOAK9gaIAAAAC/soldado-caido-funeral.gif',
								'id_evento' => $resp->EventId,
								'data' => $data 
							];	
						} else {
							$infonota = [
								'description' => '**'.$resp->Victim->Name.'**'.' a muerto a manos de '.'**'.$resp->Killer->Name.'**',
								'tip' => 'Victoria',
								'imagen' => 'https://img.desmotivaciones.es/201305/klasdklsd.jpg',
								'id_evento' => $resp->EventId,
								'data' => $data 
							];									
						}
						
						$notif = $this->enviar($infonota);			
					}
				}				
			}
			
			

		return true;			
	}
}