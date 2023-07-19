<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;

class Gremiocomponente extends Component
{
    use Gremio;

    public function render()
    {
        $texto = "iS2Q2Mw3S1asC9GVMC5P2w";
        $resultados = $this->integrantesdelgremio($texto);
        
        //dd($resultados);
        return view('livewire.gremiocomponente');
    }
}
