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
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Notre chef étoilé vous propose des plats gastronomiques, préparer avec des produits frais, locaux et de saison",
                        "en"=>"Our Michelin-starred chef offers gourmet dishes, prepare with fresh, local and seasonal products
                        "
                    ]),
                'media_id' => 8,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"SPA & bien-être",
                        "en"=>"Relaxation"
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Nos activités de détente peuvent être mises à votre disposition. Vous avez le choix entre le SPA ou encore une séance de massage",
                        "en"=>"Our relaxation activities can be put at your disposal. You have the choice between the SPA or a massage session"
                    ]),
                'media_id' => 9,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"Sport & Fitness",
                        "en"=>"Body Wellness"
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Notre salle de sport et nos piscines vous permettront de gardez le rythme et prendre soin de votre forme physique et mentale",
                        "en"=>"Our gym and swimming pools will allow you to keep pace and take care of your physical and mental fitness"
                    ]),
                'media_id' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ]
        ];
        Service::insert($datas);
    }
}
