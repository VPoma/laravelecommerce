<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            'sku' => $this->faker->unique()->numberBetween(100000, 999999),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(200),
            /*'image_path' => 'products/' . $this->faker->imageUrl('public/storage/products', 640, 480, null, true),*/
            'image_path' => 'products/' . $this->faker->uuid() . '.jpg',
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'subcategory_id' => $this->faker->numberBetween(1, 632),
        ];
    }
}
