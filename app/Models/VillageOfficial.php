<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'photo_path',
    'position',
    'sort_order',
])]
class VillageOfficial extends Model
{
    /** @use HasFactory<\Database\Factories\VillageOfficialFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}
