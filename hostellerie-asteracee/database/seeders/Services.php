<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class Services extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            [
                'title_fr' => 'Restaurant Gastronomique',
                'title_en' => 'Gastronomic Restaurant',
                'content_fr' => 'Content Fr',
                'content_en' => 'Content En',
                'media_id' => '8',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title_fr' => 'SPA & bien-être',
                'title_en' => 'Relaxation',
                'content_fr' => 'Content Fr',
                'content_en' => 'Content En',
                'media_id' => '9',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title_fr' => 'Sport & Fitness',
                'title_en' => 'Body Wellness',
                'content_fr' => 'Content Fr',
                'content_en' => 'Content En',
                'media_id' => '10',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ]
        ];
        Service::insert($datas);
    }
}
