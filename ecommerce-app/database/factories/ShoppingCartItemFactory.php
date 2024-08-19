<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ShoppingCartItem>
 */
class ShoppingCartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shopping_cart_id' => ShoppingCart::factory(),
            'product_id' => Product::factory(),
            'qty' => fake()->numberBetween(1, 10),
        ];
    }
}
