@extends('admin.layouts.app')

@section('title', 'Create Page')
@section('page-title', 'Create New Page')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Create New Page</h1>
            <p class="text-xs text-slate-400">Add a new dynamic CMS page with dedicated template and SEO settings.</p>
        </div>
        <a href="{{ route('admin.pages.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
            &larr; Back to Pages
        </a>
    </div>

    <form method="POST" action="{{ route('admin.pages.store') }}" class="space-y-6">
        @csrf

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
                            value="{{ old('title') }}"
                            placeholder="e.g. Enterprise AI Consulting Services"
                            required
                            class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-semibold text-slate-200 mb-1.5">URL Slug (Optional)</label>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-slate-800 border border-r-0 border-slate-800 rounded-l-xl text-xs text-slate-400 font-mono">/</span>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug') }}"
                                placeholder="leave-blank-to-auto-generate"
                                class="w-full px-3 py-2.5 bg-slate-950/80 border border-slate-800 rounded-r-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                        <p class="text-[10px] text-slate-500 mt-1">If left blank, slug will be automatically created from the page title.</p>
                    </div>

                    <div>
                        <label for="excerpt" class="block text-xs font-semibold text-slate-200 mb-1.5">Short Excerpt / Intro</label>
                        <textarea
                            id="excerpt"
                            name="excerpt"
                            rows="2"
                            placeholder="A concise summary of this page..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('excerpt') }}</textarea>
                    </div>

                    <!-- Rich Content Editor Component -->
                    <div>
                        <x-admin.editor name="content" :value="old('content')" label="Page Body Content *" placeholder="Write the main page content here using HTML or Markdown..." />
                    </div>
                </div>

                <!-- Reusable SEO Component -->
                <x-admin.seo-fields :defaultTitle="old('title', '')" :defaultDescription="old('excerpt', '')" />
            </div>

            <!-- Sidebar Controls (1 Col) -->
            <div class="space-y-5">
                <!-- Publishing Controls Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Publishing Status</h3>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Unpublished)</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published (Live)</option>
                            <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>

                    <div>
                        <label for="template" class="block text-xs font-semibold text-slate-400 mb-1">Page Template</label>
                        <select id="template" name="template" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="default" {{ old('template') === 'default' ? 'selected' : '' }}>Default Template</option>
                            <option value="about" {{ old('template') === 'about' ? 'selected' : '' }}>About Us Template</option>
                            <option value="contact" {{ old('template') === 'contact' ? 'selected' : '' }}>Contact Template</option>
                            <option value="legal" {{ old('template') === 'legal' ? 'selected' : '' }}>Legal / Policy Template</option>
                            <option value="service" {{ old('template') === 'service' ? 'selected' : '' }}>Service Layout</option>
                        </select>
                    </div>

                    <div>
                        <label for="featured_image" class="block text-xs font-semibold text-slate-400 mb-1">Featured Image URL</label>
                        <input
                            type="text"
                            id="featured_image"
                            name="featured_image"
                            value="{{ old('featured_image') }}"
                            placeholder="/uploads/hero-banner.jpg"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                        <p class="text-[10px] text-slate-500 mt-1">Paste asset path from Media Library</p>
                    </div>

                    <div class="pt-3 border-t border-slate-800">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                            Save Page
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
