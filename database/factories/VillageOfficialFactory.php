<?php

namespace Database\Factories;

use App\Models\VillageOfficial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VillageOfficial>
 */
class VillageOfficialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'photo_path' => null,
            'position' => fake()->randomElement([
                'Kepala Desa',
                'Sekretaris Desa',
                'Kaur Keuangan',
                'Kaur Tata Usaha dan Umum',
                'Kaur Perencanaan',
                'Kasi Pemerintahan',
                'Kasi Kesejahteraan',
                'Kasi Pelayanan',
                'Kepala Dusun',
            ]),
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
