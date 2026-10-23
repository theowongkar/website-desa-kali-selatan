<?php

namespace Database\Seeders;

use App\Models\FamilyCard;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Resident;
use App\Models\User;
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

        // Kartu Keluarga
        FamilyCard::factory(10)->create();

        // Penduduk
        Resident::factory(30)->create();

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
