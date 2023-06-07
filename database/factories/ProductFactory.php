<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::query()->inRandomOrder()->first()->id ?? Category::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(255),
            'slug' => $this->faker->slug(6),
            'price' => $this->faker->numberBetween(0,1000),
        ];
    }
}
