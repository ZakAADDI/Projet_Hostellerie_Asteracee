<?php

namespace Database\Seeders;
use App\Models\Option;
use Illuminate\Database\Seeder;

class Options extends Seeder
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
                'name' => json_encode(
                    [
                        "fr" => "Formule Demie-Pension",
                        "en" => "Half-board Formula"
                    ]
                ),
                'description' => json_encode(
                    [
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "20",
                'type' => 'daily',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => json_encode(["fr" => "Formule Pension Complète", "en" => "Full board Formula"]),
                'description' => json_encode(["fr" => "Description FR", "en" => "Description EN"]),
                'price' => "35",
                'type' => 'daily',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => json_encode(
                    [
                        "fr" => "Formule Petit-déjeuner",
                        "en" => "Breakfast Formula"
                    ]
                ),
                'description' => json_encode(
                    [
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "9",
                'type' => 'daily',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => json_encode(
                    [
                        "fr" => "Formule Blanchisserie",
                        "en" => "Laundry Formula"
                    ]
                ),
                'description' => json_encode(
                    [
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "30",
                'type' => 'daily',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => json_encode(
                    [
                        "fr" => "Accès Télévision",
                        "en" => "Television access"
                    ]
                ),
                'description' => json_encode(
                    [
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "10",
                'type' => 'weekly',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => json_encode(
                    [
                        "fr" => "Accès Wifi",
                        "en" => "Wifi access"
                    ]
                ),
                'description' => json_encode(
                    [
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "25",
                'type' => 'stay',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];
        Option::insert($datas);
    }
}
