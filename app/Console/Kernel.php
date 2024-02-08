<?php

namespace App\Console;

use App\Jobs\MsgJob;
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
        $schedule->job(new MsgJob)->everyMinute();
        $schedule->command('php artisan cache:clear')->daily();
        $schedule->command('add:post')->daily();
        $schedule->command('mail:send')->daily()->withoutOverlapping(2);
        // $schedule->command('generate:msg')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
