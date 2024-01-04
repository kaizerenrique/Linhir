<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use \App\Traits\AlbionOnline\Gremio;
use App\Models\Personaje;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Mail;

class Gremiolinhir extends Component
{
    use Gremio;
    use WithPagination; 

    public $buscar;
    public $confirmarEliminar = false;  
    public $personaje;
    public $identificador;
    public $agregarusuariomodal = false; 
    public $email , $rol, $idpersonaje, $idper;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    protected function rules()
    {
        if ($modalAgregar = true) {
            return [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'rol' => 'required',
                'idper' => 'required',
            ];
        }        
    }

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
            
        $roles = Role::all();

        return view('livewire.gremiolinhir',[
            'informacion' => $informacion,
            'miembros' => $miembros,
            'integrantes' => $integrantes,
            'roles' => $roles,
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

    /**
     * Esta funcion despliega el modal para agregar 
     * un usuario y asociarlo al personaje
     */
    public function agregarusuario(Personaje $idpersonaje)
    {
        $this->reset(['email']);
        
        $this->name = $idpersonaje->Name;
        $this->idper = $idpersonaje->id;                 
        $this->agregarusuariomodal = true;
    }

    /**
     * Esta funcion guarda los datos del usuario  
     * y lo asocia al personaje
     */
    public function guardarusuario()
    {
        $this->validate();

        //genera una contraseña de 8 caracteres de forma randon
        $password = Str::random(8);

        $usuario = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($password),
        ])->assignRole($this->rol);

        $pj = Personaje::find($this->idper);
        $pj->user_id = $usuario->id;
        $pj->update();        
        
        $this->agregarusuariomodal = false;
        session()->flash('message', 'Se registro el usuario correctamente.');    
        
        Mail::to($this->email)->send(new RegistroMailable($this->name, $this->email, $password));
    }
}
