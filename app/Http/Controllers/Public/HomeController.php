<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FamilyCard;
use App\Models\Post;
use App\Models\Resident;
use App\Models\VillageBanner;
use App\Models\VillageOfficial;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Judul Halaman
        $title = "Beranda";

        // Banner Desa
        $villageBanners = VillageBanner::orderBy('created_at', 'ASC')->get();

        // Kepala Desa
        $villageHead = VillageOfficial::where('position', 'Kepala Desa')->first();

        // Profil Desa
        $villageProfile = VillageProfile::first();

        // Struktur Organisasi
        $villageOfficials = VillageOfficial::orderBy('sort_order', 'ASC')->limit(4)->get();

        // Total Seluruh Penduduk
        $totalResidents = Resident::count();

        // Total Penduduk Laki-Laki
        $totalMaleResidents = Resident::where('gender', 'Laki-laki')->count();

        // Total Penduduk Perempuan
        $totalFemaleResidents = Resident::where('gender', 'Perempuan')->count();

        // Total Kepala Keluarga
        $totalHeadOfFamily = FamilyCard::whereNotNull('head_of_family_id')->count();

        // Postingan
        $posts = Post::with('category')->where('status', 'Terbit')->latest()->take(4)->get();

        return view('pages.public.home', compact('title', 'villageBanners', 'villageHead', 'villageProfile', 'villageOfficials', 'totalResidents', 'totalMaleResidents', 'totalFemaleResidents', 'totalHeadOfFamily', 'posts'));
    }
}
