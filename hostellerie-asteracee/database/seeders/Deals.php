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
                'title_fr' => 'Service SPA & Relaxation inclus',
                'title_en' => 'Relaxing Service included',
                'content_fr' => 'Nouveau pour toute réservation d\'une chambre luxe minimum, nous vous offrons un accès au spa',
                'content_en' => 'New for any reservation of a minimum luxury room, we offer you access to the spa',
                'is_active' => true
            ],
            [
                'title_fr' => 'La chambre Luxe au prix de la standard',
                'title_en' => 'Luxery Room for Standard price',
                'content_fr' => 'Du 2 novembre au 12 novembre, réserver une chambre de luxe pour le prix d\'une chambre standard',
                'content_en' => 'From November 2 to November 12, book a deluxe room for the price of a standard room',
                'is_active' => true
            ]
        ];
        Deal::insert($datas);
    }
}
