<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;
class Deals extends Seeder
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
                'title'=> json_encode(
                    [
                        "fr"=>"Service SPA & Relaxation inclus",
                        "en"=>"Relaxing Service included"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Nouveau pour toute réservation d'une chambre luxe minimum, nous vous offrons un accès au spa",
                        "en"=>"New for any reservation of a minimum luxury room, we offer you access to the spa"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'section'=> json_encode(
                    [
                        "fr"=>"Offres Exceptionnelles",
                        "en"=>"Special Offers"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'is_active' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"La chambre Luxe au prix de la standard",
                        "en"=>"Luxery Room for Standard price"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Du 2 novembre au 12 novembre, réserver une chambre de luxe pour le prix d'une chambre standard",
                        "en"=>"From November 2 to November 12, book a deluxe room for the price of a standard room"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'section'=> json_encode(
                    [
                        "fr"=>"Offres Exceptionnelles",
                        "en"=>"Special Offers"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'is_active' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"Taxe de séjour offerte",
                        "en"=>"Free tourist tax"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'content'=> json_encode(
                    [
                        "fr"=>"Du 5 au 31 décembre, bénéficier de la taxe de séjour offerte pour toute réservation",
                        "en"=>"From December 5 to 31, benefit from the tourist tax offered for any reservation"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'section'=> json_encode(
                    [
                        "fr"=>"Offres Exceptionnelles",
                        "en"=>"Special Offers"
                    ],
                    JSON_UNESCAPED_UNICODE),
                'is_active' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Deal::insert($datas);
    }
}
