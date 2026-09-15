<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of blog tags.
     */
    public function index(Request $request): View
    {
        $query = Tag::withCount('posts')->orderBy('name');

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }

        $tags = $query->paginate(20)->withQueryString();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Store a newly created tag in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', 'unique:tags,slug'],
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $tag = Tag::create($validated);
        AuditLogger::log('TAG_CREATED', "Tag created: [{$tag->name}]");

        return redirect()->route('admin.tags.index')->with('success', "Tag '{$tag->name}' created.");
    }

    /**
     * Update the specified tag in storage.
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', Rule::unique('tags', 'slug')->ignore($tag->id)],
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $tag->update($validated);
        AuditLogger::log('TAG_UPDATED', "Tag updated: [{$tag->name}]");

        return redirect()->route('admin.tags.index')->with('success', "Tag '{$tag->name}' updated.");
    }

    /**
     * Remove the specified tag from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $name = $tag->name;
        $tag->posts()->detach();
        $tag->delete();

        AuditLogger::log('TAG_DELETED', "Tag deleted: [{$name}]");

        return redirect()->route('admin.tags.index')->with('success', "Tag '{$name}' was deleted.");
    }
}
