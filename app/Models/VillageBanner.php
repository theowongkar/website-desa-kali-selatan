<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'image_path',
])]
class VillageBanner extends Model
{
    /** @use HasFactory<\Database\Factories\VillageBannerFactory> */
    use HasFactory;
}
