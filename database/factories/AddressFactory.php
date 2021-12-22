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
            'street' => $this->faker->unique()->name(),
            'building_num' => $this->faker->name(),
            'floor' =>  $this->faker->name(),
            'apartment_num' =>  $this->faker->name(),
            'user_id' =>  $this->faker->numberBetween(1, 3),
            'area_id' =>  $this->faker->numberBetween(1, 3),

        ];
    }
}
