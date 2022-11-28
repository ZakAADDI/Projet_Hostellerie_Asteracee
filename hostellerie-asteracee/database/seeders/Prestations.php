<?php

namespace Database\Seeders;

use App\Models\Prestation;
use Illuminate\Database\Seeder;

class Prestations extends Seeder
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
                'name'=> 'bar',
                'media_id' => '19',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'coffee',
                'media_id' => '20',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'dog',
                'media_id' => '21',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'pool',
                'media_id' => '22',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'baby',
                'media_id' => '23',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'restauration',
                'media_id' => '24',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'non-smoker',
                'media_id' => '25',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'name'=> 'wifi',
                'media_id' => '26',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
        ];
        Prestation::insert($datas);
    }
}
