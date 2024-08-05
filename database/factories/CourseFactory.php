<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 200),
            'duration' => $this->faker->numberBetween(1,12),
            'instructor_id' => Instructor::inRandomOrder()->first()->id,
            'img_thumb'=>fake()->imageUrl(),
        ];
    }
}
