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
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'capacity' => '3',
                'price' => 220,
                'media_id' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'name' => 'Luxe',
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'capacity' => '3',
                'price' => 120,
                'media_id' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],
            [
                'id' => 3,
                'name' => 'Standard',
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'capacity' => '3',
                'price' => 70,
                'media_id' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        RoomType::insert($datas);
    }
}
