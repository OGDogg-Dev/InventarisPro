<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'PT ' . fake()->company(),
            'contact_person' => fake()->name(),
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }
}
