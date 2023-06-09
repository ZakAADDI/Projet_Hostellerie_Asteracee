<?php

namespace Database\Seeders;

use App\Models\Nfc;
use Illuminate\Database\Seeder;

class NfcSeeder extends Seeder
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
                'hash' => '12b637dd6a40e81118a123a7dde7d54c584569c273c31ed71ef33fcaa373112a',
                'booking_id' => 1,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'hash' => '4321a844ee760ee6ca5575a7c16c34d2a40ec1b3d76003681b8a3848dc1f4cc5',
                'booking_id' => 2,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        
        ];
        Nfc::insert($datas);
    }
}
