<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class Sprint1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // VoyagerDatabaseSeeder::class,
            Medias::class,
            RoomTypes::class,
            Users::class,
            Infos::class,
            Contacts::class,
            Heroes::class,
            Reviews::class,
            Rooms::class,
            Services::class,
            Deals::class,
            BookingSeeder::class,
            Sections::class,
            Prestations::class,
            Options::class,
            BookingOptionSeeder::class,
            RoomsPrestations::class
        ]);

    }
}
