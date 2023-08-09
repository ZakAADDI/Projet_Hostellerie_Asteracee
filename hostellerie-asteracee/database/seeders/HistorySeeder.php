<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HistorySeeder extends Seeder
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
                'nfc_id' => 1,
                'used_at' =>  Carbon::create('2023', '07', '01', '14', '29', '12', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 2,
                'used_at' =>  Carbon::create('2023', '07', '01', '14', '29', '12', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 3,
                'used_at' =>  Carbon::create('2023', '07', '03', '18', '26', '17', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 4,
                'used_at' =>  Carbon::create('2023', '07', '05', '11', '31', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 5,
                'used_at' =>  Carbon::create('2023', '07', '07', '11', '09', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 6,
                'used_at' =>  Carbon::create('2023', '07', '09', '16', '20', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 7,
                'used_at' =>  Carbon::create('2023', '07', '13', '14', '29', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 9,
                'used_at' =>  Carbon::create('2023', '07', '15', '14', '31', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 10,
                'used_at' =>  Carbon::create('2023', '07', '17', '20', '17', '29', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 11,
                'used_at' =>  Carbon::create('2023', '07', '19', '23', '22', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];
        History::insert($datas);
    }
}
