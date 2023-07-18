<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Datospersonaje;
use Livewire\WithPagination;

class Personaje extends Component
{
    use Datospersonaje;
    use WithPagination;

    public $modalpersonaje = false; 
    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];
    
    public function render()
    {
        //$texto = "BrandWard";
        $resultados = $this->consultar($this->buscar);
        
        //dd($resultados);
        return view('livewire.personaje',[
            'resultados' => $resultados,
        ]);
        
    }

    public function consultarpersonaje()
    {
        $this->modalpersonaje = true;
    }
}
