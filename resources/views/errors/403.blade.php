@extends('layouts.app')

@section('title', 'Access Forbidden')
@section('robots', 'noindex,nofollow')

@section('content')
<div class="min-h-screen bg-[#153758] flex items-center justify-center px-6 py-24">
    <div class="text-center max-w-2xl mx-auto space-y-6">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-[#D9C48F] text-xs font-bold uppercase tracking-wider border border-white/15">
            <span>403 Restricted</span>
        </div>
        <div>
            <span class="text-8xl sm:text-9xl font-black text-[#C1A972] opacity-30 select-none block leading-none">403</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight">Access Forbidden</h1>
        <p class="text-[#B4C1CD] text-base sm:text-lg leading-relaxed max-w-lg mx-auto">
            You do not possess the authorization clearance to access this resource. Please contact your administrator.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
            <a href="/"
               class="inline-flex items-center justify-center px-8 py-3.5 bg-[#264868] hover:bg-[#1f3a54] text-white font-bold text-sm rounded-xl border border-[#C1A972]/40 transition-all shadow-lg shadow-black/20">
                Back to Home
            </a>
            <a href="/contact"
               class="inline-flex items-center justify-center px-8 py-3.5 bg-white/10 hover:bg-white/15 text-white font-semibold text-sm rounded-xl border border-white/15 transition-all">
                Contact Security
            </a>
        </div>
    </div>
</div>
@endsection
