<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    /**
     * Display blog listing page
     */
    public function index(): View
    {
        $categories = Category::pluck('name')->prepend('All')->values()->all();
        $popularTags = Tag::pluck('name')->values()->all();

        $posts = Post::where('status', 'published')
            ->with(['category', 'tags'])
            ->orderByDesc('published_at')
            ->get();

        $data = [
            'categories' => $categories,
            'popularTags' => $popularTags,
            'posts' => $posts->map(fn(Post $p) => $p->toViewArray())->values()->all(),
        ];

        return view('pages.blog.index', ['data' => $data]);
    }

    /**
     * Display single blog post with strict 404
     */
    public function show(Post $post): View
    {
        if ($post->status !== 'published') {
            abort(404);
        }

        $post->load(['category', 'tags', 'seoMeta']);

        // Efficient prev/next — two targeted queries instead of loading all posts
        $prevArticle = Post::where('status', 'published')
            ->where('id', '<', $post->id)
            ->orderByDesc('id')
            ->first();

        $nextArticle = Post::where('status', 'published')
            ->where('id', '>', $post->id)
            ->orderBy('id')
            ->first();

        $appUrl = rtrim(config('app.url'), '/');

        // Article JSON-LD structured data
        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'description' => $post->excerpt ?? '',
            'url' => $appUrl . '/blog/' . $post->slug,
            'datePublished' => $post->published_at?->toIso8601String() ?? $post->created_at->toIso8601String(),
            'dateModified' => $post->updated_at->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => $post->author_name ?: 'Octavia Tech Solutions',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Octavia Tech Solutions',
                'url' => $appUrl,
            ],
            'image' => $post->featured_image ? ($appUrl . $post->featured_image) : ($appUrl . '/assets/octavia-logo.png'),
        ];

        // Breadcrumbs for this post
        $breadcrumbs = [
            ['name' => 'Home',   'url' => $appUrl . '/'],
            ['name' => 'Blog',   'url' => $appUrl . '/blog'],
            ['name' => $post->title, 'url' => $appUrl . '/blog/' . $post->slug],
        ];

        return view('pages.blog.show', [
            'article'     => $post->toViewArray(),
            'prevArticle' => $prevArticle?->toViewArray(),
            'nextArticle' => $nextArticle?->toViewArray(),
            'seoMeta'     => $post->seoMeta,
            'jsonLd'      => $jsonLd,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
