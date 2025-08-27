<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $price_purchase = fake()->numberBetween(10000, 200000);
        $stock = fake()->numberBetween(50, 200);

        return [
            'name' => fake()->unique()->words(3, true),
            'sku' => 'SKU-' . fake()->unique()->bothify('??##??##'),
            'description' => fake()->paragraph(),
            'stock' => $stock,
            'stock_min' => fake()->numberBetween(5, 20),
            'price_purchase' => $price_purchase,
            'price_sell' => $price_purchase * 1.3, // Ambil untung 30%
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
