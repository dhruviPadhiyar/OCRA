<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, User::count()),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraphs(4, true),
            'category' => $this->faker->randomElement(['Food', 'Travel', 'Health & Fitness', 'Lifestyle', 'Fashion & Beauty', 'Personal', 'Craft', 'Music', 'News', 'Movie', 'Religion', 'Political']),
            // 'thumbnail' => $this->faker->imageUrl(), // or any other appropriate method for generating thumbnails
            // 'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            // 'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
