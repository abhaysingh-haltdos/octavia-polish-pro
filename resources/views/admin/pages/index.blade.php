@extends('admin.layouts.app')

@section('title', 'Pages CMS')
@section('page-title', 'Manage Pages')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Pages CMS</h1>
            <p class="text-xs text-slate-400">Create, customize, and manage dynamic and static pages across the site.</p>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20 flex items-center gap-2 self-start">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Add New Page</span>
        </a>
    </div>

    <!-- Filters & Search -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.pages.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="relative w-full sm:w-80">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by title or slug..."
                    class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                />
                <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <select name="status" onchange="this.form.submit()" class="px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-slate-300 focus:outline-none focus:border-amber-500">
                    <option value="">All Statuses</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>

                @if(request('search') || request('status'))
                    <a href="{{ route('admin.pages.index') }}" class="text-xs text-slate-400 hover:text-white px-2 py-1">Clear Filters</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table of Pages -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Title & Slug</th>
                        <th class="py-3 px-4 font-semibold">Template</th>
                        <th class="py-3 px-4 font-semibold">Author</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                        <th class="py-3 px-4 font-semibold">Published Date</th>
                        <th class="py-3 px-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($pages as $page)
                        <tr class="hover:bg-slate-800/25 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white">{{ $page->title }}</div>
                                <div class="text-[11px] text-slate-400 font-mono flex items-center gap-1.5 mt-0.5">
                                    <span>/{{ $page->slug }}</span>
                                    <a href="/{{ $page->slug }}" target="_blank" class="text-slate-500 hover:text-amber-400">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                <span class="px-2 py-0.5 rounded-md bg-slate-800 text-[10px] font-mono border border-slate-700">
                                    {{ $page->template ?: 'default' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300">
                                {{ $page->author?->name ?: 'System' }}
                            </td>
                            <td class="py-3.5 px-4">
                                @if($page->status === 'published')
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 font-bold text-[10px] border border-emerald-500/30">Published</span>
                                @elseif($page->status === 'draft')
                                    <span class="px-2.5 py-0.5 rounded-full bg-amber-500/15 text-amber-400 font-bold text-[10px] border border-amber-500/30">Draft</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full bg-slate-500/15 text-slate-400 font-bold text-[10px] border border-slate-500/30">{{ ucfirst($page->status) }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-400">
                                {{ $page->published_at ? $page->published_at->format('M d, Y') : '—' }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Are you sure you want to permanently delete page \'{{ addslashes($page->title) }}\'?');" class="inline">
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
                            <td colspan="6" class="py-10 text-center text-slate-500">
                                No pages found. Click "Add New Page" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pages->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $pages->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
