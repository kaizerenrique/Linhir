<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Gremiocomponente extends Component
{
    use Gremio;
    use WithPagination;
    use WithFileUploads;

    public $modalAgregar = false;
    public $buscar;  
    public $modalGremio = false;
    public $id_gremio, $nombre_gremio, $alianza_gremio, $miembros_gremio, $imagen;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    protected function rules()
    {
        if ($modalGremio = true) {
            return [
                'id_gremio' => 'required|string',
                'nombre_gremio' => 'required|string',
                'alianza_gremio' => 'nullable|string',
                'imagen' => 'nullable|image|max:2048',
            ];
        }           
    }

    public function render()
    {
        $gremios = $this->consultar($this->buscar);
        
        return view('livewire.gremiocomponente',[
            'gremios' => $gremios,
        ]);
    }

    /**
     * Despliega el modal para agregar 
     * un gremio
     */
    public function modalgremio()
    { 
        $this->reset(['buscar']);                
        $this->modalAgregar = true;
    }

    public function detallesdegremio($identificador)
    {
        $this->modalAgregar = false;
        $informacion = $this->consultargremio($identificador);
        
        $this->id_gremio = $informacion->guild->Id;
        $this->nombre_gremio = $informacion->guild->Name;
        $this->alianza_gremio = $informacion->guild->AllianceTag;
        $this->miembros_gremio = $informacion->basic->memberCount;

        $this->reset(['buscar']);    
        $this->modalGremio = true;
    }

    public function guardargremio()
    {
        $r = $this->validate();

        dd($r);
    }
}
