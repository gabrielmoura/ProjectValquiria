<?php

namespace App\Console;

use App\Jobs\Minios\BuscarCotasAtrasadas;
use App\Jobs\Minios\GerarCotasMensais;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->job(new GerarCotasMensais(), 'high')->monthlyOn(1);
        //$schedule->job(new BuscarCotasAtrasadas(), 'medium')->daily();
        $schedule->job(new GenerateSiteMapJob(), 'medium')->days([8, 19, 28])->at('01:00');

        $schedule
            ->command('backup:run')->daily()->at('01:00')
            ->onFailure(function () {

            })
            ->onSuccess(function () {

            });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
