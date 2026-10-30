<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nik',
    'family_card_id',
    'name',
    'place_of_birth',
    'date_of_birth',
    'gender',
    'blood_type',
    'religion',
    'marital_status',
    'occupation',
    'status',
    'ktp_path',
])]
class Resident extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    // Penduduk dimiliki oleh satu kartu keluarga
    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class, 'family_card_id');
    }
}
