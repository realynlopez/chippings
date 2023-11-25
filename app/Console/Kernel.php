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
        $schedule->call(function () {
            // Create a new daily transaction
            $dailyTransaction = new \App\Models\Transaction([
                'amount' => 100.00, // Replace with the actual amount
                'description' => 'Daily Transaction',
                'transaction_date' => now(),
            ]);
    
            $dailyTransaction->save();
        })->daily();
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