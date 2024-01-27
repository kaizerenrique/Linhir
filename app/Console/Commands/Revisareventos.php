<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Traits\AlbionOnline\Gremio;

class Revisareventos extends Command
{
    use Gremio;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consulta:revisareventos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consultar eventos de linhir muertes y kills';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $operacion = $this->revisarlinhir();
    }
}
