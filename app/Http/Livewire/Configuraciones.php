<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;
use App\Models\Configuracion;

class Configuraciones extends Component
{
    use Gremio;

    public function render()
    {
        $config = Configuracion::first();

        return view('livewire.configuraciones',[
            'config' => $config
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
