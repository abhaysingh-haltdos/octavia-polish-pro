@extends('admin.layouts.app')

@section('title', 'Blog Categories')
@section('page-title', 'Blog Categories')

@section('content')
<div class="space-y-6" x-data="{
    editingCategory: null,
    editName: '',
    editSlug: '',
    editDescription: '',
    editAction: '',
    startEdit(cat, updateUrl) {
        this.editingCategory = cat;
        this.editName = cat.name;
        this.editSlug = cat.slug;
        this.editDescription = cat.description || '';
        this.editAction = updateUrl;
    },
    cancelEdit() {
        this.editingCategory = null;
    }
}">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Blog Categories</h1>
            <p class="text-xs text-slate-400">Organize your thought leadership articles into primary subject areas.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Add / Edit Form -->
        <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 self-start">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300 mb-4" x-text="editingCategory ? 'Edit Category' : 'Add New Category'">
                Add New Category
            </h2>

            <!-- Create Form (Shown when not editing) -->
            <form x-show="!editingCategory" method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-200 mb-1">Category Name <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="e.g. Artificial Intelligence"
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                    />
                </div>

                <div>
                    <label for="slug" class="block text-xs font-semibold text-slate-200 mb-1">Slug (Optional)</label>
                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug') }}"
                        placeholder="e.g. artificial-intelligence"
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold text-slate-200 mb-1">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        placeholder="Brief overview of articles in this topic..."
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                    >{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                    Add Category
                </button>
            </form>

            <!-- Edit Form (Shown when editingCategory is set) -->
            <form x-show="editingCategory" x-cloak :action="editAction" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-200 mb-1">Category Name <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        name="name"
                        x-model="editName"
                        required
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-200 mb-1">Slug</label>
                    <input
                        type="text"
                        name="slug"
                        x-model="editSlug"
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-200 mb-1">Description</label>
                    <textarea
                        name="description"
                        rows="3"
                        x-model="editDescription"
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                    ></textarea>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                        Update
                    </button>
                    <button type="button" @click="cancelEdit()" class="py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-xs transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column: Categories Table (2 Cols) -->
        <div class="lg:col-span-2 bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
            <div class="p-4 border-b border-slate-800 bg-slate-900/40">
                <form method="GET" action="{{ route('admin.categories.index') }}" class="relative max-w-xs">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search categories..."
                        class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                    />
                    <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                        <tr>
                            <th class="py-3 px-4 font-semibold">Name</th>
                            <th class="py-3 px-4 font-semibold">Slug</th>
                            <th class="py-3 px-4 font-semibold">Articles</th>
                            <th class="py-3 px-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($categories as $category)
                            <tr class="hover:bg-slate-800/25 transition-colors">
                                <td class="py-3 px-4">
                                    <div class="font-bold text-white">{{ $category->name }}</div>
                                    @if($category->description)
                                        <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $category->description }}</div>
                                    @endif
                                </td>
                                <td class="py-3 px-4 font-mono text-slate-400 text-[11px]">
                                    {{ $category->slug }}
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 text-[10px] font-bold border border-slate-700">
                                        {{ $category->posts_count }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <button
                                            type="button"
                                            @click="startEdit({{ json_encode($category) }}, '{{ route('admin.categories.update', $category) }}')"
                                            class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors"
                                        >
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete category \'{{ addslashes($category->name) }}\'? Articles will not be deleted.');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-500">
                                    No categories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categories->hasPages())
                <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
