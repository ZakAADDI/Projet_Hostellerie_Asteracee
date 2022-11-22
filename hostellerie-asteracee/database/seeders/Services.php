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
                'title'=> json_encode(
                    [
                        "fr"=>"Restaurant Gastronomique",
                        "en"=>"Gastronomic Restaurant"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Content en Français",
                        "en"=>"Content en Anglais"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'media_id' => '8',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"SPA & bien-être",
                        "en"=>"Relaxation"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Content en Français",
                        "en"=>"Content en Anglais"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'media_id' => '9',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"Sport & Fitness",
                        "en"=>"Body Wellness"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Content en Français",
                        "en"=>"Content en Anglais"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'media_id' => '10',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ]
        ];
        Service::insert($datas);
    }
}
