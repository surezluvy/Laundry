<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaundryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'laundry_name' => $this->faker->sentence(mt_rand(2, 3)),
            'laundry_address' => $this->faker->streetName(),
            'laundry_price' => $this->faker->randomNumber(4),
            'laundry_lat' => $this->faker->randomNumber(3),
            'laundry_long' => $this->faker->randomNumber(4),
        ];
    }
}
