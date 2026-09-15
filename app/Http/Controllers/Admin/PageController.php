<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of CMS pages.
     */
    public function index(Request $request): View
    {
        $query = Page::with('author')->orderByDesc('id');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $pages = $query->paginate(15)->withQueryString();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     */
    public function create(): View
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created page in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', 'unique:pages,slug'],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'template' => ['nullable', 'string', 'max:50'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'published_at' => ['nullable', 'date'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Page::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $counter++;
        }
        $validated['slug'] = $slug;
        $validated['author_id'] = Auth::id();
        $validated['published_at'] = $validated['status'] === 'published' ? ($validated['published_at'] ?? now()) : null;

        $page = Page::create($validated);

        // Save polymorphic SEO metadata
        $this->saveSeoMeta($page, $request);

        AuditLogger::log('PAGE_CREATED', "Page created: [{$page->title}] (slug: {$page->slug})");

        return redirect()->route('admin.pages.index')->with('success', "Page '{$page->title}' created successfully.");
    }

    /**
     * Show the form for editing the specified page.
     */
    public function edit(Page $page): View
    {
        $page->load('seoMeta');
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified page in storage.
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:150', Rule::unique('pages', 'slug')->ignore($page->id)],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'template' => ['nullable', 'string', 'max:50'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'published_at' => ['nullable', 'date'],
        ]);

        $newSlug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $oldSlug = $page->slug;
        $validated['slug'] = $newSlug;

        $slugWarning = null;
        if ($oldSlug !== $newSlug && $page->status === 'published') {
            // Automatically record 301 redirect
            Redirect::updateOrCreate(
                ['old_url' => '/' . ltrim($oldSlug, '/')],
                [
                    'new_url' => '/' . ltrim($newSlug, '/'),
                    'status_code' => 301,
                    'is_active' => true,
                ]
            );
            $slugWarning = "Note: The published URL changed from '/{$oldSlug}' to '/{$newSlug}'. An automatic 301 redirect was created to preserve SEO ranking.";
            AuditLogger::log('PAGE_SLUG_CHANGED', "Page [{$page->id}] slug changed from {$oldSlug} to {$newSlug}. 301 redirect created.");
        }

        if ($validated['status'] === 'published' && !$page->published_at) {
            $validated['published_at'] = $validated['published_at'] ?? now();
        }

        $page->update($validated);

        // Update polymorphic SEO metadata
        $this->saveSeoMeta($page, $request);

        AuditLogger::log('PAGE_UPDATED', "Page updated: [{$page->title}] (slug: {$page->slug})");

        $redirect = redirect()->route('admin.pages.index')->with('success', "Page '{$page->title}' updated successfully.");
        if ($slugWarning) {
            $redirect->with('warning', $slugWarning);
        }

        return $redirect;
    }

    /**
     * Remove the specified page from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $title = $page->title;
        $page->seoMeta()->delete();
        $page->delete();

        AuditLogger::log('PAGE_DELETED', "Page deleted: [{$title}]");

        return redirect()->route('admin.pages.index')->with('success', "Page '{$title}' was deleted.");
    }

    /**
     * Reusable SEO helper for Pages
     */
    protected function saveSeoMeta(Page $page, Request $request): void
    {
        $seo = $request->input('seo', []);

        SeoMeta::updateOrCreate(
            [
                'seoable_type' => Page::class,
                'seoable_id' => $page->id,
            ],
            [
                'meta_title' => $seo['meta_title'] ?? $page->title,
                'meta_description' => $seo['meta_description'] ?? $page->excerpt,
                'canonical_url' => $seo['canonical_url'] ?? url('/' . $page->slug),
                'robots_index' => !empty($seo['robots_index']),
                'robots_follow' => !empty($seo['robots_follow']),
                'og_title' => $seo['og_title'] ?? $seo['meta_title'] ?? $page->title,
                'og_description' => $seo['og_description'] ?? $seo['meta_description'] ?? $page->excerpt,
                'og_image' => $seo['og_image'] ?? $page->featured_image,
                'twitter_title' => $seo['twitter_title'] ?? $seo['meta_title'] ?? $page->title,
                'twitter_description' => $seo['twitter_description'] ?? $seo['meta_description'] ?? $page->excerpt,
                'twitter_image' => $seo['twitter_image'] ?? $page->featured_image,
                'schema_type' => $seo['schema_type'] ?? 'WebPage',
            ]
        );
    }
}
