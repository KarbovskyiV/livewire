<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = collect(Category::query()->pluck('id'));

        return [
            'category_id' => $categories->random(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(50),
        ];
    }
}
