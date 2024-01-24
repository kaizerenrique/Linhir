<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;
use \App\Traits\AlbionOnline\Estadodelservidor;
use App\Models\Configuracion;

class Configuraciones extends Component
{
    use Gremio;
    use Estadodelservidor;

    public function render()
    {
        $config = Configuracion::first();

        $status = $this->consultar_estado_del_servidor();
        
        
        return view('livewire.configuraciones',[
            'config' => $config,
            'status' => $status
        ]);
    }

    /**
     * Esta funcion realiza una busqueda de todas las 
     * muertes y kill del los jugadores del gremio
     */
    public function buscarmuertesacecinatos()
    {
        $this->revisarlinhir();
    }

    /**
     * Esta funcion define el estado de los envios 
     * de las notificaciones 
     */
    public function notificacion($respuesta)
    {
        $notificacion = Configuracion::first();

        if ($respuesta == 'apagar') {
            $notificacion->notificar = false;
            $notificacion->save(); 
        } elseif ($respuesta == 'activar') {
            $notificacion->notificar = true;
            $notificacion->save(); 
        }
        
    }

}
