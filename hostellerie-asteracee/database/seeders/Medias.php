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
        Media::insert([
            'url' => 'test url',
            'alt' => 'test alt'

        ],
        [
            'url' => 'test url2',
            'alt' => 'test alt2'
        ],
        [
            'url' => 'test url3',
            'alt' => 'test alt3'
        ]
    );
    }
}
