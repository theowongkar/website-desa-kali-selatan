<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\Attributes\Sluggable;

#[Fillable([
    'author_id',
    'post_category_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'thumbnail_path',
    'status',
    'views_count',
])]
#[Sluggable(from: 'title', to: 'slug')]
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'views_count' => 'integer',
        ];
    }

    // Postingan ditulis oleh satu user
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Postingan berada dalam satu kategori
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    // Postingan memiliki banyak gambar
    public function images()
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }
}
