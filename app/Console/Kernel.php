<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //consultar el estado del servidor de albion
        $schedule->command('consulta:servidorstatus')->everyMinute();

        //revisa las muertes y las kills de los integrantes de linhir
        $schedule->command('consulta:revisareventos')->everyThreeMinutes();

        //envia una notificacion diaria con una actividad definida
        $schedule->command('actividad:actividaldeldia')->dailyAt('20:25');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
