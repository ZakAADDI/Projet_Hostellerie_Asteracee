<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Media::factory()
            ->count(50)
            ->create();
        Room::factory()
            ->count(3)
            ->create();
    }
}
