@extends('layouts.app')

@section('content')
@php
    $isWebRTCPage = ($slug ?? '') === 'webrtc-development';
@endphp

<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24" x-data="{ openFaqIndex: 0, activeSpecTab: 0, activeTopology: 'sfu' }">
    <!-- 1. HERO SECTION -->
    <section class="bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white pt-36 pb-20 px-6 relative overflow-hidden border-b border-[#153758]">
        <!-- Ambient Glow -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[850px] h-[360px] bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Breadcrumb Navigation -->
            <div class="flex items-center gap-2 text-xs text-[#93A3B2] mb-8 font-medium">
                <a href="/" class="hover:text-[#C1A972] transition-colors">Home</a>
                <span>/</span>
                <a href="/solutions" class="hover:text-[#C1A972] transition-colors">Solutions</a>
                <span>/</span>
                <span class="text-[#C1A972] font-bold">{{ $solution['shortTitle'] ?? 'Enterprise Solution' }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Col: Headings & Value Prop -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#C1A972]/15 border border-[#C1A972]/30 text-[#C1A972] text-xs font-bold uppercase tracking-widest">
                        <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>{{ $solution['badge'] ?? 'Enterprise Architecture' }}</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.15]">
                        {{ $solution['title'] ?? 'Enterprise Solution' }}
                    </h1>

                    <p class="text-[#93A3B2] text-base sm:text-lg leading-relaxed max-w-2xl">
                        {{ $solution['tagline'] ?? '' }}
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                        <button
                            @click="consultationTopic = 'Solution Architecture Demo: {{ addslashes($solution['title'] ?? '') }}'; consultationOpen = true"
                            class="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl shadow-[#C1A972]/10 flex items-center justify-center gap-2 group"
                        >
                            <span>Request Architect Consultation</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>

                        <button
                            @click="consultationTopic = 'Download Tech Spec: {{ addslashes($solution['title'] ?? '') }}'; consultationOpen = true"
                            class="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all flex items-center justify-center gap-2"
                        >
                            <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            <span>Download Architecture Spec</span>
                        </button>
                    </div>

                    <!-- Trust Micro-Badges -->
                    <div class="pt-6 border-t border-white/10 flex flex-wrap items-center gap-6 text-xs text-[#93A3B2] font-semibold">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Sub-150ms Real-Time Latency</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>DTLS-SRTP End-to-End Encrypted</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Carrier-Grade 99.999% SLA</span>
                        </div>
                    </div>
                </div>

                <!-- Right Col: Topology / Mockup -->
                <div class="lg:col-span-5">
                    @if ($isWebRTCPage)
                        <div class="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-6 shadow-2xl space-y-6 relative overflow-hidden backdrop-blur-md">
                            <div class="flex items-center justify-between border-b border-[#153758] pb-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-[#264868] animate-pulse"></div>
                                    <span class="text-xs font-bold text-white uppercase tracking-wider">WebRTC Media Pipeline Inspector</span>
                                </div>
                                <span class="text-[10px] font-mono text-[#264868] bg-[#153758]/80 px-2.5 py-1 rounded-full border border-[#264868]/30">LIVE STREAM 120 FPS</span>
                            </div>

                            <!-- Selector Buttons -->
                            <div class="space-y-2">
                                <div class="text-[11px] font-bold text-[#93A3B2] uppercase tracking-widest flex items-center justify-between">
                                    <span>Select Media Architecture:</span>
                                    <span class="text-[#C1A972] font-mono" x-text="activeTopology.toUpperCase()"></span>
                                </div>

                                <div class="grid grid-cols-3 gap-2">
                                    <button
                                        @click="activeTopology = 'sfu'"
                                        :class="activeTopology === 'sfu' ? 'bg-[#264868] text-white border-[#C1A972]' : 'bg-[#153758] text-[#93A3B2] border-[#153758] hover:text-white'"
                                        class="p-2.5 rounded-xl text-xs font-bold transition-all border"
                                    >
                                        SFU (Selective)
                                    </button>
                                    <button
                                        @click="activeTopology = 'mcu'"
                                        :class="activeTopology === 'mcu' ? 'bg-[#264868] text-white border-[#C1A972]' : 'bg-[#153758] text-[#93A3B2] border-[#153758] hover:text-white'"
                                        class="p-2.5 rounded-xl text-xs font-bold transition-all border"
                                    >
                                        MCU (Mixing)
                                    </button>
                                    <button
                                        @click="activeTopology = 'mesh'"
                                        :class="activeTopology === 'mesh' ? 'bg-[#264868] text-white border-[#C1A972]' : 'bg-[#153758] text-[#93A3B2] border-[#153758] hover:text-white'"
                                        class="p-2.5 rounded-xl text-xs font-bold transition-all border"
                                    >
                                        Mesh (P2P)
                                    </button>
                                </div>
                            </div>

                            <!-- Topology Specs Box -->
                            <div class="p-4 bg-[#0F2334]/90 rounded-2xl border border-[#153758] space-y-3 font-mono text-xs">
                                <div x-show="activeTopology === 'sfu'" class="space-y-2">
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Media Server Engine:</span>
                                        <span class="text-[#264868] font-bold">Mediasoup / LiveKit SFU</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Bandwidth Optimization:</span>
                                        <span class="text-[#C1A972] font-bold">Simulcast &amp; SVC Active</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Client CPU Usage:</span>
                                        <span class="text-[#264868] font-bold">Low (&lt; 8% per peer)</span>
                                    </div>
                                    <div class="text-[10px] text-[#93A3B2] pt-1 border-t border-[#153758] font-sans">
                                        Best for multi-party video conferencing up to 100+ active video participants per room.
                                    </div>
                                </div>

                                <div x-show="activeTopology === 'mcu'" class="space-y-2" x-cloak>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Media Server Engine:</span>
                                        <span class="text-[#C1A972] font-bold">Janus / FFmpeg Composite</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Processing Location:</span>
                                        <span class="text-[#C1A972] font-bold">Server-Side GPU Transcoding</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Client Downstream:</span>
                                        <span class="text-[#264868] font-bold">Single Stream (1Mbps)</span>
                                    </div>
                                    <div class="text-[10px] text-[#93A3B2] pt-1 border-t border-[#153758] font-sans">
                                        Ideal for high-volume video call recording, HLS broadcasting, and legacy endpoint integration.
                                    </div>
                                </div>

                                <div x-show="activeTopology === 'mesh'" class="space-y-2" x-cloak>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Connection Type:</span>
                                        <span class="text-[#264868] font-bold">Direct Peer-to-Peer (P2P)</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Server Requirement:</span>
                                        <span class="text-[#264868] font-bold">Signaling &amp; STUN Only</span>
                                    </div>
                                    <div class="flex justify-between items-center text-[#93A3B2]">
                                        <span>Optimal Group Size:</span>
                                        <span class="text-[#C1A972] font-bold">2 to 4 Participants</span>
                                    </div>
                                    <div class="text-[10px] text-[#93A3B2] pt-1 border-t border-[#153758] font-sans">
                                        Zero media server bandwidth cost. Best for 1-on-1 private video calls and audio rooms.
                                    </div>
                                </div>
                            </div>

                            <!-- Telemetry Footer -->
                            <div class="grid grid-cols-2 gap-2 text-[10px] font-mono text-center">
                                <div class="p-2.5 bg-[#153758]/60 rounded-xl border border-[#153758]/80">
                                    <span class="text-[#93A3B2] block">Encryption</span>
                                    <span class="text-[#264868] font-bold">DTLS-SRTP AES-256</span>
                                </div>
                                <div class="p-2.5 bg-[#153758]/60 rounded-xl border border-[#153758]/80">
                                    <span class="text-[#93A3B2] block">ICE Traversal</span>
                                    <span class="text-[#C1A972] font-bold">coturn TURNS 443</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-6 shadow-2xl space-y-6 relative overflow-hidden backdrop-blur-md">
                            <div class="flex items-center justify-between border-b border-[#153758] pb-4">
                                <span class="text-xs font-bold text-white uppercase tracking-wider flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <span>{{ $solution['shortTitle'] ?? '' }} Stack</span>
                                </span>
                                <span class="text-[10px] font-semibold text-[#264868] bg-[#153758] px-2.5 py-1 rounded-full">ENTERPRISE READY</span>
                            </div>

                            <div class="space-y-3">
                                @foreach ($solution['features'] ?? [] as $f)
                                    <div class="p-3.5 bg-[#153758]/60 rounded-xl border border-[#153758]/60 flex items-start gap-3">
                                        <svg class="w-4 h-4 text-[#C1A972] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <div>
                                            <div class="text-xs font-bold text-white">{{ $f['title'] }}</div>
                                            <div class="text-[11px] text-[#93A3B2] mt-0.5 line-clamp-2">{{ $f['description'] }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="p-4 bg-[#264868]/40 rounded-2xl border border-[#C1A972]/30 text-center">
                                <p class="text-xs text-[#FEFEFE]">
                                    Custom solution architecture designed for your existing cloud &amp; enterprise security compliance.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- 2. KEY METRICS & IMPACT BANNER -->
    @if (!empty($solution['metrics']))
        <section class="max-w-7xl mx-auto px-6 -mt-10 relative z-20">
            <div class="bg-white border border-[#DDE3E9]/80 rounded-3xl p-8 shadow-xl shadow-[#DDE3E9]/50 grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($solution['metrics'] as $m)
                    <div class="space-y-1 text-center md:text-left border-r last:border-r-0 border-[#F3F5F7] pr-4">
                        <div class="text-3xl sm:text-4xl font-black text-[#264868] tracking-tight">{{ $m['value'] }}</div>
                        <div class="text-xs font-bold text-[#153758] uppercase tracking-wider">{{ $m['label'] }}</div>
                        <div class="text-[11px] text-[#5C6B7A] leading-snug">{{ $m['description'] }}</div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 3. OVERVIEW SECTION -->
    @if (!empty($solution['overview']))
        <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-4">
                    <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
                        Solution Vision
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-black text-[#264868] tracking-tight leading-tight">
                        {{ $solution['overview']['heading'] ?? '' }}
                    </h2>
                    <p class="text-[#5C6B7A] text-sm sm:text-base font-semibold leading-relaxed">
                        {{ $solution['overview']['description'] ?? '' }}
                    </p>
                </div>

                <div class="lg:col-span-7 bg-white p-8 rounded-3xl border border-[#DDE3E9]/80 shadow-md space-y-4 text-[#153758] text-xs sm:text-sm leading-relaxed">
                    @foreach ($solution['overview']['paragraphs'] ?? [] as $para)
                        <p>{{ $para }}</p>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 4. CORE FEATURES & CAPABILITIES GRID -->
    @if (!empty($solution['features']))
        <section class="bg-[#153758] text-white py-24 px-6 border-t border-b border-[#153758] relative">
            <div class="max-w-7xl mx-auto space-y-16">
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#C1A972]">Engineering Modules</span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                        Core Technical Capabilities
                    </h2>
                    <p class="text-[#93A3B2] text-sm sm:text-base">
                        Detailed breakdown of specialized modules engineered for maximum enterprise scale and resilience.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($solution['features'] as $feat)
                        <div class="bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 rounded-3xl p-8 transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center mb-6 group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors border border-[#C1A972]/30">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>

                                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-[#C1A972] transition-colors">
                                    {{ $feat['title'] }}
                                </h3>

                                <p class="text-xs text-[#93A3B2] leading-relaxed mb-6">{{ $feat['description'] }}</p>

                                @if (!empty($feat['highlights']))
                                    <ul class="space-y-2 border-t border-white/10 pt-4 text-xs text-[#93A3B2]">
                                        @foreach ($feat['highlights'] as $h)
                                            <li class="flex items-start gap-2">
                                                <svg class="w-3.5 h-3.5 text-[#C1A972] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <span>{{ $h }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 5. TECHNICAL SPECIFICATIONS TABS -->
    @if (!empty($solution['techSpecs']))
        <section class="max-w-7xl mx-auto px-6 py-24">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
                    Technical Benchmarks
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">Enterprise System Specifications</h2>
                <p class="text-[#5C6B7A] text-xs sm:text-sm">In-depth technical specifications, supported protocols, and performance metrics.</p>
            </div>

            <div class="bg-white border border-[#DDE3E9] rounded-3xl shadow-lg overflow-hidden">
                <!-- Tab Headers -->
                <div class="flex flex-wrap border-b border-[#DDE3E9] bg-[#F3F5F7]">
                    @foreach ($solution['techSpecs'] as $i => $spec)
                        <button
                            @click="activeSpecTab = {{ $i }}"
                            :class="activeSpecTab === {{ $i }} ? 'border-[#264868] text-[#264868] bg-white' : 'border-transparent text-[#5C6B7A] hover:text-[#153758]'"
                            class="px-8 py-4 text-xs font-bold uppercase tracking-wider transition-all border-b-2"
                        >
                            {{ $spec['category'] }}
                        </button>
                    @endforeach
                </div>

                <!-- Tab Content -->
                <div class="p-8">
                    @foreach ($solution['techSpecs'] as $i => $spec)
                        <div x-show="activeSpecTab === {{ $i }}" x-cloak class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ($spec['items'] as $item)
                                <div class="p-4 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex items-center justify-between">
                                    <span class="text-xs font-bold text-[#153758]">{{ $item['label'] }}</span>
                                    <span class="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9] font-mono">{{ $item['value'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 6. REAL-WORLD CLIENT USE CASES -->
    @if (!empty($solution['useCases']))
        <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">Case Studies &amp; ROI</span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">Enterprise Implementation Success Stories</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($solution['useCases'] as $uc)
                    <div class="bg-white border border-[#DDE3E9] rounded-3xl p-8 shadow-md flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <span class="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full">
                                {{ $uc['clientType'] }}
                            </span>

                            <h3 class="text-2xl font-bold text-[#264868]">{{ $uc['title'] }}</h3>

                            <div class="space-y-3 text-xs text-[#5C6B7A]">
                                <div><span class="font-bold text-[#153758]">Challenge: </span>{{ $uc['challenge'] }}</div>
                                <div><span class="font-bold text-[#153758]">Solution: </span>{{ $uc['solution'] }}</div>
                            </div>
                        </div>

                        <div class="p-4 bg-[#264868]/15 rounded-2xl border border-[#264868]/15 text-xs font-semibold text-[#153758] flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#264868] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div><span class="font-bold">Business Impact: </span>{{ $uc['result'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 7. FREQUENTLY ASKED QUESTIONS -->
    @if (!empty($solution['faqs']))
        <section class="max-w-4xl mx-auto px-6 py-20">
            <div class="text-center mb-12 space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">Frequently Asked Questions</span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">Architecture &amp; Deployment FAQ</h2>
            </div>

            <div class="space-y-4">
                @foreach ($solution['faqs'] as $idx => $faq)
                    <div class="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm">
                        <button
                            @click="openFaqIndex = (openFaqIndex === {{ $idx }} ? null : {{ $idx }})"
                            class="w-full p-6 text-left font-bold text-sm sm:text-base text-[#264868] flex items-center justify-between gap-4 hover:bg-[#F3F5F7] transition-colors"
                        >
                            <span>{{ $faq['question'] }}</span>
                            <svg
                                :class="openFaqIndex === {{ $idx }} ? 'rotate-180 text-[#C1A972]' : 'text-[#93A3B2]'"
                                class="w-5 h-5 shrink-0 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="openFaqIndex === {{ $idx }}" x-cloak class="px-6 pb-6 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7] pt-4">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 8. BOTTOM CONSULTATION CALL TO ACTION -->
    <section class="max-w-7xl mx-auto px-6 mt-12">
        <div class="bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] rounded-3xl p-10 sm:p-14 text-white text-center space-y-6 shadow-2xl relative overflow-hidden border border-[#C1A972]/30">
            <div class="max-w-2xl mx-auto space-y-4">
                <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                    Ready to Deploy Custom {{ $solution['shortTitle'] ?? 'Enterprise' }}?
                </h2>
                <p class="text-[#93A3B2] text-xs sm:text-sm leading-relaxed">
                    Connect with our principal solution architects to design a custom technical architecture and project timeline.
                </p>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button
                        @click="consultationTopic = 'Consultation: {{ addslashes($solution['title'] ?? '') }}'; consultationOpen = true"
                        class="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl inline-flex items-center justify-center gap-2"
                    >
                        <span>Book Architect Call</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </button>

                    <a
                        href="/case-studies"
                        class="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all inline-flex items-center justify-center gap-2"
                    >
                        <span>View Case Studies</span>
                        <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
