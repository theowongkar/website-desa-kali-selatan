<?php

namespace Database\Factories;

use App\Models\FamilyCard;
use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->unique()->numerify('################'),
            'family_card_id' => FamilyCard::inRandomOrder()->value('id'),
            'name' => fake()->name(),
            'place_of_birth' => fake()->city(),
            'date_of_birth' => fake()->dateTimeBetween(
                '-80 years',
                '-17 years'
            )->format('Y-m-d'),
            'gender' => fake()->randomElement([
                'Laki-laki',
                'Perempuan',
            ]),
            'blood_type' => fake()->optional()->randomElement([
                'A',
                'B',
                'AB',
                'O',
            ]),
            'religion' => fake()->randomElement([
                'Islam',
                'Kristen',
                'Katolik',
                'Hindu',
                'Buddha',
                'Konghucu',
            ]),
            'marital_status' => fake()->randomElement([
                'Belum Kawin',
                'Kawin',
                'Cerai Hidup',
                'Cerai Mati',
            ]),
            'occupation' => fake()->randomElement([
                'Petani',
                'Wiraswasta',
                'PNS',
                'Karyawan Swasta',
                'Guru',
                'Pelajar',
                'Ibu Rumah Tangga',
            ]),
            'ktp_path' => null,
        ];
    }
}
