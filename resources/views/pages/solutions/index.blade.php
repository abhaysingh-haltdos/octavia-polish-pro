@extends('layouts.app')

@section('content')
@php
    $solutionsList = [
        [
            'slug' => "webrtc-development",
            'name' => "WebRTC & Real-Time Audio/Video Streaming",
            'category' => "Real-Time Communications",
            'badge' => "SUB-150MS LATENCY",
            'desc' => "High-concurrency SFU/MCU media servers, custom signaling, STUN/TURN relays, and WebRTC SDKs for live interactive video.",
            'icon' => "M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
        ],
        [
            'slug' => "ai-solutions",
            'name' => "Enterprise Generative AI & Agentic Workflows",
            'category' => "Artificial Intelligence",
            'badge' => "AGENTIC WORKFLOWS",
            'desc' => "RAG knowledge search, custom LLM fine-tuning, autonomous multi-agent swarms, and private VPC model hosting.",
            'icon' => "M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
        ],
        [
            'slug' => "saas-solutions",
            'name' => "Multi-Tenant Cloud SaaS Product Engineering",
            'category' => "Product Engineering",
            'badge' => "MULTI-TENANT ARCHITECTURE",
            'desc' => "Row-level security database isolation, automated Stripe billing, tenant onboarding workflows, and microservices.",
            'icon' => "M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
        ],
        [
            'slug' => "cloud-solutions",
            'name' => "Multi-Cloud Infrastructure & DevOps Engineering",
            'category' => "Cloud & Infrastructure",
            'badge' => "KUBERNETES & FINOPS",
            'desc' => "Auto-scaling Kubernetes clusters, Terraform Infrastructure as Code, zero-downtime CI/CD pipelines, and FinOps cost reduction.",
            'icon' => "M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
        ],
        [
            'slug' => "automation-solutions",
            'name' => "Intelligent Process Automation & API Integration",
            'category' => "Enterprise Automation",
            'badge' => "AI-POWERED RPA",
            'desc' => "Robotic process automation, AI intelligent OCR document ingestion, enterprise service bus, and ERP/CRM syncing.",
            'icon' => "M13 10V3L4 14h7v7l9-11h-7z"
        ],
        [
            'slug' => "enterprise-solutions",
            'name' => "Legacy Core Modernization & High-Concurrency Systems",
            'category' => "Enterprise Engineering",
            'badge' => "ZERO TRUST SECURITY",
            'desc' => "Strangler-fig mainframe refactoring, event-driven Kafka architectures, and 1,000,000+ TPS high-capacity pipelines.",
            'icon' => "M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
        ],
        [
            'slug' => "startup-solutions",
            'name' => "Rapid MVP Product Engineering for Startups",
            'category' => "Product Engineering",
            'badge' => "RAPID MVP (6-8 WEEKS)",
            'desc' => "Go from concept to investor-ready product launch in 6 to 8 weeks with scalable cloud foundations and UX design.",
            'icon' => "M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"
        ],
        [
            'slug' => "business-solutions",
            'name' => "Custom ERP, CRM & Business Intelligence Tools",
            'category' => "Enterprise Engineering",
            'badge' => "CUSTOM ERP & BI",
            'desc' => "Bespoke business operating systems, custom lead CRMs, fulfillment software, and real-time executive dashboard analytics.",
            'icon' => "M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
        ],
    ];

    $categories = [
        "All",
        "Real-Time Communications",
        "Artificial Intelligence",
        "Product Engineering",
        "Cloud & Infrastructure",
        "Enterprise Automation",
        "Enterprise Engineering",
    ];
@endphp

<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24" x-data="{ searchTerm: '', selectedCategory: 'All' }">
    <!-- Hero Banner Header -->
    <section class="bg-[#153758] text-white pt-36 pb-16 px-6 border-b border-[#153758] relative overflow-hidden">
        <div class="max-w-7xl mx-auto text-center space-y-4 relative z-10">
            <span class="text-xs font-bold text-[#D9C48F] uppercase tracking-widest bg-[#264868] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Octavia Tech Enterprise Solutions Directory</span>
            </span>

            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                Enterprise Technology Solutions
            </h1>

            <p class="text-[#B4C1CD] text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Modular software architectures, real-time media engines, Generative AI pipelines, and
                high-concurrency cloud frameworks engineered for modern enterprises.
            </p>

            <!-- Search Bar -->
            <div class="pt-6 max-w-xl mx-auto relative">
                <svg class="w-5 h-5 text-[#B4C1CD] absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input
                    type="text"
                    placeholder="Search solutions (e.g., WebRTC, AI, Cloud, SaaS, ERP)..."
                    x-model="searchTerm"
                    class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-[#93A3B2] text-sm focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
                />
            </div>
        </div>
    </section>

    <!-- Category Tabs -->
    <section class="max-w-7xl mx-auto px-6 py-8 border-b border-[#DDE3E9]">
        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            @foreach ($categories as $cat)
                <button
                    @click="selectedCategory = '{{ $cat }}'"
                    :class="selectedCategory === '{{ $cat }}' ? 'bg-[#264868] text-white border-[#264868] shadow-md' : 'bg-white text-[#5C6B7A] border-[#DDE3E9] hover:border-[#DDE3E9] hover:text-[#153758]'"
                    class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap transition-all border"
                >
                    {{ $cat }}
                </button>
            @endforeach
        </div>
    </section>

    <!-- Solutions Cards Grid -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($solutionsList as $sol)
                <a
                    href="/solutions/{{ $sol['slug'] }}"
                    x-show="(selectedCategory === 'All' || selectedCategory === '{{ $sol['category'] }}') && (searchTerm === '' || '{{ strtolower($sol['name']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($sol['desc']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($sol['category']) }}'.includes(searchTerm.toLowerCase()))"
                    class="bg-white rounded-3xl p-8 border border-[#DDE3E9]/80 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#DDE3E9]/60 transition-all duration-300 cursor-pointer flex flex-col justify-between group relative overflow-hidden"
                >
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-[#264868]/10 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-[#D9C48F] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sol['icon'] }}"></path></svg>
                            </div>

                            <span class="text-[10px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-2.5 py-1 rounded-full border border-[#C1A972]/30">
                                {{ $sol['badge'] }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-[#264868] mb-3 group-hover:text-[#153758] transition-colors">
                            {{ $sol['name'] }}
                        </h3>

                        <p class="text-xs text-[#5C6B7A] leading-relaxed mb-6">{{ $sol['desc'] }}</p>
                    </div>

                    <div class="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors">
                        <span>View Solution Architecture</span>
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Bottom Call to Action -->
    <section class="max-w-7xl mx-auto px-6 mt-12">
        <div class="bg-[#153758] text-white rounded-3xl p-10 text-center space-y-4 shadow-xl border border-[#153758]">
            <h2 class="text-2xl sm:text-4xl font-black">Need a Custom Architecture Blueprint?</h2>
            <p class="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto">
                Speak directly with an Octavia principal systems architect to review your performance
                requirements and design a tailored solution roadmap.
            </p>
            <div class="pt-2">
                <button
                    @click="consultationTopic = 'Custom Solution Architecture'; consultationOpen = true"
                    class="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
                >
                    <span>Schedule Architecture Review</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </button>
            </div>
        </div>
    </section>
</div>
@endsection
