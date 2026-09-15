<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of blog categories.
     */
    public function index(Request $request): View
    {
        $query = Category::withCount('posts')->orderBy('name');

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }

        $categories = $query->paginate(15)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', 'unique:categories,slug'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $category = Category::create($validated);
        AuditLogger::log('CATEGORY_CREATED', "Category created: [{$category->name}]");

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' created.");
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', Rule::unique('categories', 'slug')->ignore($category->id)],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $category->update($validated);
        AuditLogger::log('CATEGORY_UPDATED', "Category updated: [{$category->name}]");

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' updated.");
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $name = $category->name;
        // Nullify category_id on associated posts
        $category->posts()->update(['category_id' => null]);
        $category->delete();

        AuditLogger::log('CATEGORY_DELETED', "Category deleted: [{$name}]");

        return redirect()->route('admin.categories.index')->with('success', "Category '{$name}' was deleted.");
    }
}
