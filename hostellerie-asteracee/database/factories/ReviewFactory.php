<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'title' => $this->faker->words(3,true),
            'score' => $this->faker->numberBetween(0,5),
            'user_firstname' => $this->faker->firstName,
            'user_lastname' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['Female', 'Male'])
        ];
    }
}
