<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateUserLoyalty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:UserLoyalty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check users bookings and update the loyalty if booking is ended and confirmed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $u) {

            $userBookings = $u->getBookings()->get();
            $loyaltyCount = 0;
            foreach ($userBookings as $b) {
                if ($b->status === 'ended'){
                    $loyaltyCount++;
                }
            }
            $u->loyalty = $loyaltyCount;
            $u->save();
        }
    }
}
