<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
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
            'logo_media_id' => $this->faker->randomElement($media_id),
            'left_media_id' => $this->faker->randomElement($media_id),
            'right_media_id' => $this->faker->randomElement($media_id),
            'center_media_id' => $this->faker->randomElement($media_id),
            'text_fr' => $this->faker->paragraph(),
            'text_en' => $this->faker->paragraph(),
        ];
    }
}
