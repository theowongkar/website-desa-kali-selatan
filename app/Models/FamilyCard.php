<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'no_kk',
    'head_of_family_id',
    'address',
    'rt',
    'rw',
    'village',
    'district',
    'regency',
    'province',
    'status',
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

    // Satu kartu keluarga memiliki satu kepala keluarga
    public function headOfFamily()
    {
        return $this->belongsTo(Resident::class, 'head_of_family_id');
    }
}
