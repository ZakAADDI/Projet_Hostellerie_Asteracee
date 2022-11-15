<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
class Medias extends Seeder
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
                'url' => 'test url',
                'alt' => 'test alt',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'url' => 'test url2',
                'alt' => 'test alt2',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'url' => 'test url3',
                'alt' => 'test alt3',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Media::insert($datas);
    }
}
