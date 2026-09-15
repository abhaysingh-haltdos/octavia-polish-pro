@extends('admin.layouts.app')

@section('title', 'Edit Article: ' . $post->title)
@section('page-title', 'Edit Blog Post')

@section('content')
@php
    $rawBody = '';
    if (is_array($post->content)) {
        if (!empty($post->content['raw_html'])) {
            $rawBody = $post->content['raw_html'];
        } elseif (!empty($post->content['sections'])) {
            $parts = [];
            if (!empty($post->content['introduction'])) {
                $parts[] = '<p class="lead">' . htmlspecialchars($post->content['introduction']) . '</p>';
            }
            foreach ($post->content['sections'] as $sec) {
                if (!empty($sec['heading'])) {
                    $parts[] = '<h2>' . htmlspecialchars($sec['heading']) . '</h2>';
                }
                if (!empty($sec['subheading'])) {
                    $parts[] = '<h3>' . htmlspecialchars($sec['subheading']) . '</h3>';
                }
                if (!empty($sec['bodyParagraphs'])) {
                    foreach ((array)$sec['bodyParagraphs'] as $p) {
                        $parts[] = '<p>' . htmlspecialchars($p) . '</p>';
                    }
                }
            }
            $rawBody = implode("\n\n", $parts);
        }
    } else {
        $rawBody = (string) $post->content;
    }
    $currentTags = $post->tags->pluck('id')->all();
@endphp

<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Edit Blog Article</h1>
            <p class="text-xs text-slate-400">Update content body, categorization, and SEO rankings.</p>
        </div>
        <div class="flex items-center gap-3">
            @if($post->status === 'published')
            <a href="/blog/{{ $post->slug }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700 flex items-center gap-1.5">
                <span>View Live Article</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            @endif
            <a href="{{ route('admin.posts.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
                &larr; Back to Posts
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.posts.update', $post) }}" class="space-y-6">
        @csrf
        @method('PUT')

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
                            value="{{ old('title', $post->title) }}"
                            required
                            class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="slug" class="block text-xs font-semibold text-slate-200">URL Slug</label>
                            @if($post->status === 'published')
                                <span class="text-[10px] text-amber-400 font-mono flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Slug edits auto-generate 301 redirect
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-slate-800 border border-r-0 border-slate-800 rounded-l-xl text-xs text-slate-400 font-mono">/blog/</span>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $post->slug) }}"
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
                            placeholder="A concise summary..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('excerpt', $post->summary ?: $post->excerpt) }}</textarea>
                    </div>

                    <!-- Rich Content Editor Component -->
                    <div>
                        <x-admin.editor name="content_body" :value="old('content_body', $rawBody)" label="Article Body Content *" placeholder="Write the full post..." />
                    </div>
                </div>

                <!-- Reusable SEO Component -->
                <x-admin.seo-fields :seo="$post->seoMeta" :defaultTitle="$post->title" :defaultDescription="$post->summary ?: $post->excerpt" />
            </div>

            <!-- Sidebar Controls (1 Col) -->
            <div class="space-y-5">
                <!-- Publishing Status Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Publishing Options</h3>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft (Save as draft)</option>
                            <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published (Live immediately)</option>
                            <option value="scheduled" {{ old('status', $post->status) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <div>
                        <label for="category_id" class="block text-xs font-semibold text-slate-400 mb-1">Category</label>
                        <select id="category_id" name="category_id" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="">Select Category...</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="author_name" class="block text-xs font-semibold text-slate-400 mb-1">Author Byline</label>
                        <input
                            type="text"
                            id="author_name"
                            name="author_name"
                            value="{{ old('author_name', $post->author_name) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="read_time" class="block text-xs font-semibold text-slate-400 mb-1">Estimated Read Time</label>
                        <input
                            type="text"
                            id="read_time"
                            name="read_time"
                            value="{{ old('read_time', $post->read_time) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="featured_image" class="block text-xs font-semibold text-slate-400 mb-1">Cover Image URL</label>
                        <input
                            type="text"
                            id="featured_image"
                            name="featured_image"
                            value="{{ old('featured_image', $post->featured_image) }}"
                            placeholder="/uploads/article-cover.jpg"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <!-- Visibility Toggles -->
                    <div class="pt-3 border-t border-slate-800 space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Featured Article</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_trending" value="1" {{ old('is_trending', $post->is_trending) ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Trending Article</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $post->is_popular) ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Popular Article</span>
                        </label>
                    </div>

                    <div class="pt-3 border-t border-slate-800">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                            Update Article
                        </button>
                    </div>
                </div>

                <!-- Tags Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Article Tags</h3>
                    <div class="flex flex-wrap gap-2 max-h-48 overflow-y-auto">
                        @foreach($tags as $tag)
                            <label class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-950 border border-slate-800 hover:border-slate-700 cursor-pointer text-[11px] text-slate-300">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $currentTags)) ? 'checked' : '' }} class="w-3.5 h-3.5 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-900 border-slate-700" />
                                <span>{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Post Metadata -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-2 text-[11px] text-slate-400">
                    <div class="flex justify-between">
                        <span>Created:</span>
                        <span class="text-slate-200">{{ $post->created_at?->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Updated:</span>
                        <span class="text-slate-200">{{ $post->updated_at?->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
