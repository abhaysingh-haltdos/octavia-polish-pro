@extends('admin.layouts.app')

@section('title', 'Centralized SEO Manager')
@section('page-title', 'SEO Management Console')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Centralized SEO Console</h1>
            <p class="text-xs text-slate-400">Configure global metadata defaults and inspect polymorphic search records across all content types.</p>
        </div>
    </div>

    <!-- Global SEO Defaults Card -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5">
        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300 mb-4">Global Search & Analytics Defaults</h2>

        <form method="POST" action="{{ route('admin.seo.global') }}" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="default_meta_title" class="block text-xs font-semibold text-slate-200 mb-1">Default Site Title</label>
                    <input
                        type="text"
                        id="default_meta_title"
                        name="default_meta_title"
                        value="{{ old('default_meta_title', $globalSeo['default_meta_title']) }}"
                        required
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                    />
                    <p class="text-[10px] text-slate-500 mt-1">Fallback title when a page does not specify a custom meta title.</p>
                </div>

                <div>
                    <label for="analytics_ga_id" class="block text-xs font-semibold text-slate-200 mb-1">Google Analytics Measurement ID</label>
                    <input
                        type="text"
                        id="analytics_ga_id"
                        name="analytics_ga_id"
                        value="{{ old('analytics_ga_id', $globalSeo['analytics_ga_id']) }}"
                        placeholder="G-XXXXXXXXXX"
                        class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                    />
                    <p class="text-[10px] text-slate-500 mt-1">Global GA4 tracking container ID.</p>
                </div>
            </div>

            <div>
                <label for="default_meta_description" class="block text-xs font-semibold text-slate-200 mb-1">Default Meta Description</label>
                <textarea
                    id="default_meta_description"
                    name="default_meta_description"
                    rows="2"
                    required
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                >{{ old('default_meta_description', $globalSeo['default_meta_description']) }}</textarea>
            </div>

            <button type="submit" class="px-5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                Save Global Defaults
            </button>
        </form>
    </div>

    <!-- Content Type Tabs -->
    <div class="flex items-center gap-2 border-b border-slate-800 pb-2">
        <a href="{{ route('admin.seo.index', ['type' => 'posts']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $type === 'posts' ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
            Blog Articles SEO
        </a>
        <a href="{{ route('admin.seo.index', ['type' => 'pages']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $type === 'pages' ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
            Static & CMS Pages SEO
        </a>
        <a href="{{ route('admin.seo.index', ['type' => 'case_studies']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $type === 'case_studies' ? 'bg-amber-500/15 text-amber-400 border border-amber-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
            Case Studies SEO
        </a>
    </div>

    <!-- SEO Table -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900/80 border-b border-slate-800 text-slate-400">
                    <tr>
                        <th class="py-3 px-4 font-semibold">Content Item</th>
                        <th class="py-3 px-4 font-semibold">Meta Title</th>
                        <th class="py-3 px-4 font-semibold">Description</th>
                        <th class="py-3 px-4 font-semibold">Indexing</th>
                        <th class="py-3 px-4 font-semibold">Schema</th>
                        <th class="py-3 px-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($seoRecords as $record)
                        @php
                            $target = $record->seoable;
                            $editRoute = '#';
                            if ($type === 'posts' && $target) {
                                $editRoute = route('admin.posts.edit', $target);
                            } elseif ($type === 'pages' && $target) {
                                $editRoute = route('admin.pages.edit', $target);
                            } elseif ($type === 'case_studies' && $target) {
                                $editRoute = route('admin.case-studies.edit', $target);
                            }
                        @endphp
                        <tr class="hover:bg-slate-800/25 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white max-w-xs truncate">{{ $target?->title ?: 'Untargeted record #' . $record->id }}</div>
                                <div class="text-[10px] text-slate-500 font-mono">ID: {{ $record->seoable_id }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-300 max-w-xs truncate">
                                {{ $record->meta_title ?: '—' }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 max-w-xs truncate">
                                {{ $record->meta_description ?: '—' }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-mono {{ $record->robots_index ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-rose-500/10 text-rose-400 border border-rose-500/20' }}">
                                    {{ $record->robots_index ? 'index' : 'noindex' }}, {{ $record->robots_follow ? 'follow' : 'nofollow' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 font-mono text-[10px]">
                                {{ $record->schema_type ?: 'WebPage' }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                @if($target)
                                    <a href="{{ $editRoute }}" class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors">
                                        Edit Content & SEO
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-slate-500">
                                No SEO metadata records found for this category.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($seoRecords->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $seoRecords->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
