<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Judul Halaman
        $title = 'Postingan';

        // Kategori Postingan
        $categories = PostCategory::orderBy('name')->get();

        // Postingan
        $posts = Post::with(['category', 'author'])
            ->where('status', 'Terbit')
            ->when(
                $request->category,
                fn($query, $category) => $query->whereHas('category', fn($q) => $q->where('slug', $category))
            )
            ->when(
                $request->search,
                fn($query, $search) => $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                })
            )
            ->when(
                $request->sort === 'popular',
                fn($query) => $query->orderByDesc('views_count'),
                fn($query) => $query->latest()
            )
            ->paginate(20)
            ->withQueryString();

        return view('pages.public.posts.index', compact('title', 'posts', 'categories'));
    }

    public function show(string $slug)
    {
        // Judul Halaman
        $title = 'Postingan';

        // Postingan
        $post = Post::with(['category', 'author', 'images'])
            ->where('slug', $slug)
            ->where('status', 'Terbit')
            ->firstOrFail();

        // Tambah Viewer
        $cacheKey = 'post_viewed_' . $post->id . '_' . request()->ip();
        if (! Cache::has($cacheKey)) {
            $post->increment('views_count');

            Cache::put($cacheKey, true, now()->addDay());
        }

        return view('pages.public.posts.show', compact('title', 'post'));
    }
}
