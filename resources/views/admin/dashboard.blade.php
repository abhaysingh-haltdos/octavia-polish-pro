@extends('admin.layouts.app')

@section('title', 'CMS Overview')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    <!-- Welcome Hero Banner -->
    <div class="p-6 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-900/90 to-[#1e1b4b]/40 border border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-xl">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-[11px] font-mono uppercase tracking-wider text-slate-400">Octavia CMS Online</span>
            </div>
            <h1 class="text-xl md:text-2xl font-black text-white tracking-tight">
                Welcome, {{ auth()->user()->name }}
            </h1>
            <p class="text-xs text-slate-400 mt-1 max-w-xl">
                Manage your enterprise web content, publish technical blog articles, analyze client leads, and control site settings.
            </p>
        </div>
        <div class="flex items-center flex-wrap gap-2.5">
            <a href="{{ route('admin.posts.create') }}" class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>New Blog Post</span>
            </a>
            @if(in_array(auth()->user()->role, ['super_admin', 'admin', 'editor']))
            <a href="{{ route('admin.pages.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs transition-all border border-slate-700 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span>New Page</span>
            </a>
            <a href="{{ route('admin.case-studies.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs transition-all border border-slate-700 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span>New Case Study</span>
            </a>
            @endif
        </div>
    </div>

    <!-- Aggregate Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Metric: Posts -->
        <a href="{{ route('admin.posts.index') }}" class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 hover:border-slate-700 transition-all group shadow-sm block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Blog Posts</span>
                <div class="w-9 h-9 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-black text-white">{{ $stats['totalPosts'] }}</span>
                <span class="text-[11px] text-emerald-400 font-medium">{{ $stats['publishedPosts'] }} published</span>
            </div>
            <p class="text-[11px] text-slate-500 mt-1">{{ $stats['draftPosts'] }} drafts in queue</p>
        </a>

        <!-- Metric: Case Studies -->
        <a href="{{ route('admin.case-studies.index') }}" class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 hover:border-slate-700 transition-all group shadow-sm block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Case Studies</span>
                <div class="w-9 h-9 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-black text-white">{{ $stats['totalCaseStudies'] }}</span>
                <span class="text-[11px] text-blue-400 font-medium">Enterprise Portfolios</span>
            </div>
            <p class="text-[11px] text-slate-500 mt-1">Multi-industry client proof</p>
        </a>

        <!-- Metric: Pages -->
        <a href="{{ route('admin.pages.index') }}" class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 hover:border-slate-700 transition-all group shadow-sm block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">CMS Pages</span>
                <div class="w-9 h-9 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-black text-white">{{ $stats['totalPages'] }}</span>
                <span class="text-[11px] text-indigo-400 font-medium">Active Pages</span>
            </div>
            <p class="text-[11px] text-slate-500 mt-1">Dynamic templates & routing</p>
        </a>

        <!-- Metric: Leads -->
        <a href="{{ route('admin.leads.index') }}" class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 hover:border-slate-700 transition-all group shadow-sm block">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Client Inquiries</span>
                <div class="w-9 h-9 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-black text-white">{{ $stats['totalLeads'] }}</span>
                @if($stats['newLeads'] > 0)
                    <span class="text-[11px] px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 font-bold border border-emerald-500/30">{{ $stats['newLeads'] }} new</span>
                @else
                    <span class="text-[11px] text-slate-500">All handled</span>
                @endif
            </div>
            <p class="text-[11px] text-slate-500 mt-1">Direct contact submissions</p>
        </a>
    </div>

    <!-- Dual Column Split: Recent Content & Leads/Audit -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left 2 Cols: Recent Blog Posts -->
        <div class="lg:col-span-2 bg-slate-900/60 border border-slate-800 rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-sm font-bold text-white">Recent Blog Articles</h2>
                    <p class="text-[11px] text-slate-400">Latest technical articles published or drafted</p>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1">
                    <span>View All Posts</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400">
                            <th class="pb-2.5 font-medium">Title</th>
                            <th class="pb-2.5 font-medium">Category</th>
                            <th class="pb-2.5 font-medium">Status</th>
                            <th class="pb-2.5 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($recentPosts as $post)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="py-3 pr-3">
                                    <div class="font-semibold text-white truncate max-w-xs">{{ $post->title }}</div>
                                    <div class="text-[10px] text-slate-500 font-mono">/blog/{{ $post->slug }}</div>
                                </td>
                                <td class="py-3 text-slate-300">
                                    <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-300 text-[10px] font-medium border border-slate-700/60">
                                        {{ is_string($post->category) ? $post->category : ($post->category?->name ?? $post->category_name) }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    @if($post->status === 'published')
                                        <span class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-bold border border-emerald-500/20">Published</span>
                                    @elseif($post->status === 'draft')
                                        <span class="px-2 py-0.5 rounded-full bg-amber-500/10 text-amber-400 text-[10px] font-bold border border-amber-500/20">Draft</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full bg-slate-500/10 text-slate-400 text-[10px] font-bold border border-slate-500/20">{{ ucfirst($post->status) }}</span>
                                    @endif
                                </td>
                                <td class="py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-slate-400 hover:text-amber-400 font-medium transition-colors">
                                            Edit
                                        </a>
                                        @if($post->status === 'published')
                                        <a href="/blog/{{ $post->slug }}" target="_blank" class="text-slate-500 hover:text-white transition-colors" title="View live">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-500">No blog posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Col: Inbound Leads & Audit Feed -->
        <div class="space-y-6">

            @if(in_array(auth()->user()->role, ['super_admin', 'admin']))
            <!-- Recent Leads -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-sm font-bold text-white">Recent Client Inquiries</h2>
                    <a href="{{ route('admin.leads.index') }}" class="text-[11px] font-semibold text-amber-400 hover:text-amber-300">View All</a>
                </div>
                <div class="space-y-2.5">
                    @forelse($recentLeads as $lead)
                        <a href="{{ route('admin.leads.show', $lead) }}" class="block p-3 rounded-xl bg-slate-950/60 border border-slate-800/80 hover:border-slate-700 transition-all">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-bold text-xs text-white truncate max-w-[140px]">{{ $lead->full_name }}</span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded-full {{ $lead->status === 'new' ? 'bg-emerald-500/20 text-emerald-400 font-bold border border-emerald-500/30' : 'bg-slate-800 text-slate-400' }}">
                                    {{ ucfirst($lead->status) }}
                                </span>
                            </div>
                            <div class="text-[11px] text-slate-400 truncate">{{ $lead->company ?: $lead->email }}</div>
                            <div class="text-[10px] text-slate-500 mt-1">{{ $lead->created_at?->diffForHumans() }}</div>
                        </a>
                    @empty
                        <div class="py-4 text-center text-xs text-slate-500">No leads received yet.</div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Security Audit Trail -->
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-sm font-bold text-white">Security & Audit Logs</h2>
                    <a href="{{ route('admin.audit-logs.index') }}" class="text-[11px] font-semibold text-amber-400 hover:text-amber-300">View Log</a>
                </div>
                <div class="space-y-2 text-xs">
                    @forelse($recentLogs as $log)
                        <div class="flex items-start gap-2.5 py-1.5 border-b border-slate-800/40 last:border-0">
                            <div class="w-1.5 h-1.5 rounded-full bg-amber-400 mt-1.5 shrink-0"></div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-[10px] text-amber-400 font-bold">{{ $log->action }}</span>
                                    <span class="text-[10px] text-slate-500">{{ $log->created_at?->diffForHumans() }}</span>
                                </div>
                                <div class="text-[11px] text-slate-300 truncate">{{ $log->details }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="py-4 text-center text-xs text-slate-500">No audit activity logged.</div>
                    @endforelse
                </div>
            </div>
            @endif

        </div>

    </div>

</div>
@endsection
