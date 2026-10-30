<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
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
        $title = fake()->unique()->sentence(6);

        return [
            'author_id' => User::inRandomOrder()->value('id'),
            'post_category_id' => PostCategory::inRandomOrder()->value('id'),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'thumbnail_path' => null,
            'status' => fake()->randomElement([
                'Draf',
                'Terbit',
                'Arsip',
            ]),
            'views_count' => fake()->numberBetween(0, 10000),
        ];
    }
}
