<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;
class Infos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::insert([
            'title_fr' => 'titleFr',
            'title_en' => 'titleEn',
            'content_fr' => 'ContentFr',
            'content_en' => 'ContentEn',
            'media_id' => '2'
        ]);
    }
}
