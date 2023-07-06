<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Personaje extends Component
{
    public $modalPrueba = false; 
    
    public function render()
    {
        return view('livewire.personaje');
    }

    public function modalprueba()
    {
        $this->modalPrueba = true;
    }
}
