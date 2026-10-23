<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\Attributes\Sluggable;

#[Fillable([
    'name',
    'slug',
    'description',
])]
#[Sluggable(from: 'name', to: 'slug')]
class PostCategory extends Model
{
    /** @use HasFactory<\Database\Factories\PostCategoryFactory> */
    use HasFactory;

    // Satu kategori memiliki banyak postingan
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}
