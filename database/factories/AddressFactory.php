<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'user_id' => $this->faker->numberBetween(1, 3),
            'area_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
