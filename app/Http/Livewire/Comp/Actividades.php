<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actividad;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Historico;

class Actividades extends Component
{
    use WithPagination;
    use WithFileUploads;
    

    public $buscar,$activo, $lim;
    public $imagen;
    public $nuevaactividad = false;
    public $confirmarEliminar = false;
    public $titulo, $detalle, $inicioactividad, $finactividad, $estado;
    public $nombre, $identificador;

    protected function rules()
    {
        if ($nuevaactividad = true) {
            return [
                'titulo' => 'required|string|min:4|max:30',
                'detalle' => 'required|string|min:4|max:120',
                'inicioactividad' => 'required',
                'finactividad' => 'required',                
                'imagen' => 'nullable|image|max:2048',
                'estado' => 'boolean',
            ];
        }        
    }

    protected $queryString = [
        'buscar' => ['except' => ''],
        'activo' => ['except' =>  false]
    ];


    public function render()
    {
        if ($this->lim == null) {
            $this->lim = 6;
        }  

        $actividades = Actividad::where('titulo', 'like', '%'.$this->buscar . '%')  //buscar por nombre
                        ->when($this->activo, function($query)
                        {
                            //consulta solo las actividades con estatus activo
                            return $query->activo(); 
                        })
                      ->orderBy('id') //ordenar de forma decendente
                      ->paginate($this->lim); //paginacion
        
        $num = Actividad::count();
        $regis = Historico::count(); 
        $regis = $regis - 1;    
        
        return view('livewire.comp.actividades',[
            'actividades' => $actividades,
            'num' => $num,
            'regis' => $regis
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
     * Despliega el modal y limpia los campos
     * 
     */
    public function nueva_actividad()
    {
        $this->reset(['titulo']);
        $this->reset(['detalle']);
        $this->reset(['inicioactividad']); 
        $this->reset(['finactividad']);  
        $this->reset(['estado']);
        $this->reset(['imagen']);
        $this->estado = true;
        $this->nuevaactividad = true;
    }

    /**
     * Guarda las actividades
     * 
     */
    public function guardaractividad()
    {
        $res = $this->validate();        

        //almacenar imagen
        if (!empty($this->imagen)){
            $imagen = $this->imagen->store('public/actividades');
            $imagen_ruta = Storage::url($imagen);
        } else {
            $imagen_ruta = null;            
        }

        Actividad::create([
            'titulo' => $this->titulo,
            'detalle' => $this->detalle,
            'inicioactividad' => $this->inicioactividad,
            'finactividad' => $this->finactividad,
            'estado'=> $this->estado,
            'imagen_referencia' => $imagen_ruta
        ]);

        $this->nuevaactividad = false;

        session()->flash('message', 'La actividad se ha guardado correctamente.');        
    }

    /**
     * Consulta mediante un modal si desea eliminar 
     * una actividad
     */
    public function consultaborrar(Actividad $registro)
    {
        $this->nombre = $registro->titulo;
        $this->identificador = $registro->id;
        $this->confirmarEliminar = true;
    }

    /**
     * Elimina la actividad de la base de datos asi como
     * la imagen de la carpeta correspondiente 
     */
    public function borraractividad(Actividad $identificador)
    {
        if(!empty($identificador->imagen_referencia)){
            $url = str_replace('storage','public',$identificador->imagen_referencia);
            Storage::delete($url);
        } 
        $identificador->delete();
        $this->confirmarEliminar = false;
        session()->flash('message', 'La Actividad ha sido Eliminado correctamente.');
    }
}
