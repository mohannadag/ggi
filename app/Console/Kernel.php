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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currencies = \AmrShawky\LaravelCurrency\Facade\Currency::rates()
                        ->latest()
                        ->get();
            $baseCurrencies = \App\Models\Currency::all();
            $USD = $baseCurrencies->where('name', '==', 'USD')->first();
            $TRY = $baseCurrencies->where('name', '==', 'TRY')->first();
            $EUR = $baseCurrencies->where('name', '==', 'EUR')->first();
            $USD->value = $currencies['USD'];
            $TRY->value = $currencies['TRY'];
            $EUR->value = $currencies['EUR'];
            $USD->update();
            $TRY->update();
            $EUR->update();
        })->hourly();
        // $schedule->command('inspire')->hourly();
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
