@extends('layouts.app')

@section('content')
@php
    $categories = [
        [
            'id' => "web-development",
            'title' => "Web Development Services",
            'badge' => "HEADLESS & SSR",
            'description' => "Engineering lightning-fast web applications, PWA experiences, and scalable enterprise web platforms using React, Next.js, and headless CMS integrations.",
            'icon' => "M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4",
            'subservices' => [
                ['label' => "Custom Web Development", 'href' => "/services/web-development/custom-web-development"],
                ['label' => "Enterprise Web Apps", 'href' => "/services/web-development/enterprise-web-development"],
                ['label' => "Ecommerce Platforms", 'href' => "/services/web-development/ecommerce-development"],
                ['label' => "React & Next.js", 'href' => "/services/web-development/react-js-development"],
                ['label' => "Headless CMS", 'href' => "/services/web-development/headless-cms-development"],
            ]
        ],
        [
            'id' => "ai-agentic-ai",
            'title' => "AI & Agentic AI Solutions",
            'badge' => "AUTONOMOUS AGENTS",
            'description' => "Production Generative AI workflows, custom RAG search engines, fine-tuned LLMs, and autonomous multi-agent systems.",
            'icon' => "M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z",
            'subservices' => [
                ['label' => "Generative AI Solutions", 'href' => "/services/ai-agentic-ai/generative-ai-development"],
                ['label' => "Autonomous AI Agents", 'href' => "/services/ai-agentic-ai/ai-agent-development"],
                ['label' => "Enterprise LLM Fine-Tuning", 'href' => "/services/ai-agentic-ai/llm-fine-tuning"],
                ['label' => "RAG Vector Architecture", 'href' => "/services/ai-agentic-ai/custom-rag-development"],
            ]
        ],
        [
            'id' => "software-development",
            'title' => "Custom Software Engineering",
            'badge' => "ENTERPRISE SCALE",
            'description' => "Bespoke SaaS architectures, legacy code modernizations, microservices backends, and sub-second API integrations.",
            'icon' => "M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z",
            'subservices' => [
                ['label' => "Custom Software", 'href' => "/services/software-development/custom-software-development"],
                ['label' => "Enterprise Modernization", 'href' => "/services/software-development/enterprise-software-development"],
                ['label' => "SaaS Engineering", 'href' => "/services/software-development/saas-development"],
                ['label' => "API Architecture", 'href' => "/services/software-development/api-development-integration"],
            ]
        ],
        [
            'id' => "cloud-data-devops",
            'title' => "Cloud, Data & DevOps",
            'badge' => "MULTI-CLOUD & K8S",
            'description' => "Kubernetes orchestration, Terraform IaC, automated zero-downtime CI/CD pipelines, and 24/7 site reliability engineering.",
            'icon' => "M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9",
            'subservices' => [
                ['label' => "AWS Cloud Services", 'href' => "/services/cloud-data-devops/aws-cloud-services"],
                ['label' => "DevOps Automation", 'href' => "/services/cloud-data-devops/devops-consulting-services"],
                ['label' => "Kubernetes DevSecOps", 'href' => "/services/cloud-data-devops/cloud-security-services"],
                ['label' => "Big Data Engineering", 'href' => "/services/cloud-data-devops/data-engineering-services"],
            ]
        ],
        [
            'id' => "mobile-app-development",
            'title' => "Mobile App Engineering",
            'badge' => "IOS & ANDROID",
            'description' => "High-velocity cross-platform React Native and Flutter apps, offline-first mobile sync, and native iOS/Android SDKs.",
            'icon' => "M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z",
            'subservices' => [
                ['label' => "iOS Native Apps", 'href' => "/services/mobile-app-development/ios-app-development"],
                ['label' => "Android Native Apps", 'href' => "/services/mobile-app-development/android-app-development"],
                ['label' => "Flutter Apps", 'href' => "/services/mobile-app-development/flutter-app-development"],
                ['label' => "React Native", 'href' => "/services/mobile-app-development/react-native-app-development"],
            ]
        ],
        [
            'id' => "it-staff-augmentation",
            'title' => "IT Staff Augmentation",
            'badge' => "48-HR TALENT",
            'description' => "Augment your software development squads with pre-vetted senior software engineers, QA architects, and AI leads.",
            'icon' => "M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z",
            'subservices' => [
                ['label' => "Hire React Engineers", 'href' => "/services/it-staff-augmentation/hire-react-developers"],
                ['label' => "Hire Node.js Leads", 'href' => "/services/it-staff-augmentation/hire-node-js-developers"],
                ['label' => "Hire Python/AI Architects", 'href' => "/services/it-staff-augmentation/hire-python-developers"],
                ['label' => "Hire Cloud DevOps", 'href' => "/services/it-staff-augmentation/hire-devops-engineers"],
            ]
        ],
    ];
