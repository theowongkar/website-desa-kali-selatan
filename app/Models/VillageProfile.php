<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'code',
    'village',
    'district',
    'regency',
    'province',
    'address',
    'postal_code',
    'phone',
    'email',
    'website',
    'youtube',
    'tiktok',
    'instagram',
    'facebook',
    'logo_path',
    'description',
    'history',
    'vision',
    'mission',
])]
class VillageProfile extends Model
{
    /** @use HasFactory<\Database\Factories\VillageProfileFactory> */
    use HasFactory;
}
