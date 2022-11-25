<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
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
            'price' => $this->faker->numberBetween(30,200),
            'type' => $this->faker->randomElement(['Luxe', 'Suite', 'Standard']),
            'description' => $this->faker->paragraph(),
            'media_id' => $this->faker->randomElement($media_id),
            'capacity' => $this->faker->numberBetween(1,5),
        ];
    }
}
