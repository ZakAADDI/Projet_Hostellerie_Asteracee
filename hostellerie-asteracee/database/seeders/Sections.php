<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
class Sections extends Seeder
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
                'name'=> json_encode(["fr"=>"Nos Chambres","en"=>"Our Rooms"]),
                'description'=> json_encode(
                    [
                        "fr"=>"Nos Chambres",
                        "en"=>"Our Rooms"
                    ]),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> json_encode(["fr"=>"Nos Services","en"=>"Our Services"]),
                'description'=> json_encode(
                    [
                        "fr"=>"Nos services",
                        "en"=>"Our Services"
                    ]),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name'=> json_encode(
                    [
                        "fr"=>"Les Nouveautés",
                        "en"=>"News"
                    ]),
                'description'=> json_encode(["fr"=>"Les Nouveautés","en"=>"News"]),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name'=> json_encode(
                    [
                        "fr"=>"Offres Exceptionnelles",
                        "en"=>"Special Offers"
                    ]),
                'description'=> json_encode(["fr"=>"Offres Exceptionnelles","en"=>"Special Offers"]),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Section::insert($datas);
    }
}
