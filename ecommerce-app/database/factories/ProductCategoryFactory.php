<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'parent_category_id' => null,
            'description' => fake()->sentence,
        ];
    }

    /**
     * Create a subcategory.
     *
     * @param  ProductCategory  $parentCategory
     * @return Factory
     */
    public function asSubcategory(ProductCategory $parentCategory): Factory
    {
        return $this->state(function (array $attributes) use ($parentCategory) {
            return [
                'parent_category_id' => $parentCategory->id,
            ];
        });
    }
}
