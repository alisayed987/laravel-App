<?php

namespace App\Console;

use App\Models\Address;
use App\Models\User;
use Carbon\Carbon;
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
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            foreach (Address::all() as $address) {
                if (Carbon::parse($address['created_at'])->diffInMinutes(Carbon::now()) >= 60) {
                    $address['isOld'] = true;
                    $address->save();
                }
                //  else {
                //     $address['isOld'] = false;
                //     $address->save();
                // }
            }
        })->everyMinute();
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
