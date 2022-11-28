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
                'id' => '1',
                'url' => '/storage/images/suite_room.png',
                'alt' => 'suite',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'id' => '2',
                'url' => '/storage/images/luxe_room.png',
                'alt' => 'luxe',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'url' => '/storage/images/classique_room.png',
                'alt' => 'classique',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'id' => '4',
                'url' => '/storage/images/leftImg.png',
                'alt' => 'le lac',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'id' => '5',
                'url' => '/storage/images/rightImg.png',
                'alt' => 'la montagne',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '6',
                'url' => 'https://www.youtube.com/embed/-B7VhYjd6xc',
                'alt' => 'vidéo de présentation de l\'hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '7',
                'url' => '/storage/images/logoHeader.svg',
                'alt' => 'Logo de l\'hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '8',
                'url' => '/storage/images/cooking.png',
                'alt' => 'Restauration',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '9',
                'url' => '/storage/images/spa.png',
                'alt' => 'SPA',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '10',
                'url' => '/storage/images/fitness.png',
                'alt' => 'Fitness',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '11',
                'url' => '/storage/images/pool.png',
                'alt' => 'piscine',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '12',
                'url' => '/storage/images/meals.png',
                'alt' => 'carte des menus',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '13',
                'url' => '/storage/images/female_user.svg',
                'alt' => 'female user',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '14',
                'url' => '/storage/images/male_user.svg',
                'alt' => 'male user',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '15',
                'url' => '/storage/images/icon.ico',
                'alt' => 'icon Hostellerie',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '16',
                'url' => '/storage/images/twitter.svg',
                'alt' => 'icon Twitter',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '17',
                'url' => '/storage/images/facebook.svg',
                'alt' => 'icon Facebook',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '18',
                'url' => '/storage/images/instagram.svg',
                'alt' => 'icon Instagram',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '19',
                'url' => '/storage/images/alcool.svg',
                'alt' => 'icon bar',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '20',
                'url' => '/storage/images/coffee.svg',
                'alt' => 'icon Coffee',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '21',
                'url' => '/storage/images/dog-side.svg',
                'alt' => 'icon Dog',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '22',
                'url' => '/storage/images/pool.svg',
                'alt' => 'icon Pool',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '23',
                'url' => '/storage/images/human-baby-changing-table.svg',
                'alt' => 'icon Baby',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '24',
                'url' => '/storage/images/silverware-fork-knife.svg',
                'alt' => 'icon Restaurant',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '25',
                'url' => '/storage/images/smoking-off.svg',
                'alt' => 'icon non Smoker',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '26',
                'url' => '/storage/images/wifi.svg',
                'alt' => 'icon Wifi',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]


        ];
        Media::insert($datas);
    }
}
