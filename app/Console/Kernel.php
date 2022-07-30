<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        Commands\ExpirationEmails::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('expiration7days:email')
            ->dailyAt("10:00")
            ->timezone('Africa/casablanca');
        $schedule->command('expiration15days:email')
            ->cron('0 10 */15 * *')
            ->timezone('Africa/casablanca');;

        // ->skip(function () {
        //     return "salam";
        // });
        //for running tasks locally
        // php artisan schedule:work

        //for running task once
        // php artisan command:name
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
