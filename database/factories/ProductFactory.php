<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),

            'description' => $this->faker->sentence(12),

            'price' => $this->faker->numberBetween(500, 50000),
            'cost_price' => $this->faker->numberBetween(300, 40000),

            'discount_amount' => $this->faker->randomFloat(2, 0, 5000),
            'discount_type' => $this->faker->randomElement(['fixed', 'percent', null]),

            'is_taxable' => true,

            'stock' => $this->faker->numberBetween(0, 200),

            'is_active' => true,
        ];
    }
}