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
            Medias::class,
            Infos::class,
            Contacts::class,
            Heroes::class,
            Reviews::class,
            Rooms::class,
            Services::class,
            Users::class,
            Deals::class,
            Sections::class,
            Prestations::class
        ]);

    }
}
