<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DimensionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Managing Self', 'Outcome Focused', 'Problem Solving', 'Working with Others', 'Self Development'])
        ];
    }
}
