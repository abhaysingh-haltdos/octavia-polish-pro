@extends('layouts.app')

@section('content')
<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pt-24 pb-20" x-data="{ activeSection: 'overview' }" @scroll.window="
    const sections = ['overview', 'challenges', 'approach', 'architecture', 'features', 'results', 'before-after', 'impact'];
    let scrollPos = window.scrollY + 200;
    for(let s of sections) {
        let el = document.getElementById(s);
        if(el && scrollPos >= el.offsetTop && scrollPos < (el.offsetTop + el.offsetHeight)) {
            activeSection = s; break;
        }
    }
">
    <!-- 1. HERO BANNER -->
    <section class="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 right-1/4 w-[700px] h-[350px] bg-[#C1A972]/10 blur-[140px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto space-y-6 relative z-10">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <nav class="flex items-center gap-2 text-xs text-[#93A3B2] font-medium">
                    <a href="/" class="hover:text-[#C1A972] transition-colors">Home</a>
                    <span>/</span>
                    <a href="/case-studies" class="hover:text-[#C1A972] transition-colors">Case Studies</a>
                    <span>/</span>
                    <span class="text-[#C1A972] font-semibold truncate max-w-xs sm:max-w-md">{{ $study['clientName'] }}</span>
                </nav>
                <a href="/case-studies" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#C1A972] hover:text-white transition-colors">
                    &larr; Back to Case Studies
                </a>
            </div>

            <div class="flex flex-wrap items-center gap-2 pt-2">
                <span class="px-3 py-1 bg-white/10 backdrop-blur-md text-[#C1A972] text-xs font-bold rounded-full border border-[#C1A972]/40">
                    {{ $study['industry'] }}
                </span>
                <span class="px-3 py-1 bg-white/10 backdrop-blur-md text-white text-xs font-bold rounded-full border border-white/20">
                    {{ $study['serviceCategory'] }}
                </span>
                <span class="px-3 py-1 bg-white/10 backdrop-blur-md text-[#FEFEFE] text-xs font-semibold rounded-full border border-white/20">
                    {{ $study['engagementModel'] }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight max-w-4xl">
                {{ $study['title'] }}
            </h1>

            <p class="text-sm sm:text-lg text-[#FEFEFE] max-w-3xl leading-relaxed font-normal">
                {{ $study['subtitle'] }}
            </p>

            <div class="pt-4 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-white/15 max-w-4xl text-xs text-[#93A3B2]">
                <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Client</span><strong class="text-white font-bold">{{ $study['clientName'] }}</strong></div>
                <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Location</span><strong class="text-white font-bold">{{ $study['clientLocation'] }}</strong></div>
                <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Duration</span><strong class="text-white font-bold">{{ $study['projectDuration'] }}</strong></div>
                <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase tracking-wider">Team Size</span><strong class="text-white font-bold">{{ $study['teamSize'] }}</strong></div>
            </div>
        </div>
    </section>

    <!-- 2. HERO COVER IMAGE -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
        <div class="rounded-3xl overflow-hidden border-4 border-white shadow-2xl relative h-64 sm:h-96 lg:h-[480px]">
            <img src="{{ $study['heroBannerImage'] }}" alt="{{ $study['title'] }}" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            
            <div class="absolute bottom-6 left-6 right-6 flex flex-wrap items-center justify-between gap-4 text-white">
                <div class="bg-[#153758]/90 backdrop-blur-md px-4 py-2 rounded-2xl border border-[#C1A972]/40 text-xs font-bold">
                    Octavia Architecture & Delivery Standard
                </div>
            </div>
        </div>
    </div>

    <!-- 3. MAIN SPLIT LAYOUT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            <!-- LEFT CONTENT -->
            <main class="lg:col-span-8 space-y-12">
                <!-- OVERVIEW -->
                <section id="overview" class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-4 shadow-sm scroll-mt-32">
                    <div class="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                        <span>1. Business Overview</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#153758]">Client Background & Operational Context</h2>
                    <p class="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed font-normal">{{ $study['businessOverview'] }}</p>
                </section>

                <!-- CHALLENGES -->
                @if(!empty($study['clientChallenges']))
                <section id="challenges" class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
                    <div class="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                        <span>2. Key Challenges & Bottlenecks</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#153758]">Operational Limitations Before Engagement</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($study['clientChallenges'] as $idx => $chal)
                            <div class="p-4 bg-[#C1A972]/50 border border-[#C1A972]/15 rounded-2xl space-y-2">
                                <div class="w-7 h-7 bg-[#C1A972]/15 text-[#153758] rounded-lg flex items-center justify-center text-xs font-bold">0{{ $idx + 1 }}</div>
                                <p class="text-xs text-[#153758] leading-relaxed font-medium">{{ $chal }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- APPROACH -->
                @if(!empty($study['ourApproach']))
                <section id="approach" class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
                    <div class="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                        <span>3. Our Approach & Discovery</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#153758]">Engineering Strategy & Discovery Process</h2>
                    <p class="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed font-normal">{{ $study['ourApproach'] }}</p>
                </section>
                @endif

                <!-- ARCHITECTURE -->
                @if(!empty($study['solutionArchitecture']))
                <section id="architecture" class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
                    <div class="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                        <span>4. Solution Architecture</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#153758]">High-Availability System Blueprint</h2>
                    @if(!empty($study['solutionArchitecture']['summary']))
                    <p class="text-xs sm:text-sm text-[#5C6B7A] leading-relaxed">{{ $study['solutionArchitecture']['summary'] }}</p>
                    @endif
                    
                    @if(!empty($study['solutionArchitecture']['components']))
                    <div class="bg-[#153758] rounded-2xl p-6 text-white space-y-4 border border-[#C1A972]/30 shadow-inner">
                        @if(!empty($study['solutionArchitecture']['diagramDescription']))
                        <p class="font-mono text-xs text-[#C1A972]/90 leading-relaxed bg-black/30 p-3 rounded-xl border border-white/10">{{ $study['solutionArchitecture']['diagramDescription'] }}</p>
                        @endif
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                            @foreach($study['solutionArchitecture']['components'] as $comp)
                                <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl space-y-1">
                                    <div class="text-xs font-bold text-[#C1A972]">{{ $comp['name'] ?? '' }}</div>
                                    <p class="text-[11px] text-[#93A3B2] leading-tight">{{ $comp['description'] ?? '' }}</p>
                                    @if(!empty($comp['tech']))
                                    <span class="inline-block mt-2 text-[10px] font-mono text-[#93A3B2] bg-black/40 px-2 py-0.5 rounded">{{ $comp['tech'] }}</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </section>
                @endif

                <!-- RESULTS & KPIS -->
                @if(!empty($study['kpis']))
                <section id="results" class="bg-white border border-[#DDE3E9] rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm scroll-mt-32">
                    <div class="flex items-center gap-2 text-[#264868] font-extrabold uppercase text-xs tracking-wider">
                        <span>5. Business Results & ROI Metrics</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#153758]">Quantifiable Impact & Performance Gains</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($study['kpis'] as $kpi)
                            <div class="p-5 bg-gradient-to-br from-white to-[#C1A972]/20 border border-[#DDE3E9] rounded-2xl space-y-2 shadow-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">{{ $kpi['label'] ?? '' }}</span>
                                    @if(!empty($kpi['change']))
                                    <span class="px-2 py-0.5 bg-[#264868]/15 text-[#153758] text-[10px] font-extrabold rounded-md">{{ $kpi['change'] }}</span>
                                    @endif
                                </div>
                                <div class="text-3xl font-black text-[#264868]">{{ $kpi['value'] ?? '' }}</div>
                                @if(!empty($kpi['description']))
                                <p class="text-xs text-[#5C6B7A]">{{ $kpi['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- RELATED -->
                @if(count($related) > 0)
                    <div class="pt-8 border-t border-[#DDE3E9] space-y-6">
                        <h3 class="text-lg font-black text-[#153758]">Explore More Case Studies</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @foreach($related as $r)
                                <a href="/case-studies/{{ $r['slug'] }}" class="block p-4 bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl transition-all space-y-2">
                                    <span class="text-[10px] font-bold text-[#C1A972] uppercase">{{ $r['industry'] }}</span>
                                    <h4 class="text-xs font-bold text-[#264868] hover:text-[#C1A972] line-clamp-2">{{ $r['title'] }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </main>

            <!-- RIGHT SIDEBAR -->
            <aside class="lg:col-span-4 space-y-6 sticky top-28">
                <!-- SNAPSHOT -->
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 space-y-4 shadow-sm">
                    <h3 class="text-sm font-black text-[#264868] uppercase tracking-wider border-b pb-3">Project Snapshot</h3>
                    <div class="space-y-3 text-xs">
                        <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase">Client</span><span class="font-bold text-[#153758]">{{ $study['clientName'] }}</span></div>
                        <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase">Industry</span><span class="font-bold text-[#264868]">{{ $study['industry'] }}</span></div>
                        <div><span class="text-[#93A3B2] block text-[10px] font-bold uppercase">Service</span><span class="font-bold text-[#153758]">{{ $study['serviceCategory'] }}</span></div>
                    </div>
                </div>

                <!-- TABLE OF CONTENTS (Alpine dynamic) -->
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-6 shadow-sm hidden lg:block">
                    <h3 class="text-sm font-black text-[#264868] uppercase tracking-wider border-b pb-3 mb-3">Contents</h3>
                    <ul class="space-y-2 text-xs font-bold text-[#5C6B7A]">
                        <li><a href="#overview" :class="activeSection === 'overview' ? 'text-[#C1A972]' : 'hover:text-[#264868]'">1. Business Overview</a></li>
                        <li><a href="#challenges" :class="activeSection === 'challenges' ? 'text-[#C1A972]' : 'hover:text-[#264868]'">2. Key Challenges</a></li>
                        <li><a href="#approach" :class="activeSection === 'approach' ? 'text-[#C1A972]' : 'hover:text-[#264868]'">3. Our Approach</a></li>
                        <li><a href="#architecture" :class="activeSection === 'architecture' ? 'text-[#C1A972]' : 'hover:text-[#264868]'">4. Solution Architecture</a></li>
                        <li><a href="#results" :class="activeSection === 'results' ? 'text-[#C1A972]' : 'hover:text-[#264868]'">5. Results & ROI</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
