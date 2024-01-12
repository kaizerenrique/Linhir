<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Traits\AlbionOnline\Gremio;

class Topfarmers extends Component
{
    use Gremio;

    public function render()
    {
        $tops = $this->topfarmers();

        //dd($tops);

        

        return view('livewire.topfarmers',[
            'tops' => $tops,
        ]);
    }

    public function topfarmers()
    {
        $linhir_id = config('app.linhir_gremio_id');
        $integrantes = $this->integrantesdelgremio($linhir_id);

        

        foreach ($integrantes as $integrante) {
           $cosechadorer[] = [
            'Cosechador' => $integrante->LifetimeStatistics->Gathering->Fiber->Total,
            'Name' => $integrante->Name,            
           ];

           $peleteros[] = [
            'Peletero' => $integrante->LifetimeStatistics->Gathering->Hide->Total,
            'Name' => $integrante->Name,            
           ];

           $prospectors[] = [
            'Prospector' => $integrante->LifetimeStatistics->Gathering->Ore->Total,
            'Name' => $integrante->Name, 
           ];

           $canteros[] = [
            'Cantero' => $integrante->LifetimeStatistics->Gathering->Rock->Total,
            'Name' => $integrante->Name, 
           ];

           $leñadores[] = [
            'Leñador' => $integrante->LifetimeStatistics->Gathering->Wood->Total,
            'Name' => $integrante->Name, 
           ];

           $pescadores[] = [
            'Pescador' => $integrante->LifetimeStatistics->FishingFame,
            'Name' => $integrante->Name, 
           ];

           $agricultores[] = [
            'Agricultor' => $integrante->LifetimeStatistics->FarmingFame,
            'Name' => $integrante->Name, 
           ];

           $crafters[] = [
            'Crafter' => $integrante->LifetimeStatistics->Crafting->Total,
            'Name' => $integrante->Name, 
           ];
        }

        //$cocechador_l = max($cosechadorer);

        $top_gremio = [
            'Cosechador' => max($cosechadorer),
            'Peletero' => max($peleteros),
            'Prospector' => max($prospectors),
            'Cantero' => max($canteros),
            'Leñador' => max($leñadores),
            'Pescador' => max($pescadores),
            'Agricultor' => max($agricultores),
            'Crafter' => max($crafters),
        ];

        //$collection = collect($top_gremio);
        
        return $top_gremio;         
    }
}
