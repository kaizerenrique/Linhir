<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Traits\AlbionOnline\Gremio;

class Gremiolinhir extends Component
{
    use Gremio;
    use WithPagination; 

    public function render()
    {
        $linhir_id = "iS2Q2Mw3S1asC9GVMC5P2w";
        $informacion = $this->consultargremio($linhir_id);
        $integrantes = $this->integrantesdelgremio($linhir_id);
        

        return view('livewire.gremiolinhir',[
            'informacion' => $informacion,
            'miembros' => $integrantes
        ]);
    }
}
