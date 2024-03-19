<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Food::class;
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'desc' => $this->faker->paragraph,
            'count' => $this->faker ->randomNumber,
            'price' => $this->faker->randomFloat(0, 0, 100),
            'created_at' => now(),
        ];
    }
}
