@extends('layouts.app')

@section('content')
<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pt-24 pb-20">
    <section class="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 blur-[140px] rounded-full pointer-events-none"></div>

        <div class="max-w-4xl mx-auto text-center space-y-4 relative z-10">
            <nav class="flex items-center justify-center gap-2 text-xs text-[#93A3B2] font-medium">
                <a href="/" class="hover:text-[#C1A972] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#C1A972] font-semibold">{{ $title }}</span>
            </nav>

            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight">
                {{ $title }}
            </h1>
            <p class="text-xs sm:text-sm text-[#93A3B2]">
                Last updated: {{ $lastUpdated ?? 'January 2026' }}
            </p>
        </div>
    </section>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-10 shadow-sm space-y-8 text-sm leading-relaxed text-[#5C6B7A]">
            @if(!empty($content))
                <div class="space-y-4 text-sm leading-relaxed text-[#5C6B7A] prose max-w-none">
                    {!! $content !!}
                </div>
            @elseif(!empty($sections))
                @foreach($sections as $sec)
                    <div class="space-y-3">
                        <h2 class="text-lg sm:text-xl font-bold text-[#153758] border-b border-[#F3F5F7] pb-2">{{ $sec['heading'] }}</h2>
                        <p class="font-normal">{{ $sec['content'] }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
