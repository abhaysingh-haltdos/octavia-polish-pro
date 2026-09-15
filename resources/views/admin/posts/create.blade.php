@extends('admin.layouts.app')

@section('title', 'Write New Blog Article')
@section('page-title', 'Create Blog Post')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Write New Blog Article</h1>
            <p class="text-xs text-slate-400">Compose and publish technical articles with taxonomy and SEO metadata.</p>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
            &larr; Back to Posts
        </a>
    </div>

    <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Body (2 Cols) -->
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <div>
                        <label for="title" class="block text-xs font-semibold text-slate-200 mb-1.5">Article Headline <span class="text-rose-400">*</span></label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="e.g. Scaling Distributed Microservices with Kubernetes and Go"
                            required
                            class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-semibold text-slate-200 mb-1.5">URL Slug</label>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-slate-800 border border-r-0 border-slate-800 rounded-l-xl text-xs text-slate-400 font-mono">/blog/</span>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug') }}"
                                placeholder="leave-blank-to-auto-generate"
                                class="w-full px-3 py-2.5 bg-slate-950/80 border border-slate-800 rounded-r-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="excerpt" class="block text-xs font-semibold text-slate-200 mb-1.5">Short Excerpt / Teaser</label>
                        <textarea
                            id="excerpt"
                            name="excerpt"
                            rows="2"
                            placeholder="A compelling 1-2 sentence lead for card grids and feed previews..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('excerpt') }}</textarea>
                    </div>

                    <!-- Rich Content Editor Component -->
                    <div>
                        <x-admin.editor name="content_body" :value="old('content_body')" label="Article Body Content *" placeholder="Write the full post using HTML or Markdown headings, paragraphs, and code snippets..." />
                    </div>
                </div>

                <!-- Reusable SEO Component -->
                <x-admin.seo-fields :defaultTitle="old('title', '')" :defaultDescription="old('excerpt', '')" />
            </div>

            <!-- Sidebar Controls (1 Col) -->
            <div class="space-y-5">
                <!-- Publishing Status Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Publishing Options</h3>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Save as draft)</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published (Live immediately)</option>
                            <option value="scheduled" {{ old('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <div>
                        <label for="category_id" class="block text-xs font-semibold text-slate-400 mb-1">Category</label>
                        <select id="category_id" name="category_id" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="">Select Category...</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="author_name" class="block text-xs font-semibold text-slate-400 mb-1">Author Byline</label>
                        <input
                            type="text"
                            id="author_name"
                            name="author_name"
                            value="{{ old('author_name', auth()->user()->name) }}"
                            placeholder="{{ auth()->user()->name }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="read_time" class="block text-xs font-semibold text-slate-400 mb-1">Estimated Read Time</label>
                        <input
                            type="text"
                            id="read_time"
                            name="read_time"
                            value="{{ old('read_time', '5 min read') }}"
                            placeholder="5 min read"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="featured_image" class="block text-xs font-semibold text-slate-400 mb-1">Cover Image URL</label>
                        <input
                            type="text"
                            id="featured_image"
                            name="featured_image"
                            value="{{ old('featured_image') }}"
                            placeholder="/uploads/article-cover.jpg"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <!-- Visibility Toggles -->
                    <div class="pt-3 border-t border-slate-800 space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Featured Article</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_trending" value="1" {{ old('is_trending') ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Trending Article</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Popular Article</span>
                        </label>
                    </div>

                    <div class="pt-3 border-t border-slate-800">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                            Save & Publish
                        </button>
                    </div>
                </div>

                <!-- Tags Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Article Tags</h3>
                    <div class="flex flex-wrap gap-2 max-h-48 overflow-y-auto">
                        @forelse($tags as $tag)
                            <label class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-950 border border-slate-800 hover:border-slate-700 cursor-pointer text-[11px] text-slate-300">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="w-3.5 h-3.5 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-900 border-slate-700" />
                                <span>{{ $tag->name }}</span>
                            </label>
                        @empty
                            <p class="text-[11px] text-slate-500">No tags configured yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
