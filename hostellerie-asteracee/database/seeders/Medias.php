<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
class Medias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'url' => '/storage/images/suite_room.png',
                'alt' => 'suite',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'url' => '/storage/images/luxe_room.png',
                'alt' => 'luxe',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/classique_room.png',
                'alt' => 'classique',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'url' => '/storage/images/leftImg.png',
                'alt' => 'le lac',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'url' => '/storage/images/rightImg.png',
                'alt' => 'la montagne',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => 'https://www.youtube.com/embed/-B7VhYjd6xc',
                'alt' => 'vidéo de présentation de l\'hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/logoHeader.svg',
                'alt' => 'Logo de l\'hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/cooking.png',
                'alt' => 'Restauration',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/spa.png',
                'alt' => 'SPA',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/fitness.png',
                'alt' => 'Fitness',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/pool.png',
                'alt' => 'piscine',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/meals.png',
                'alt' => 'carte des menus',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/female_user.svg',
                'alt' => 'female user',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/male_user.svg',
                'alt' => 'male user',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/icon.ico',
                'alt' => 'icon Hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/twitter.svg',
                'alt' => 'icon Twitter',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/facebook.svg',
                'alt' => 'icon Facebook',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/instagram.svg',
                'alt' => 'icon Instagram',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/alcool.svg',
                'alt' => 'icon bar',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/coffee.svg',
                'alt' => 'icon Coffee',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/dog-side.svg',
                'alt' => 'icon Dog',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/pool.svg',
                'alt' => 'icon Pool',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/human-baby-changing-table.svg',
                'alt' => 'icon Baby',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/silverware-fork-knife.svg',
                'alt' => 'icon Restaurant',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/smoking-off.svg',
                'alt' => 'icon non Smoker',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => '/storage/images/wifi.svg',
                'alt' => 'icon Wifi',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]


        ];
        Media::insert($datas);
    }
}
