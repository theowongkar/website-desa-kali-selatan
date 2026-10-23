<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'post_id',
    'image_path',
])]
class PostImage extends Model
{
    /** @use HasFactory<\Database\Factories\PostImageFactory> */
    use HasFactory;

    // Gambar dimiliki oleh satu postingan
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
