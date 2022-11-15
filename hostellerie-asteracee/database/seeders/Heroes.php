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
            'logo_media_id' => '7',
            'text_fr' => 'Un espace reposant entre Lac et Montagne',
            'text_en' => 'A quite place between lac and mountain',
            'left_media_id' => '4',
            'center_media_id' => '6',
            'right_media_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
    }
}
