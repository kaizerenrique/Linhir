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
			$Id_albions[] = $perfil->Id_albion;
		}
        
        foreach ($Id_albions as $Id_albion) {
            $personajes[] = $this->personaje($Id_albion);
        }
        
        return view('livewire.personaje',[
            'personajes' => $personajes,
        ]);
        
    }

}
