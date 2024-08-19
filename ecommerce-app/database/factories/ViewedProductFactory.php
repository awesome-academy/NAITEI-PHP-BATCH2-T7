<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\ViewedProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ViewedProduct>
 */
class ViewedProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'viewed_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
