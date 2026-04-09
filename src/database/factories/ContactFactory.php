<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => (string) $this->faker->numberBetween(1000000000, 99999999999),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->secondaryAddress(),
            'detail' => $this->faker->text(100),
        ];
    }
}