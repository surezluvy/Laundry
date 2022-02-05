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
            'laundry_name' => $this->faker->name(mt_rand(1, 2)),
            'laundry_address' => $this->faker->streetAddress(),
            'laundry_price' => $this->faker->randomNumber(4),
            'laundry_open' => '10:00am - 11:00pm',
            'laundry_lat' => $this->faker->randomNumber(3),
            'laundry_long' => $this->faker->randomNumber(4),
        ];
    }
}
