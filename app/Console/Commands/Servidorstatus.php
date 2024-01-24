<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Traits\AlbionOnline\Estadodelservidor;

class Servidorstatus extends Command
{
    use Estadodelservidor;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consulta:servidorstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'estado del servidor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $operacion = $this->guardar_estado();
    }
}
