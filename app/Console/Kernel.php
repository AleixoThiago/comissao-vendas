<?php

namespace App\Console;

use App\Jobs\SendAdminSalesEmailJob;
use App\Jobs\SendSellerCommissionEmailJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(SendSellerCommissionEmailJob::class)->daily('23:59');
        $schedule->job(SendAdminSalesEmailJob::class)->daily('23:59');
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
