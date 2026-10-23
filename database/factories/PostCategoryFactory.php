<?php

namespace Database\Factories;

use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<PostCategory>
 */
class PostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Berita Desa',
            'Pengumuman',
            'Pemerintahan dan Pelayanan Publik',
            'Kegiatan dan Pembangunan Desa',
            'Pemberdayaan dan Sosial Masyarakat',
            'Kesehatan dan Pendidikan',
            'Ekonomi dan Potensi Desa',
            'Budaya dan Pariwisata',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->optional()->sentence(),
        ];
    }
}
