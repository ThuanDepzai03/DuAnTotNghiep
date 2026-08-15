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
        // Run cleanup of abandoned unpaid orders every day at 2 AM
        $schedule->command('orders:cleanup-abandoned')
            ->dailyAt('02:00');
        
        // Run cleanup of cancelled orders every day at 2:30 AM
        $schedule->command('orders:cleanup-cancelled')
            ->dailyAt('02:30');
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
