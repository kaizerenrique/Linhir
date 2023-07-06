<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Personaje extends Component
{
    public $modalpersonaje = false; 
    
    public function render()
    {
        return view('livewire.personaje');
    }

    public function consultarpersonaje()
    {
        $this->modalpersonaje = true;
    }
}
