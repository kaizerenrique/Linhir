<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;

class Calculadoradecultivos extends Component
{
    //barra de busqueda y check
    public $premium, $foco, $bono, $parcelas;
    public $carrotseed, $carrot;
   

    protected $queryString = [
        'premium' => ['except' => false],
        'foco' => ['except' =>  false],
        'bono' => ['except' =>  false]
    ];

    public function render()
    {
        //$carrot = $this->carrotcal($premium, $foco, $bono, $parcelas, $carrotseed, $carrot );

        return view('livewire.comp.calculadoradecultivos',[
            //'carrot' => $carrot
        ]);
    }

    public function carrotcal($premium, $foco, $bono, $parcelas, $carrotseed, $carrot )
    {
        $v = $this->validate([ 
            'premium' => 'boolean',
            'foco' => 'boolean',
            'bono' => 'boolean',
            'parcelas' => 'numeric',
            'carrotseed' => 'numeric',
            'carrot' => 'numeric',
        ]);


        return $v;

    }
}
