<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition(): array
    {
        return [
            'category_name' => $this->faker->words(2, true), // e.g., "Breakfast Items"
            'description'   => $this->faker->sentence(6),
            'status'        => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
