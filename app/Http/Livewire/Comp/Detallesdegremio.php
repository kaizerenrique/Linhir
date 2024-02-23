<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;
use App\Models\Guild;
use \App\Traits\AlbionOnline\Gremio;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use App\Models\Personaje;
use App\Models\Player;

class Detallesdegremio extends Component
{
    use Gremio;
    use WithPagination; 

    public $datos;
    public $buscar, $lim;

    public function mount(Guild $slug)
    {
        $this->datos = $slug;
    }

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        
        $datos_gremio = $this->datos;

        $informacion = $this->consultargremio($this->datos->id_gremio );
        $integrantes = $this->integrantesdelgremio($this->datos->id_gremio );

        foreach ($integrantes as $integrante) {
            if (Player::where('Id_albion', $integrante->Id)->exists()) {
                $info = $integrantes;
            } else {
                $this->datos->players()->create([
                    'Id_albion' => $integrante->Id,
                    'Name' => $integrante->Name,
                ]);					
            }
        }

        if ($this->lim == null) {
            $this->lim = 6;
        } 

        $miembros = Player::where('guild_id', $this->datos->id)->where('Name', 'like', '%'.$this->buscar . '%')
                    ->orderBy('id') //ordenar de forma decendente
                    ->paginate($this->lim); //paginacion;

        //dd($this->datos);

        return view('livewire.comp.detallesdegremio',[
            'datos_gremio' => $datos_gremio,
            'informacion' => $informacion,
            'integrantes' => $integrantes,
            'miembros' => $miembros
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
