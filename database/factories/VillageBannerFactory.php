<?php

namespace Database\Factories;

use App\Models\VillageBanner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VillageBanner>
 */
class VillageBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(1),
            'image_path' => null,
        ];
    }
}
