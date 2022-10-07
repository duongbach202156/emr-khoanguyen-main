<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => '0962' . rand(100000, 999999),
            'date' => '2022-09-' . rand(1, 30),
            'time' => rand(8, 17) . ':00:00',
        ];
    }
}
