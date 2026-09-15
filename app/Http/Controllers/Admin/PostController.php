<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Models\Tag;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a paginated listing of blog posts.
     */
    public function index(Request $request): View
    {
        $query = Post::with(['category', 'tags', 'authorUser'])->orderByDesc('id');

        $user = Auth::user();
        if ($user->role === 'author') {
            // Authors see all posts but know which ones they own
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($cat = $request->input('category_id')) {
            $query->where('category_id', $cat);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $posts = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', 'unique:posts,slug'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'author_name' => ['nullable', 'string', 'max:100'],
            'read_time' => ['nullable', 'string', 'max:30'],
            'excerpt' => ['nullable', 'string', 'max:600'],
            'content_body' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published', 'scheduled'])],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'is_trending' => ['nullable', 'boolean'],
            'is_popular' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $user = Auth::user();

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $counter++;
        }
        $validated['slug'] = $slug;

        $category = !empty($validated['category_id']) ? Category::find($validated['category_id']) : null;
        $validated['category_name'] = $category?->name ?: 'Engineering';

        $validated['author_id'] = $user->id;
        $validated['author_name'] = !empty($validated['author_name']) ? $validated['author_name'] : $user->name;
        $validated['author_role'] = $user->designation ?: 'Senior Software Engineer';
        $validated['author_avatar'] = $user->avatar ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop';
        $validated['author_bio'] = $user->bio ?: '';
        $validated['read_time'] = !empty($validated['read_time']) ? $validated['read_time'] : '5 min read';

        // Content payload: structured to support rich editor while preserving existing structure
        $rawContent = $validated['content_body'];
        $validated['content'] = [
            'introduction' => Str::limit(strip_tags($rawContent), 280),
            'sections' => [
                [
                    'id' => 'main-content',
                    'heading' => 'Key Insights',
                    'subheading' => 'Technical Architecture & Analysis',
                    'bodyParagraphs' => array_filter(explode("\n\n", strip_tags($rawContent))),
                ]
            ],
            'raw_html' => $rawContent,
        ];
        $validated['summary'] = $validated['excerpt'] ?: Str::limit(strip_tags($rawContent), 200);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_trending'] = $request->boolean('is_trending');
        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['published_at'] = $validated['status'] === 'published' ? ($validated['published_at'] ?? now()) : null;

        $post = Post::create($validated);

        if (!empty($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        // Save polymorphic SEO metadata
        $this->saveSeoMeta($post, $request);

        AuditLogger::log('POST_CREATED', "Post created: [{$post->title}] (slug: {$post->slug})");

        return redirect()->route('admin.posts.index')->with('success', "Post '{$post->title}' created successfully.");
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post): View
    {
        $user = Auth::user();
        if ($user->role === 'author' && $post->author_id !== $user->id) {
            abort(403, 'You are only authorized to edit your own blog articles.');
        }

        $post->load(['category', 'tags', 'seoMeta']);
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $user = Auth::user();
        if ($user->role === 'author' && $post->author_id !== $user->id) {
            abort(403, 'You are only authorized to edit your own blog articles.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', Rule::unique('posts', 'slug')->ignore($post->id)],
            'category_id' => ['nullable', 'exists:categories,id'],
            'author_name' => ['nullable', 'string', 'max:100'],
            'read_time' => ['nullable', 'string', 'max:30'],
            'excerpt' => ['nullable', 'string', 'max:600'],
            'content_body' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published', 'scheduled'])],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
            'is_trending' => ['nullable', 'boolean'],
            'is_popular' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $newSlug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $oldSlug = $post->slug;
        $validated['slug'] = $newSlug;

        $slugWarning = null;
        if ($oldSlug !== $newSlug && $post->status === 'published') {
            Redirect::updateOrCreate(
                ['old_url' => '/blog/' . ltrim($oldSlug, '/')],
                [
                    'new_url' => '/blog/' . ltrim($newSlug, '/'),
                    'status_code' => 301,
                    'is_active' => true,
                ]
            );
            $slugWarning = "Note: The published URL changed from '/blog/{$oldSlug}' to '/blog/{$newSlug}'. An automatic 301 redirect was created to preserve SEO ranking.";
            AuditLogger::log('POST_SLUG_CHANGED', "Post [{$post->id}] slug changed from {$oldSlug} to {$newSlug}. 301 redirect created.");
        }

        $category = !empty($validated['category_id']) ? Category::find($validated['category_id']) : null;
        $validated['category_name'] = $category?->name ?: $post->category_name;

        // Preserve existing structured sections if editing existing JSON-backed post, otherwise update
        $rawContent = $validated['content_body'];
        $paragraphs = array_values(array_filter(array_map('trim', explode("\n", strip_tags($rawContent)))));
        if (empty($paragraphs)) {
            $paragraphs = [strip_tags($rawContent)];
        }

        $validated['content'] = [
            'introduction' => Str::limit(strip_tags($rawContent), 280),
            'sections' => [
                [
                    'id' => 'main-content',
                    'heading' => 'Key Insights',
                    'subheading' => 'Engineering Perspectives',
                    'bodyParagraphs' => $paragraphs,
                ]
            ],
            'raw_html' => $rawContent,
        ];

        $validated['summary'] = $validated['excerpt'] ?: Str::limit(strip_tags($rawContent), 200);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_trending'] = $request->boolean('is_trending');
        $validated['is_popular'] = $request->boolean('is_popular');

        if ($validated['status'] === 'published' && !$post->published_at) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        }

        $post->update($validated);

        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }

        // Save polymorphic SEO metadata
        $this->saveSeoMeta($post, $request);

        AuditLogger::log('POST_UPDATED', "Post updated: [{$post->title}] (slug: {$post->slug})");

        $redirect = redirect()->route('admin.posts.index')->with('success', "Post '{$post->title}' updated successfully.");
        if ($slugWarning) {
            $redirect->with('warning', $slugWarning);
        }

        return $redirect;
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $user = Auth::user();
        if ($user->role === 'author' && $post->author_id !== $user->id) {
            abort(403, 'You are only authorized to delete your own blog articles.');
        }

        $title = $post->title;
        $post->tags()->detach();
        $post->seoMeta()->delete();
        $post->delete();

        AuditLogger::log('POST_DELETED', "Post deleted: [{$title}]");

        return redirect()->route('admin.posts.index')->with('success', "Post '{$title}' was deleted.");
    }

    /**
     * Reusable SEO helper for Posts
     */
    protected function saveSeoMeta(Post $post, Request $request): void
    {
        $seo = $request->input('seo', []);

        SeoMeta::updateOrCreate(
            [
                'seoable_type' => Post::class,
                'seoable_id' => $post->id,
            ],
            [
                'meta_title' => $seo['meta_title'] ?? $post->title,
                'meta_description' => $seo['meta_description'] ?? $post->excerpt,
                'canonical_url' => $seo['canonical_url'] ?? url('/blog/' . $post->slug),
                'robots_index' => !empty($seo['robots_index']),
                'robots_follow' => !empty($seo['robots_follow']),
                'og_title' => $seo['og_title'] ?? $seo['meta_title'] ?? $post->title,
                'og_description' => $seo['og_description'] ?? $seo['meta_description'] ?? $post->excerpt,
                'og_image' => $seo['og_image'] ?? $post->featured_image,
                'twitter_title' => $seo['twitter_title'] ?? $seo['meta_title'] ?? $post->title,
                'twitter_description' => $seo['twitter_description'] ?? $seo['meta_description'] ?? $post->excerpt,
                'twitter_image' => $seo['twitter_image'] ?? $post->featured_image,
                'schema_type' => 'Article',
            ]
        );
    }
}
