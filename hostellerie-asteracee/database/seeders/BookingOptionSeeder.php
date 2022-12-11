<?php

namespace Database\Seeders;

use App\Models\BookingOption;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingOptionSeeder extends Seeder
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
                'booking_id' => 1,
                'option_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'booking_id' => 2,
                'option_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'booking_id' => 3,
                'option_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'booking_id' => 2,
                'option_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'booking_id' => 3,
                'option_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'booking_id' => 3,
                'option_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        BookingOption::insert($datas);
    }
}
