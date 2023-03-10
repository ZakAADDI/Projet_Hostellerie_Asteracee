# How to make and run a worker

## Make a command

To start, we will make a new command class.

    php artisan make:command *yourClassName*

This command will create a new command class in the app/Console/Commands directory.

In this new class locate:

        protected $signature = 'command:name';

Whatever you replace the words command:name with, will be used to execute the full command.

        protected $signature = *yourCommandName*;

This is where you have to place the description of what this command will actually do. When the Artisan list executes, this command will be listed alongside the custom description you insert with the command.

        protected $description = *Command description*;

Finally, you now want to locate the handle() function that is called whenever you execute this command. This is where the logic or the code of your command should be present. 

As an example, this handle() will select all bookings and update its status: 

        public function handle(){

        $bookings = Booking::where('status', 'ongoing')->get();
            $now = Carbon::now();

            foreach ($bookings as $b) {

              $end = Carbon::createFromFormat('Y-m-d', $b->ending_date)->toDateTimeString();

               if ($now->greaterThan($end) && !$b->is_confirmed) {
                  $b->status = 'canceled';
               } elseif ($now->greaterThan($end)) {
                   $b->status = 'ended';
               }
               $b->save();
            }
        }

## Kernel.php

In this file, protected $commands are where you have to register the command class and schedule function is where you set the command to be executed at the specified time interval. This is where the Cron jobs are handled.

First import your newly made command class in the $command :

            protected $commands = [
                *yourCommandClassName*::class
            ];

#### Scheduling Artisan Commands

The scheduler executes the commands (in this case only) on an hourly basis.

        $schedule->command('update:BookingStatus')->hourly();

$schedule->command('update:BookingStatus') is where you have set which command needs to be executed and  ->hourly(); defines the time interval.

> **List of frequency options:** https://laravel.com/docs/10.x/scheduling#schedule-frequency-options

## Commands

Start a specific command :

    php artisan *commandSignature*

List all the command and their set interval

    php artisan schedule:list

Running the scheduler locally

    php artisan schedule:work
