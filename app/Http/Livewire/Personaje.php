<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Datospersonaje;

class Personaje extends Component
{
    use Datospersonaje;      
    
    public function render()
    {
        //buscar los personajes del usuario registrado
        $perfiles = auth()->user()->personajes;  
        
        foreach ($perfiles as $perfil){
			$Id_albion = $perfil->Id_albion;
		}

        //$personaje = $this->personaje($Id_albion);

        //dd($personaje);       
        
        
        return view('livewire.personaje');
        
    }

}
