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
            'maps' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.157319852179!2d124.84343986947964!3d1.3988471406173326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328773be092a4cd9%3A0xe0618459624f7b36!2sKantor%20Desa%20Kali%20Selatan!5e0!3m2!1sid!2sid!4v1793114809492!5m2!1sid!2sid",
            'phone' => fake()->numerify('08##########'),
            'email' => fake()->safeEmail(),
            'website' => "http://website-desa-kali-selatan.test",
            'youtube' => "https://youtube.com",
            'tiktok' => "https://tiktok.com",
            'instagram' => "https://instagram.com",
            'facebook' => "https://facebook.com",
            'logo_path' => null,
            'photo_path' => null,
            'description' => fake()->paragraph(),
            'history' => fake()->paragraphs(3, true),
            'vision' => fake()->paragraph(),
            'mission' => fake()->paragraphs(3, true),
        ];
    }
}
