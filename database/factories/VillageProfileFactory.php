<?php

namespace Database\Factories;

use App\Models\VillageProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VillageProfile>
 */
class VillageProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->optional()->numerify('##########'),
            'village' => 'Kali Selatan',
            'district' => 'Pineleng',
            'regency' => 'Kabupaten Minahasa',
            'province' => 'Sulawesi Utara',
            'address' => "Jl. Kali Selatan",
            'postal_code' => "95662",
            'phone' => fake()->numerify('08##########'),
            'email' => fake()->safeEmail(),
            'website' => fake()->url(),
            'youtube' => null,
            'tiktok' => null,
            'instagram' => null,
            'facebook' => null,
            'logo_path' => null,
            'description' => fake()->paragraph(),
            'history' => fake()->paragraphs(3, true),
            'vision' => fake()->paragraph(),
            'mission' => fake()->paragraphs(3, true),
        ];
    }
}
