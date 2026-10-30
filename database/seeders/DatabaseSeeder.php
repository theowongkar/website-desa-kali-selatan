<?php

namespace Database\Seeders;

use App\Models\FamilyCard;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Resident;
use App\Models\User;
use App\Models\VillageBanner;
use App\Models\VillageOfficial;
use App\Models\VillageProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Super Admin
        User::factory()->create([
            'name' => 'Theo Wongkar',
            'email' => 'theowongkar@kaliselatan.com',
            'role' => 'Super Admin',
        ]);

        // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kaliselatan.com',
            'role' => 'Admin',
        ]);

        // Pengguna
        User::factory(8)->create([
            'role' => 'Operator',
        ]);

        // Membuat 10 kartu keluarga
        FamilyCard::factory(10)->create()->each(function ($familyCard) {

            // Membuat 1 penduduk sebagai kepala keluarga
            $headOfFamily = Resident::factory()->create([
                'family_card_id' => $familyCard->id,
            ]);

            // Menetapkan kepala keluarga
            $familyCard->update([
                'head_of_family_id' => $headOfFamily->id,
            ]);

            // Membuat 2-4 penduduk tambahan dalam KK
            Resident::factory(fake()->numberBetween(2, 4))->create([
                'family_card_id' => $familyCard->id,
            ]);
        });

        // Profil Desa
        VillageProfile::factory()->create();

        // Struktur Organisasi
        $villageOfficialPositions = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Keuangan',
            'Kaur Tata Usaha dan Umum',
            'Kaur Perencanaan',
            'Kasi Pemerintahan',
            'Kasi Kesejahteraan',
            'Kasi Pelayanan',
            'Kepala Dusun',
        ];

        foreach ($villageOfficialPositions as $sortOrder => $position) {
            VillageOfficial::factory()->create([
                'position' => $position,
                'sort_order' => $sortOrder,
            ]);
        }

        // Banner Desa
        VillageBanner::factory(3)->create();

        // Kategori Postingan
        $postCategories = [
            'Berita Desa',
            'Pengumuman',
            'Pemerintahan dan Pelayanan Publik',
            'Kegiatan dan Pembangunan Desa',
            'Pemberdayaan dan Sosial Masyarakat',
            'Kesehatan dan Pendidikan',
            'Ekonomi dan Potensi Desa',
            'Budaya dan Pariwisata',
        ];

        foreach ($postCategories as $postCategory) {
            PostCategory::updateOrCreate(
                ['slug' => Str::slug($postCategory)],
                [
                    'name' => $postCategory,
                    'description' => null,
                ]
            );
        }

        // Postingan
        Post::factory(20)->create();
    }
}
