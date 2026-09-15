@extends('admin.layouts.app')

@section('title', 'Edit Page: ' . $page->title)
@section('page-title', 'Edit Page')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Edit Page</h1>
            <p class="text-xs text-slate-400">Update page content, layout template, and SEO configuration.</p>
        </div>
        <div class="flex items-center gap-3">
            @if($page->status === 'published')
            <a href="/{{ $page->slug }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700 flex items-center gap-1.5">
                <span>View Live Page</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            @endif
            <a href="{{ route('admin.pages.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Content Area (2 Cols) -->
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <div>
                        <label for="title" class="block text-xs font-semibold text-slate-200 mb-1.5">Page Title <span class="text-rose-400">*</span></label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $page->title) }}"
                            required
                            class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="slug" class="block text-xs font-semibold text-slate-200">URL Slug</label>
                            @if($page->status === 'published')
                                <span class="text-[10px] text-amber-400 font-mono flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Slug edits auto-generate 301 redirect
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-slate-800 border border-r-0 border-slate-800 rounded-l-xl text-xs text-slate-400 font-mono">/</span>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $page->slug) }}"
                                class="w-full px-3 py-2.5 bg-slate-950/80 border border-slate-800 rounded-r-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="excerpt" class="block text-xs font-semibold text-slate-200 mb-1.5">Short Excerpt / Intro</label>
                        <textarea
                            id="excerpt"
                            name="excerpt"
                            rows="2"
                            placeholder="A concise summary of this page..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('excerpt', $page->excerpt) }}</textarea>
                    </div>

                    <!-- Rich Content Editor Component -->
                    <div>
                        <x-admin.editor name="content" :value="old('content', $page->content)" label="Page Body Content *" placeholder="Write the main page content here using HTML or Markdown..." />
                    </div>
                </div>

                <!-- Reusable SEO Component -->
                <x-admin.seo-fields :seo="$page->seoMeta" :defaultTitle="$page->title" :defaultDescription="$page->excerpt" />
            </div>

            <!-- Sidebar Controls (1 Col) -->
            <div class="space-y-5">
                <!-- Publishing Controls Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Publishing Status</h3>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft (Unpublished)</option>
                            <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published (Live)</option>
                            <option value="archived" {{ old('status', $page->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <div>
                        <label for="template" class="block text-xs font-semibold text-slate-400 mb-1">Page Template</label>
                        <select id="template" name="template" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="default" {{ old('template', $page->template) === 'default' ? 'selected' : '' }}>Default Template</option>
                            <option value="about" {{ old('template', $page->template) === 'about' ? 'selected' : '' }}>About Us Template</option>
                            <option value="contact" {{ old('template', $page->template) === 'contact' ? 'selected' : '' }}>Contact Template</option>
                            <option value="legal" {{ old('template', $page->template) === 'legal' ? 'selected' : '' }}>Legal / Policy Template</option>
                            <option value="service" {{ old('template', $page->template) === 'service' ? 'selected' : '' }}>Service Layout</option>
                        </select>
                    </div>

                    <div>
                        <label for="featured_image" class="block text-xs font-semibold text-slate-400 mb-1">Featured Image URL</label>
                        <input
                            type="text"
                            id="featured_image"
                            name="featured_image"
                            value="{{ old('featured_image', $page->featured_image) }}"
                            placeholder="/uploads/hero-banner.jpg"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div class="pt-3 border-t border-slate-800 space-y-3">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                            Update Page
                        </button>
                    </div>
                </div>

                <!-- Page Meta Info -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-2 text-[11px] text-slate-400">
                    <div class="flex justify-between">
                        <span>Created:</span>
                        <span class="text-slate-200">{{ $page->created_at?->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Last Updated:</span>
                        <span class="text-slate-200">{{ $page->updated_at?->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Author:</span>
                        <span class="text-slate-200">{{ $page->author?->name ?: 'System' }}</span>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
