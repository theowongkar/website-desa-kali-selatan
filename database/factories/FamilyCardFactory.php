<?php

namespace Database\Factories;

use App\Models\FamilyCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FamilyCard>
 */
class FamilyCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kk' => fake()->unique()->numerify('################'),
            'address' => fake()->streetAddress(),
            'rt' => fake()->numerify('###'),
            'rw' => fake()->numerify('###'),
            'village' => 'Kali Selatan',
            'district' => 'Pineleng',
            'regency' => 'Kabupaten Minahasa',
            'province' => 'Sulawesi Utara',
            'kk_path' => null,
        ];
    }
}
