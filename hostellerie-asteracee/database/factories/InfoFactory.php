<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $media_id = Media::all()->pluck('id')->toArray();
        return [
            'media_id' => $this->faker->randomElement($media_id),
            'content_fr' => $this->faker->paragraph(),
            'content_en' => $this->faker->paragraph(),
            'title_fr' => $this->faker->words(3,true),
            'title_en' => $this->faker->words(3,true),
        ];
    }
}
