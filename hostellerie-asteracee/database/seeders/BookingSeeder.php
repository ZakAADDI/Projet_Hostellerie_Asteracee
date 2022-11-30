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
                'room_id' => 11,
                'user_id' => 2,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 2,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 3,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 4,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 5,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 7,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 9,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','29')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 10,
                'user_id' => 1,
                'starting_date' => Carbon::createFromDate('2022','11','29')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','30')->format('Y-m-d'),
                'status' => "ongoing",
                'card_number' => "00 00 00 00 00 00 00 00",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        Booking::insert($datas);
    }
}
