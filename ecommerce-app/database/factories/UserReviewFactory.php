<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserReview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserReview>
 */
class UserReviewFactory extends Factory
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
            'order_item_id' => OrderItem::factory(),
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->sentence,
        ];
    }
}
