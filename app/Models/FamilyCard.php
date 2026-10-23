<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'no_kk',
    'address',
    'rt',
    'rw',
    'village',
    'district',
    'regency',
    'province',
    'kk_path',
])]
class FamilyCard extends Model
{
    /** @use HasFactory<\Database\Factories\FamilyCardFactory> */
    use HasFactory;

    // Satu kartu keluarga memiliki banyak penduduk
    public function residents()
    {
        return $this->hasMany(Resident::class, 'family_card_id');
    }
}
