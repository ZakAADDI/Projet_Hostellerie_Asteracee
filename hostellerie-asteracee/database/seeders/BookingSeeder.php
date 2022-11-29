<?php

namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                'room_id' => 1,
                'user_id' => 2,
                'starting_date' => date("Y-m-d H:i:s"),
                'ending_date' => date("Y-m-d H:i:s"),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 1,
                'user_id' => 1,
                'starting_date' => date("Y-m-d H:i:s"),
                'ending_date' => date("Y-m-d H:i:s"),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 1,
                'user_id' => 1,
                'starting_date' => date("Y-m-d H:i:s"),
                'ending_date' => date("Y-m-d H:i:s"),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        Booking::insert($datas);
    }
}
