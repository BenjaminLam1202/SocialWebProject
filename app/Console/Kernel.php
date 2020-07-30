<?php

namespace App\Console;

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
        Commands\DeleteCron::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('delete:cron')->hourly()->withoutOverlapping();
        //var_dump(count($schedule->events()));
        // var_dump(count($schedule->events()));

        // $schedule->call(function () {
        //     echo 'sleep 5 seconds' . PHP_EOL;
        //     sleep(12);
        // })->everyMinute();

        // var_dump(count($schedule->events()));

        // $schedule->call(function () {
        //     echo 'sleep 5 seconds' . PHP_EOL;
        //     sleep(5);
        // })->everyMinute();

        // var_dump(count($schedule->events()));
        

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