@endphp

<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24" x-data="{ searchTerm: '' }">
    <!-- Hero Banner Header -->
    <section class="bg-[#153758] text-white pt-36 pb-16 px-6 border-b border-[#153758] relative overflow-hidden">
        <div class="max-w-7xl mx-auto text-center space-y-4 relative z-10">
            <span class="text-xs font-bold text-[#D9C48F] uppercase tracking-widest bg-[#264868] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Full-Spectrum Engineering Directory</span>
            </span>

            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                Enterprise Technology Services
            </h1>

            <p class="text-[#B4C1CD] text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Explore our full catalog of custom web applications, AI agent frameworks, multi-cloud architectures, and dedicated engineering pods.
            </p>

            <!-- Search Bar -->
            <div class="pt-6 max-w-xl mx-auto relative">
                <svg class="w-5 h-5 text-[#B4C1CD] absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input
                    type="text"
                    placeholder="Search services (e.g., React, AI Agents, Kubernetes, Python)..."
                    x-model="searchTerm"
                    class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-[#93A3B2] text-sm focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
                />
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $cat)
                <div
                    x-show="searchTerm === '' || '{{ strtolower($cat['title']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($cat['description']) }}'.includes(searchTerm.toLowerCase())"
                    class="bg-white rounded-3xl p-8 border border-[#DDE3E9]/80 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#DDE3E9]/60 transition-all duration-300 flex flex-col justify-between group"
                >
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-[#264868]/10 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-[#D9C48F] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $cat['icon'] }}"></path></svg>
                            </div>

                            <span class="text-[10px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-2.5 py-1 rounded-full border border-[#C1A972]/30">
                                {{ $cat['badge'] }}
                            </span>
                        </div>

                        <a href="/services/{{ $cat['id'] }}" class="block">
                            <h3 class="text-xl font-bold text-[#264868] mb-3 group-hover:text-[#153758] transition-colors">
                                {{ $cat['title'] }}
                            </h3>
                        </a>

                        <p class="text-xs text-[#5C6B7A] leading-relaxed mb-6">{{ $cat['description'] }}</p>

                        <!-- Sub-service Pills -->
                        <div class="space-y-1.5 pt-4 border-t border-[#F3F5F7] mb-6">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#93A3B2] block mb-2">Specialized Offerings:</span>
                            @foreach ($cat['subservices'] as $sub)
                                <a
                                    href="{{ $sub['href'] }}"
                                    class="flex items-center justify-between py-1.5 px-2 rounded-lg text-xs font-semibold text-[#153758] hover:bg-[#F3F5F7] hover:text-[#264868] transition-colors"
                                >
                                    <span>{{ $sub['label'] }}</span>
                                    <svg class="w-3.5 h-3.5 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a
                        href="/services/{{ $cat['id'] }}"
                        class="w-full py-3 px-4 rounded-xl bg-[#F3F5F7] group-hover:bg-[#264868] group-hover:text-white text-[#264868] font-bold text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2 text-center"
                    >
                        <span>View {{ $cat['title'] }}</span>
                        <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Bottom CTA Banner -->
    <section class="max-w-7xl mx-auto px-6 mt-8">
        <div class="bg-[#153758] text-white rounded-3xl p-10 text-center space-y-4 shadow-xl border border-[#153758]">
            <h2 class="text-2xl sm:text-4xl font-black">Need a Tailored Technical Team?</h2>
            <p class="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto">
                Schedule a scoping consultation with our engineering managers to discuss sprint allocations and deliverables.
            </p>
            <div class="pt-2">
                <button
                    @click="consultationTopic = 'General Services Scoping'; consultationOpen = true"
                    class="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
                >
                    <span>Request Engineering Proposal</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>
    </section>
</div>
@endsection
