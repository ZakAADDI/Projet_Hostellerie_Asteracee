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
                'used_at' =>  Carbon::create('2023', '07', '01', '14', '33', '02', 'Europe/Paris')->format('Y-m-d H:i:s'),
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
                'used_at' =>  Carbon::create('2023', '07', '11', '19', '29', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
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
            ],
            [
                'nfc_id' => 12,
                'used_at' =>  Carbon::create('2023', '07', '21', '15', '31', '30', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 13,
                'used_at' =>  Carbon::create('2023', '07', '25', '14', '25', '22', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 14,
                'used_at' =>  Carbon::create('2023', '07', '01', '13', '37', '22', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 15,
                'used_at' =>  Carbon::create('2023', '07', '03', '21', '52', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 16,
                'used_at' =>  Carbon::create('2023', '07', '05', '17', '28', '17', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 16,
                'used_at' =>  Carbon::create('2023', '07', '07', '10', '22', '01', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 17,
                'used_at' =>  Carbon::create('2023', '07', '07', '10', '18', '33', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 18,
                'used_at' =>  Carbon::create('2023', '07', '09', '23', '33', '01', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 19,
                'used_at' =>  Carbon::create('2023', '07', '11', '13', '29', '52', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 20,
                'used_at' =>  Carbon::create('2023', '07', '13', '15', '11', '18', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 21,
                'used_at' =>  Carbon::create('2023', '07', '15', '11', '32', '03', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 22,
                'used_at' =>  Carbon::create('2023', '07', '17', '11', '17', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 23,
                'used_at' =>  Carbon::create('2023', '07', '19', '12', '19', '14', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 24,
                'used_at' =>  Carbon::create('2023', '07', '21', '14', '39', '47', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 25,
                'used_at' =>  Carbon::create('2023', '07', '25', '14', '41', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 26,
                'used_at' =>  Carbon::create('2023', '08', '01', '15', '09', '31', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 27,
                'used_at' =>  Carbon::create('2023', '08', '03', '22', '29', '42', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 28,
                'used_at' =>  Carbon::create('2023', '08', '05', '10', '29', '51', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 29,
                'used_at' =>  Carbon::create('2023', '08', '07', '12', '17', '33', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nfc_id' => 30,
                'used_at' =>  Carbon::create('2023', '08', '09', '13', '12', '49', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];
        History::insert($datas);
    }
}
