<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeOptions = ['diepvries', 'kort houdbaar', 'lang houdbaar'];
        return [
            'name' => $this->faker->sentence(),
            'type' => $typeOptions[rand(0, 2)],
            'is_active' => $this->faker->boolean(),
        ];
    }
}
