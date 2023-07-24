<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Traits\AlbionOnline\Gremio;
use App\Models\Personaje;

class Gremiolinhir extends Component
{
    use Gremio;
    use WithPagination; 

    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $linhir_id = config('app.linhir_gremio_id');
        $informacion = $this->consultargremio($linhir_id);
        $integrantes = $this->integrantesdelgremio($linhir_id);

        $lim = 6;

        $orden = Personaje::all();
        if ($orden->isEmpty()) {
            $llenar = $this->integrantesdelgremiolinhir();
        } 
        

        $miembros = Personaje::where('Name', 'like', '%'.$this->buscar . '%')  //buscar por nombre
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate($lim); //paginacion

        //$gre = $this->revisarlinhir();

        //dd($llenar);
                      
        return view('livewire.gremiolinhir',[
            'informacion' => $informacion,
            'miembros' => $miembros,
            'integrantes' => $integrantes
        ]);
    }

    /**
     * Corrige la numeracion de la tabla al realizar 
     * una busqueda
     */
    public function updatingBuscar()
    {
        $this->resetPage();
    }
}
