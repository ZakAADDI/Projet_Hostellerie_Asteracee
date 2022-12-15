<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Media;

class RoomTypes extends Seeder
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
                'id' => 1,
                'name' => 'Suite',
                'description'=> json_encode(["fr"=>"Suite de 38 à 43m², équipée d'un lit King Size raffiné, associée à un décor élégant et luxueux. Un balcon privé est également à votre disposition.","en"=>"
                Suite of 38 to 43m², equipped with a refined King Size bed, combined with an elegant and luxurious decor. A private balcony is also available."]),
                'capacity' => 3,
                'price' => 220,
                'media_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'name' => 'Luxe',
                'description'=> json_encode(["fr"=>"Chambre classique et raffinée, elle offre une sensation de confort intemporel avec une surface entre 25 et 35m².","en"=>"
                Classic and refined room, it offers a feeling of timeless comfort with a surface between 25 and 35m²."]),
                'capacity' => 3,
                'price' => 120,
                'media_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'id' => 3,
                'name' => 'Standard',
                'description'=> json_encode(["fr"=>"Chambre classique et élégante, aux détails contemporains et au décor raffiné. Très accueillante avec une surface entre 20 et 25m², elle vous ravira avec une salle de bain en marbre.","en"=>"Classic and elegant room, with contemporary details and refined decor. Very welcoming with a surface between 20 and 25m², it will delight you with a marble bathroom."]),
                'capacity' => 3,
                'price' => 70,
                'media_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        RoomType::insert($datas);
    }
}
