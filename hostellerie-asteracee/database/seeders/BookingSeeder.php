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
            // Juillet
            [
                'room_id' => 11,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023','07','01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','05')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 2,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023','07','03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','08')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023','07','05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','10')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 4,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023','07','07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','12')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023','07','09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','07','14')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023','07','11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','16')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 11,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023','07','13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','18')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 2,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023','07','15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','20')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023','07','17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','22')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 4,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023','07','19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','24')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023','07','21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','07','27')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023','07','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','07','31')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Août
            [
                'room_id' => 11,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023','08','01')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','05')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 2,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023','08','03')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','08')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023','08','05')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','10')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 4,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023','08','07')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','12')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023','08','09')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','08','14')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023','08','11')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','16')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 11,
                'user_id' => 3,
                'starting_date' => Carbon::createFromDate('2023','08','13')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','18')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'room_id' => 2,
                'user_id' => 4,
                'starting_date' => Carbon::createFromDate('2023','08','15')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','20')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'room_id' => 3,
                'user_id' => 5,
                'starting_date' => Carbon::createFromDate('2023','08','17')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','22')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 4,
                'user_id' => 6,
                'starting_date' => Carbon::createFromDate('2023','08','19')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','24')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 5,
                'user_id' => 7,
                'starting_date' => Carbon::createFromDate('2023','08','21')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','08','27')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'room_id' => 6,
                'user_id' => 8,
                'starting_date' => Carbon::createFromDate('2023','08','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2023','08','31')->format('Y-m-d'),
                'status' => "ongoing",
                'total_price' => 70,
                'occupants' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Novembre TODO
        ];
        Booking::insert($datas);
    }
}
