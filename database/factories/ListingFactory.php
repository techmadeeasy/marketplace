<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'title'=> fake()->streetName(),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'category_id' => rand(1, 4),
            'image_path' => fake()->imageUrl(),
            'date_published' => fake()->date(),
            'price' => fake()->randomFloat(2, 100, 10000000),
            'currency' => fake()->currencyCode(),
        ];
    }
}
