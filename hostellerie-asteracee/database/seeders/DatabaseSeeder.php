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
            ->count(50)
            ->create();
        Room::factory()
            ->count(21)
            ->create();
        Hero::factory()
            ->count(1)
            ->create();
        Info::factory()
            ->count(12)
            ->create();
        Review::factory()
            ->count(33)
            ->create();
        Service::factory()
            ->count(7)
            ->create();
    }
}
