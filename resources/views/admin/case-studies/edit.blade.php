@extends('admin.layouts.app')

@section('title', 'Edit Case Study: ' . $caseStudy->title)
@section('page-title', 'Edit Case Study')

@section('content')
@php
    $techsString = is_array($caseStudy->technologies) ? implode(', ', $caseStudy->technologies) : '';
    $challengesString = is_array($caseStudy->client_challenges) ? implode("\n", $caseStudy->client_challenges) : '';
    $goalsString = is_array($caseStudy->business_goals) ? implode("\n", $caseStudy->business_goals) : '';
@endphp

<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-white">Edit Enterprise Case Study</h1>
            <p class="text-xs text-slate-400">Modify client results, technical narrative, and SEO metadata.</p>
        </div>
        <div class="flex items-center gap-3">
            @if($caseStudy->status === 'published')
            <a href="/case-studies/{{ $caseStudy->slug }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700 flex items-center gap-1.5">
                <span>View Live Case Study</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            @endif
            <a href="{{ route('admin.case-studies.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors border border-slate-700">
                &larr; Back to Case Studies
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.case-studies.update', $caseStudy) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Content Area (2 Cols) -->
            <div class="lg:col-span-2 space-y-5">
                <!-- Core Info -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Project Overview</h3>

                    <div>
                        <label for="title" class="block text-xs font-semibold text-slate-200 mb-1">Project Title <span class="text-rose-400">*</span></label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $caseStudy->title) }}"
                            required
                            class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="slug" class="block text-xs font-semibold text-slate-200">URL Slug</label>
                            @if($caseStudy->status === 'published')
                                <span class="text-[10px] text-amber-400 font-mono flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Slug edits auto-generate 301 redirect
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-slate-800 border border-r-0 border-slate-800 rounded-l-xl text-xs text-slate-400 font-mono">/case-studies/</span>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $caseStudy->slug) }}"
                                class="w-full px-3 py-2.5 bg-slate-950/80 border border-slate-800 rounded-r-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="subtitle" class="block text-xs font-semibold text-slate-200 mb-1">Subtitle / Headline Summary</label>
                        <input
                            type="text"
                            id="subtitle"
                            name="subtitle"
                            value="{{ old('subtitle', $caseStudy->subtitle) }}"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="client_name" class="block text-xs font-semibold text-slate-200 mb-1">Client Name <span class="text-rose-400">*</span></label>
                            <input
                                type="text"
                                id="client_name"
                                name="client_name"
                                value="{{ old('client_name', $caseStudy->client_name) }}"
                                required
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                            />
                        </div>
                        <div>
                            <label for="client_location" class="block text-xs font-semibold text-slate-200 mb-1">Client Location</label>
                            <input
                                type="text"
                                id="client_location"
                                name="client_location"
                                value="{{ old('client_location', $caseStudy->client_location) }}"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="industry" class="block text-xs font-semibold text-slate-200 mb-1">Industry Sector <span class="text-rose-400">*</span></label>
                            <input
                                type="text"
                                id="industry"
                                name="industry"
                                value="{{ old('industry', $caseStudy->industry) }}"
                                required
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                            />
                        </div>
                        <div>
                            <label for="service_category" class="block text-xs font-semibold text-slate-200 mb-1">Service Category <span class="text-rose-400">*</span></label>
                            <input
                                type="text"
                                id="service_category"
                                name="service_category"
                                value="{{ old('service_category', $caseStudy->service_category) }}"
                                required
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                            />
                        </div>
                    </div>
                </div>

                <!-- Deep Dive Narrative & Metrics -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Technical Case Narrative</h3>

                    <div>
                        <label for="short_challenge" class="block text-xs font-semibold text-slate-200 mb-1">The Challenge (Executive Summary)</label>
                        <textarea
                            id="short_challenge"
                            name="short_challenge"
                            rows="3"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('short_challenge', $caseStudy->short_challenge) }}</textarea>
                    </div>

                    <div>
                        <label for="result_highlight" class="block text-xs font-semibold text-slate-200 mb-1">Measurable Results & Outcomes</label>
                        <textarea
                            id="result_highlight"
                            name="result_highlight"
                            rows="3"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('result_highlight', $caseStudy->result_highlight) }}</textarea>
                    </div>

                    <div>
                        <label for="business_overview" class="block text-xs font-semibold text-slate-200 mb-1">Business Context & Background</label>
                        <textarea
                            id="business_overview"
                            name="business_overview"
                            rows="3"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('business_overview', $caseStudy->business_overview) }}</textarea>
                    </div>

                    <div>
                        <label for="our_approach" class="block text-xs font-semibold text-slate-200 mb-1">Our Engineering Approach & Implementation</label>
                        <textarea
                            id="our_approach"
                            name="our_approach"
                            rows="4"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        >{{ old('our_approach', $caseStudy->our_approach) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="challenges_lines" class="block text-xs font-semibold text-slate-200 mb-1">Specific Challenges (1 per line)</label>
                            <textarea
                                id="challenges_lines"
                                name="challenges_lines"
                                rows="3"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            >{{ old('challenges_lines', $challengesString) }}</textarea>
                        </div>
                        <div>
                            <label for="goals_lines" class="block text-xs font-semibold text-slate-200 mb-1">Target Goals (1 per line)</label>
                            <textarea
                                id="goals_lines"
                                name="goals_lines"
                                rows="3"
                                class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                            >{{ old('goals_lines', $goalsString) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SEO Metadata Component -->
                <x-admin.seo-fields :seo="$caseStudy->seoMeta" :defaultTitle="$caseStudy->title" :defaultDescription="$caseStudy->subtitle ?: $caseStudy->short_challenge" />
            </div>

            <!-- Sidebar Controls (1 Col) -->
            <div class="space-y-5">
                <!-- Status & Publish Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Publishing</h3>

                    <div>
                        <label for="status" class="block text-xs font-semibold text-slate-400 mb-1">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="draft" {{ old('status', $caseStudy->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $caseStudy->status) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="pt-2 border-t border-slate-800 space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $caseStudy->is_featured) ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Featured Case Study</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_latest" value="1" {{ old('is_latest', $caseStudy->is_latest) ? 'checked' : '' }} class="w-4 h-4 rounded text-amber-500 focus:ring-amber-500/20 bg-slate-950 border-slate-800" />
                            <span class="text-xs text-slate-300">Mark as Latest Work</span>
                        </label>
                    </div>

                    <div class="pt-3 border-t border-slate-800">
                        <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                            Update Case Study
                        </button>
                    </div>
                </div>

                <!-- Engagement Specs Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Project Specs</h3>

                    <div>
                        <label for="technologies_input" class="block text-xs font-semibold text-slate-400 mb-1">Tech Stack (comma separated)</label>
                        <input
                            type="text"
                            id="technologies_input"
                            name="technologies_input"
                            value="{{ old('technologies_input', $techsString) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="project_duration" class="block text-xs font-semibold text-slate-400 mb-1">Project Duration</label>
                        <input
                            type="text"
                            id="project_duration"
                            name="project_duration"
                            value="{{ old('project_duration', $caseStudy->project_duration) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="team_size" class="block text-xs font-semibold text-slate-400 mb-1">Team Size</label>
                        <input
                            type="text"
                            id="team_size"
                            name="team_size"
                            value="{{ old('team_size', $caseStudy->team_size) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="engagement_model" class="block text-xs font-semibold text-slate-400 mb-1">Engagement Model</label>
                        <input
                            type="text"
                            id="engagement_model"
                            name="engagement_model"
                            value="{{ old('engagement_model', $caseStudy->engagement_model) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>
                </div>

                <!-- Media Assets Card -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">Images</h3>

                    <div>
                        <label for="featured_image" class="block text-xs font-semibold text-slate-400 mb-1">Thumbnail / Card Image URL</label>
                        <input
                            type="text"
                            id="featured_image"
                            name="featured_image"
                            value="{{ old('featured_image', $caseStudy->featured_image) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>

                    <div>
                        <label for="hero_banner_image" class="block text-xs font-semibold text-slate-400 mb-1">Hero Banner Image URL</label>
                        <input
                            type="text"
                            id="hero_banner_image"
                            name="hero_banner_image"
                            value="{{ old('hero_banner_image', $caseStudy->hero_banner_image) }}"
                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                        />
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-2 text-[11px] text-slate-400">
                    <div class="flex justify-between">
                        <span>Created:</span>
                        <span class="text-slate-200">{{ $caseStudy->created_at?->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Updated:</span>
                        <span class="text-slate-200">{{ $caseStudy->updated_at?->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
