<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Guild;
use Carbon\Carbon;

class Gremiocomponente extends Component
{
    use Gremio;
    use WithPagination;
    use WithFileUploads;

    public $modalAgregar = false;
    public $buscar,$activo, $lim;  
    public $modalGremio = false;
    public $modalver = false;
    public $confirmarEliminar = false;
    public $id_gremio, $nombre_gremio, $alianza_gremio, $miembros_gremio, $imagen;
    public $estado, $nombre, $identificador, $imagen2, $kills, $deaths, $fame, $founded, $id_alianza;

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

        session()->flash('message', 'El gremio se a registrado correctamente.'); 
    }

    /**
     * Consulta mediante un modal si desea eliminar 
     * un gremio de la lista
     */

    public function consultaeliminar(Guild $gremio)
    {
        $this->nombre = $gremio->nombre_gremio;
        $this->identificador = $gremio->id;
        $this->confirmarEliminar = true;
    }

    /**
     * Elimina el gremio de la base de datos asi como
     * la imagen de la carpeta correspondiente 
     */

    public function borrargremio(Guild $identificador)
    {
        if(!empty($identificador->escudo)){
            $url = str_replace('storage','public',$identificador->escudo);
            Storage::delete($url);
        } 
        $identificador->delete();
        $this->confirmarEliminar = false;
        session()->flash('message', 'El Gremio ha sido Eliminado correctamente.');
    }

    /**
     * Muestra los detalles del gremio
     * 
     */

    public function verdetalles(Guild $gremio)
    {        
        $informacion = $this->consultargremio($gremio->id_gremio);        
        $this->id_gremio = $informacion->guild->Id;
        $this->nombre_gremio = $informacion->guild->Name;
        $this->alianza_gremio = $informacion->guild->AllianceTag;
        $this->id_alianza = $informacion->guild->AllianceId;
        $this->miembros_gremio = $informacion->basic->memberCount;
        $this->fame = $informacion->overall->fame;        
        $this->deaths = $informacion->overall->deaths;
        $this->kills = $informacion->overall->kills;
        $this->founded = Carbon::parse($informacion->guild->Founded)->format('d-m-Y H:i:s');
        $this->imagen2 = $gremio->escudo; 
        $this->modalver = true; 
    }
}
