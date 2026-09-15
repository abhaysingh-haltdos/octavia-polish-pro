@extends('admin.layouts.app')

@section('title', 'Blog Posts CMS')
@section('page-title', 'Manage Blog Posts')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Blog CMS Articles</h1>
            <p class="text-xs text-slate-400">Publish, manage, and optimize technical blog articles and thought leadership insights.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20 flex items-center gap-2 self-start">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Write New Article</span>
        </a>
    </div>

    <!-- Filters & Search -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.posts.index') }}" class="flex flex-col md:flex-row gap-3 items-center justify-between">
            <div class="relative w-full md:w-80">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by title or slug..."
                    class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                <select name="category_id" onchange="this.form.submit()" class="px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-slate-300 focus:outline-none focus:border-amber-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>

                <select name="status" onchange="this.form.submit()" class="px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-slate-300 focus:outline-none focus:border-amber-500">
                    <option value="">All Statuses</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>

                @if(request('search') || request('category_id') || request('status'))
                    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-400 hover:text-white px-2 py-1">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table of Posts -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Post Title & Slug</th>
                        <th class="py-3 px-4 font-semibold">Category</th>
                        <th class="py-3 px-4 font-semibold">Author</th>
                        <th class="py-3 px-4 font-semibold">Badges</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                        <th class="py-3 px-4 font-semibold">Date</th>
                        <th class="py-3 px-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($posts as $post)
                        @php
                            $canEdit = in_array(auth()->user()->role, ['super_admin', 'admin', 'editor']) || $post->author_id === auth()->id();
                        @endphp
                        <tr class="hover:bg-slate-800/25 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white max-w-sm truncate">{{ $post->title }}</div>
                                <div class="text-[11px] text-slate-400 font-mono flex items-center gap-1.5 mt-0.5">
                                    <span>/blog/{{ $post->slug }}</span>
                                    <a href="/blog/{{ $post->slug }}" target="_blank" class="text-slate-500 hover:text-amber-400">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                <span class="px-2 py-0.5 rounded-md bg-slate-800 text-[10px] font-medium border border-slate-700">
                                    {{ is_string($post->category) ? $post->category : ($post->category?->name ?? $post->category_name) }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                {{ $post->author_name ?: ($post->authorUser?->name ?? 'Staff') }}
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-1">
                                    @if($post->is_featured)
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">FEATURED</span>
                                    @endif
                                    @if($post->is_trending)
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-purple-500/20 text-purple-400 border border-purple-500/30">TRENDING</span>
                                    @endif
                                    @if(!$post->is_featured && !$post->is_trending)
                                        <span class="text-slate-600">—</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                @if($post->status === 'published')
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 font-bold text-[10px] border border-emerald-500/30">Published</span>
                                @elseif($post->status === 'draft')
                                    <span class="px-2.5 py-0.5 rounded-full bg-amber-500/15 text-amber-400 font-bold text-[10px] border border-amber-500/30">Draft</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full bg-blue-500/15 text-blue-400 font-bold text-[10px] border border-blue-500/30">{{ ucfirst($post->status) }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-400">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    @if($canEdit)
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Are you sure you want to permanently delete \'{{ addslashes($post->title) }}\'?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[10px] text-slate-600 italic">Read-only</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-500">
                                No blog posts found. Click "Write New Article" to start creating.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
