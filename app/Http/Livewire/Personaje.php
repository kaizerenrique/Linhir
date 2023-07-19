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
        $resultados = $this->consultar($this->buscar);

        $identificador = 'iPSdBmtiSoSAL1Sp2DX1YQ';
        $resps = $this->deaths($identificador);


        

        dd($resps);
        
        return view('livewire.personaje',[
            'resultados' => $resultados,
        ]);
        
    }

    public function consultarpersonaje()
    {
        $this->modalpersonaje = true;
    }
}
