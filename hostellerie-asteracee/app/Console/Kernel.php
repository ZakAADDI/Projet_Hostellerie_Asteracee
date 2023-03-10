<?php

namespace App\Console;

use App\Console\Commands\UpdateBookingStatus;
use App\Console\Commands\UpdateUserLoyalty;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected $commands = [
        UpdateBookingStatus::class,
        UpdateUserLoyalty::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sanctum:prune-expired --minutes=1')->everyTwoHours();
        $schedule->call(function () {
            DB::table('personal_access_tokens')->where('created_at', '<', Carbon::now()->subMinutes(120)->toDateTimeString())->delete();
        })->everyMinute();

        $schedule->command('update:BookingStatus')->hourly();
        $schedule->command('update:UserLoyalty')->daily();
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
