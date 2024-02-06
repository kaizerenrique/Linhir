<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Traits\Notificaciones\Discord;

class Actividaddiaria extends Command
{
    use Discord;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actividad:actividaldeldia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envia una actividad diaria desde una lista';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $actividad = $this->actividad_diaria();
    }
}
