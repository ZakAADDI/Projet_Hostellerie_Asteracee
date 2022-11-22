<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Room;
class Rooms extends Seeder
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
                'price' => 220,
                'type' => 'Suite',
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'media_id' => '1',
                'capacity' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'price' => 120,
                'type' => 'Luxe',
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'media_id' => '2',
                'capacity' => '3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'price' => 70,
                'type' => 'Standard',
                'description'=> json_encode(["fr"=>"description en Français","en"=>"Description en Anglais"],JSON_UNESCAPED_UNICODE),
                'media_id' => '3',
                'capacity' => '2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Room::insert($datas);
    }
}
