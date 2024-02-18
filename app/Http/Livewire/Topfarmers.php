<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;

class Topfarmers extends Component
{
    use Gremio;

    public function render()
    {
        $tops = $this->topfarmerslinhir();        

        return view('livewire.topfarmers',[
            'tops' => $tops,
        ]);
    }
    
}
