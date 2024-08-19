<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
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
            'address_line1' => fake()->streetAddress,
            'address_line2' => fake()->secondaryAddress,
            'city' => fake()->city,
            'state/province' => fake()->state,
            'postal_code' => fake()->postcode,
            'country_id' => Country::factory(),
            'is_default' => false,
        ];
    }
}
