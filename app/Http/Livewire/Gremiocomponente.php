<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Guild;

class Gremiocomponente extends Component
{
    use Gremio;
    use WithPagination;
    use WithFileUploads;

    public $modalAgregar = false;
    public $buscar,$activo, $lim;  
    public $modalGremio = false;
    public $id_gremio, $nombre_gremio, $alianza_gremio, $miembros_gremio, $imagen, $estado;

    protected $queryString = [
        'buscar' => ['except' => ''],
        'activo' => ['except' =>  false]
    ];

    protected function rules()
    {
        if ($modalGremio = true) {
            return [
                'id_gremio' => 'required|string|unique:guilds,id_gremio',
                'nombre_gremio' => 'required|string',
                'alianza_gremio' => 'nullable|string',
                'imagen' => 'nullable|image|max:2048',
                'estado' => 'boolean',
            ];
        }           
    }

    public function render()
    {
        $gremios = $this->consultar($this->buscar);

        if ($this->lim == null) {
            $this->lim = 6;
        }  

        $guilds = Guild::where('nombre_gremio', 'like', '%'.$this->buscar . '%')  //buscar por nombre
                        ->when($this->activo, function($query)
                        {
                            //consulta solo las actividades con estatus activo
                            return $query->activo(); 
                        })
                      ->orderBy('id') //ordenar de forma decendente
                      ->paginate($this->lim); //paginacion

        $num = Guild::count();
        $acti = Guild::activo()->count();
        
        return view('livewire.gremiocomponente',[
            'gremios' => $gremios,
            'guilds' => $guilds,
            'num' => $num,
            'acti' => $acti
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
     * Corrige la numeracion de la tabla al estar el 
     * chek activo
     */
    public function updatingActivo()
    {
        $this->resetPage();
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

    /**
     * Busca la información básica 
     * de un gremio
     */
    public function detallesdegremio($identificador)
    {
        $this->modalAgregar = false;
        $informacion = $this->consultargremio($identificador);
        
        $this->id_gremio = $informacion->guild->Id;
        $this->nombre_gremio = $informacion->guild->Name;
        $this->alianza_gremio = $informacion->guild->AllianceTag;
        $this->miembros_gremio = $informacion->basic->memberCount;
        $this->estado = true;
        $this->reset(['buscar']);    
        $this->modalGremio = true;
    }

    /**
     * Almacena el identificador usado por albion  
     * de un gremio, su nombre y su escudo
     */
    public function guardargremio()
    {
        $this->validate();

        if (!empty($this->imagen)){
            $imagen = $this->imagen->store('public/gremios');
            $imagen_ruta = Storage::url($imagen);
        } else {
            $imagen_ruta = null;            
        }

        Guild::create([
            'id_gremio' => $this->id_gremio,
            'nombre_gremio' => $this->nombre_gremio,
            'escudo' => $imagen_ruta,
            'estado' => $this->estado
        ]);

        $this->modalGremio = false;

    }
}
