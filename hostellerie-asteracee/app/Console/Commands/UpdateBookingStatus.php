<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;
use PhpParser\Node\Stmt\If_;

class UpdateBookingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:BookingStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of all the booking every hour';

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
}
