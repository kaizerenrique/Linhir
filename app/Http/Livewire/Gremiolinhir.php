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
    public $confirmarEliminar = false;  
    public $personaje;
    public $identificador;

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

        $num = count($integrantes);
        $int = $orden->count();

        if ($num = $int) {
            $llenar = $this->integrantesdelgremiolinhir();                       
        }        
        

        $miembros = Personaje::where('Name', 'like', '%'.$this->buscar . '%')  //buscar por nombre
                      ->orderBy('id') //ordenar de forma decendente
                      ->paginate($lim); //paginacion
           
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

    /**
     * pregunta si quiere borrar un personaje 
     * borrar integrante de gremio
     */
    public function consultaborrarintegrante(Personaje $personaje)
    {
        $this->confirmarEliminar = true;
        $this->personaje = $personaje->Name;
        $this->identificador = $personaje->id;
        //dd($personaje);
    }

    /**
     * borrar un personaje 
     * 
     */
    public function eliminarPersonaje(Personaje $identificador)
    {
        $identificador->delete();
        $this->confirmarEliminar = false;
        session()->flash('message', 'El Personaje ha sido Eliminado correctamente.');
    }
}
