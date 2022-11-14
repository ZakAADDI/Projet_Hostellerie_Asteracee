<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;
class Heroes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hero::insert([
            'logo_media_id' => '1',
            'text_fr' => 'test textfr',
            'text_en' => 'test texten',
            'left_media_id' => '8',
            'center_media_id' => '10',
            'right_media_id' => '12',

        ]);
    }
}
