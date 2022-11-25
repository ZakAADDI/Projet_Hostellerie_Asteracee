<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\Info;
use App\Models\Media;
use App\Models\Review;
use App\Models\Room;
use App\Models\Service;
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
            ->count(20)
            ->create();
        Room::factory()
            ->count(3)
            ->create();
        Hero::factory()
            ->count(1)
            ->create();
        Info::factory()
            ->count(3)
            ->create();
        Review::factory()
            ->count(7)
            ->create();
        Service::factory()
            ->count(2)
            ->create();
    }
}
