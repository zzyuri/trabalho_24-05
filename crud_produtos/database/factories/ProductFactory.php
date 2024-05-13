<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'name' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(),
            'user_id' => User::pluck('id')->random(),
            // 'id_category' => Category::pluck('id')->random(),
        ];
    }
}
