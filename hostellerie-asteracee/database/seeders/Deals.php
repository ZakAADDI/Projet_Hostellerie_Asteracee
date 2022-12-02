<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Nouveau pour toute réservation d'une chambre luxe minimum, nous vous offrons un accès au spa",
                        "en"=>"New for any reservation of a minimum luxury room, we offer you access to the spa"
                    ]),
                'is_active' => true,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','26')->format('Y-m-d'),
                'room_type_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"La chambre Luxe au prix de la standard",
                        "en"=>"Luxery Room for Standard price"
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Du 2 novembre au 12 novembre, réserver une chambre de luxe pour le prix d'une chambre standard",
                        "en"=>"From November 2 to November 12, book a deluxe room for the price of a standard room"
                    ]),
                'is_active' => true,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','26')->format('Y-m-d'),
                'room_type_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title'=> json_encode(
                    [
                        "fr"=>"Taxe de séjour offerte",
                        "en"=>"Free tourist tax"
                    ]),
                'content'=> json_encode(
                    [
                        "fr"=>"Du 5 au 31 décembre, bénéficier de la taxe de séjour offerte pour toute réservation",
                        "en"=>"From December 5 to 31, benefit from the tourist tax offered for any reservation"
                    ]),
                'is_active' => false,
                'starting_date' => Carbon::createFromDate('2022','11','25')->format('Y-m-d'),
                'ending_date' => Carbon::createFromDate('2022','11','26')->format('Y-m-d'),
                'room_type_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Deal::insert($datas);
    }
}
