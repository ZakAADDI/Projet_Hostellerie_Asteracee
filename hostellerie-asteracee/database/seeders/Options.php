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
                'frequency' => json_encode(
                    [ 
                        "fr" => "Journalier",
                        "en" => "Daily"
                    ]
                ),
            ],
            [
                'name' => json_encode(
                    [ 
                        "fr" => "Formule Pension Complète",
                        "en" => "Full board Formula"
                    ]
                ),
                'description' => json_encode(
                    [ 
                        "fr" => "Description FR",
                        "en" => "Description EN"
                    ]
                ),
                'price' => "35",
                'frequency' => json_encode(
                    [ 
                        "fr" => "Journalier",
                        "en" => "Daily"
                    ]
                ), 
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
                'frequency' => json_encode(
                    [ 
                        "fr" => "Journalier",
                        "en" => "Daily"
                    ]
                ),
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
                'frequency' => json_encode(
                    [ 
                        "fr" => "Journalier",
                        "en" => "Daily"
                    ]
                ), 
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
                'frequency' => json_encode(
                    [ 
                        "fr" => "Hebdomadaire",
                        "en" => "Weekly"
                    ]
                ), 
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
                'frequency' => json_encode(
                    [ 
                        "fr" => "Une seule fois durant votre séjour",
                        "en" => "Once during the stay"
                    ]
                ), 
            ],

        ];
        Option::insert($datas);
    }
}
