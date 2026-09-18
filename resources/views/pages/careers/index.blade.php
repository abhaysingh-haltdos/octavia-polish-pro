@extends('layouts.app')

@section('title', 'Careers & Engineering Culture | Octavia Tech Solutions')
@section('description', 'Build your future at Octavia Tech Solutions. Explore open engineering, design, marketing, and support roles in a high-performance culture.')

@section('content')
<div class="bg-[#FEFEFE] text-[#0F2334] overflow-hidden">

    <!-- 1. Hero Section -->
    <section class="relative pt-36 pb-20 lg:pb-28 bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#0F2334] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#C1A972]/15 via-transparent to-transparent pointer-events-none"></div>
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-[#264868]/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 left-0 w-80 h-80 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <!-- Breadcrumb Pill -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/15 text-[#D9C48F] text-xs font-bold uppercase tracking-widest backdrop-blur-md mb-6">
                <span class="w-2 h-2 rounded-full bg-[#C1A972] animate-pulse"></span>
                <span>CAREERS AT OCTAVIA TECH SOLUTIONS</span>
            </div>

            <!-- Headline -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-[1.1] max-w-4xl mx-auto">
                Build your Future. Grow with Purpose. <br/>
                Make a <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-[#D9C48F] to-[#C1A972] uppercase font-black">Career</span>
            </h1>

            <!-- Subtitle -->
            <p class="mt-6 text-base sm:text-xl text-white/80 leading-relaxed font-normal max-w-2xl mx-auto">
                Join an elite team of senior engineers, AI architects, designers, and growth strategists building mission-critical software for high-growth enterprises worldwide.
            </p>

            <!-- CTA Actions -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a
                    href="#open-roles"
                    class="px-8 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-extrabold hover:bg-white transition-all duration-300 shadow-xl hover:shadow-2xl hover:scale-105 flex items-center gap-2 text-sm"
                >
                    <span>Discover Open Roles</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
                <a
                    href="#culture"
                    class="px-8 py-4 rounded-xl bg-white/10 text-white font-bold hover:bg-white/20 transition-all border border-white/15 text-sm backdrop-blur-md"
                >
                    Our Culture & Values
                </a>
            </div>

            <!-- Hero Showcase Banner -->
            <div class="mt-14 max-w-5xl mx-auto">
                <div class="relative rounded-3xl overflow-hidden border border-white/20 shadow-2xl bg-gradient-to-r from-[#153758] to-[#264868] p-8 sm:p-12 text-left">
                    <div class="absolute inset-0 bg-cover bg-center opacity-15 mix-blend-overlay" style="background-image: url('/assets/octavia-logo.png')"></div>
                    <div class="relative z-10 grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-8 text-center divide-y sm:divide-y-0 sm:divide-x divide-white/15">
                        <div class="space-y-1 pt-4 sm:pt-0">
                            <div class="text-3xl sm:text-4xl font-black text-[#D9C48F]">100%</div>
                            <div class="text-xs text-white/80 uppercase font-semibold tracking-wider">Engineering Ownership</div>
                        </div>
                        <div class="space-y-1 pt-4 sm:pt-0">
                            <div class="text-3xl sm:text-4xl font-black text-[#D9C48F]">20+</div>
                            <div class="text-xs text-white/80 uppercase font-semibold tracking-wider">Countries Served</div>
                        </div>
                        <div class="space-y-1 pt-4 sm:pt-0">
                            <div class="text-3xl sm:text-4xl font-black text-[#D9C48F]">4 Hubs</div>
                            <div class="text-xs text-white/80 uppercase font-semibold tracking-wider">US, Senegal, UAE, India</div>
                        </div>
                        <div class="space-y-1 pt-4 sm:pt-0">
                            <div class="text-3xl sm:text-4xl font-black text-[#D9C48F]">4.9 / 5</div>
                            <div class="text-xs text-white/80 uppercase font-semibold tracking-wider">Employee Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 2. Discover Open Roles Section (Alpine-powered Category Filter) -->
    <section class="py-20 lg:py-28 bg-[#F8FAFC]" id="open-roles" x-data="{
        activeTab: 'all',
        searchQuery: '',
        matches(dept, title, desc) {
            const query = this.searchQuery.toLowerCase().trim();
            const matchesCategory = this.activeTab === 'all' || dept.toLowerCase().includes(this.activeTab.toLowerCase());
            const matchesSearch = !query || title.toLowerCase().includes(query) || desc.toLowerCase().includes(query) || dept.toLowerCase().includes(query);
            return matchesCategory && matchesSearch;
        }
    }">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758] px-3 py-1 rounded-full bg-[#153758]/10 inline-block">
                    JOIN OCTAVIA TEAM
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
                    Discover Open Roles
                </h2>
                <p class="text-[#52667A] text-base sm:text-lg">
                    Find the role where you can make an immediate impact, solve real problems, and accelerate your career.
                </p>
            </div>

            <!-- Filters Bar -->
            <div class="mb-10 flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Department Pills -->
                <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-none">
                    <button
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        All Roles ({{ count($careers) }})
                    </button>
                    <button
                        @click="activeTab = 'Engineering'"
                        :class="activeTab === 'Engineering' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        Engineering
                    </button>
                    <button
                        @click="activeTab = 'Design'"
                        :class="activeTab === 'Design' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        Design
                    </button>
                    <button
                        @click="activeTab = 'Support'"
                        :class="activeTab === 'Support' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        BD & Support
                    </button>
                    <button
                        @click="activeTab = 'Marketing'"
                        :class="activeTab === 'Marketing' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        Marketing & SEO
                    </button>
                    <button
                        @click="activeTab = 'Quality'"
                        :class="activeTab === 'Quality' ? 'bg-[#153758] text-white shadow-md' : 'bg-white text-[#52667A] hover:text-[#0F2334] border border-[#E2E8F0]'"
                        class="px-5 py-2.5 rounded-xl font-bold text-xs whitespace-nowrap transition-all duration-200"
                    >
                        Quality Assurance
                    </button>
                </div>

                <!-- Instant Search Input -->
                <div class="relative w-full md:w-72 shrink-0">
                    <input
                        type="text"
                        x-model="searchQuery"
                        placeholder="Search roles or skills..."
                        class="w-full px-4 py-2.5 pl-10 rounded-xl bg-white border border-[#E2E8F0] text-[#0F2334] text-xs focus:outline-none focus:ring-2 focus:ring-[#153758] transition-all"
                    />
                    <svg class="w-4 h-4 text-[#52667A] absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Job Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($careers as $slug => $job)
                    <div
                        x-show="matches('{{ $job['department'] }}', '{{ $job['title'] }}', '{{ $job['shortDescription'] }}')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="p-7 rounded-2xl bg-white border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 group flex flex-col justify-between"
                    >
                        <div class="space-y-4">
                            <!-- Category Badge -->
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider px-3 py-1 rounded-full bg-[#153758]/10 text-[#153758]">
                                    {{ $job['badge'] ?? $job['department'] }}
                                </span>
                                <span class="text-[11px] font-semibold text-[#52667A] flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Actively Hiring
                                </span>
                            </div>

                            <!-- Role Title -->
                            <h3 class="text-xl font-bold text-[#0F2334] group-hover:text-[#153758] transition-colors">
                                <a href="{{ url('/career/' . $slug) }}">
                                    {{ $job['title'] }}
                                </a>
                            </h3>

                            <!-- Short Description -->
                            <p class="text-xs text-[#52667A] leading-relaxed line-clamp-3">
                                {{ $job['shortDescription'] }}
                            </p>

                            <!-- Key Items Grid (Domain, Experience, Location) -->
                            <div class="pt-3 border-t border-[#F1F5F9] space-y-2 text-xs text-[#52667A]">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-center text-[#153758] shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <span class="font-medium truncate">{{ $job['department'] }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-center text-[#153758] shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <span class="font-medium">{{ $job['experience'] }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-center text-[#153758] shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <span class="font-medium truncate">{{ $job['location'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="pt-6 mt-6 border-t border-[#F1F5F9]">
                            <a
                                href="{{ url('/career/' . $slug) }}"
                                class="w-full py-3 px-4 rounded-xl bg-[#F8FAFC] hover:bg-[#153758] text-[#153758] hover:text-white font-bold text-xs flex items-center justify-between transition-all duration-300 group/btn border border-[#E2E8F0] hover:border-[#153758]"
                            >
                                <span>View Details</span>
                                <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- 3. Culture Section: "More Than A Workplace" (Navy Theme with Gold Accents) -->
    <section class="py-24 bg-[#0F2334] text-white relative overflow-hidden" id="culture">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#153758]/50 via-transparent to-transparent pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left Column: Visual Culture Grid -->
                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h4 class="text-base font-bold text-white">Innovation First</h4>
                            <p class="text-xs text-[#B4C1CD] leading-relaxed">Work with AI agents, microservices, vector DBs, and modern cloud stacks.</p>
                        </div>
                        <div class="p-6 rounded-3xl bg-gradient-to-br from-[#153758] to-[#264868] border border-white/15 space-y-3">
                            <div class="text-3xl font-black text-[#D9C48F]">100%</div>
                            <div class="text-xs text-white font-bold uppercase tracking-wider">Zero Micromanagement</div>
                            <p class="text-xs text-white/80 leading-relaxed">High autonomy, transparent roadmaps, and direct architectural impact.</p>
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="p-6 rounded-3xl bg-gradient-to-br from-[#264868] to-[#153758] border border-white/15 space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h4 class="text-base font-bold text-white">Learning Stipend</h4>
                            <p class="text-xs text-white/80 leading-relaxed">Annual sponsorship for AWS/GCP certifications and tech courses.</p>
                        </div>
                        <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md space-y-3">
                            <div class="text-3xl font-black text-[#D9C48F]">20+</div>
                            <div class="text-xs text-white font-bold uppercase tracking-wider">Global Client Hubs</div>
                            <p class="text-xs text-[#B4C1CD] leading-relaxed">Collaborate with enterprise teams across North America, Europe, and MENA.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Culture Narrative & 6 Pillars -->
                <div class="lg:col-span-7 space-y-8">
                    <div class="space-y-4">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#D9C48F] px-3.5 py-1 rounded-full bg-white/10 border border-white/15 inline-block">
                            BEYOND THE WORKPLACE
                        </span>
                        <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                            More Than A <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D9C48F] to-[#C1A972]">Workplace</span>
                        </h2>
                        <p class="text-[#B4C1CD] text-base leading-relaxed">
                            At Octavia Tech Solutions, you'll work alongside ambitious builders, architects, and engineers solving real-world challenges for high-growth enterprises worldwide.
                        </p>
                    </div>

                    <!-- 6 Key Features Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Fast Career Growth</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Clear paths for advancement into technical lead or architecture roles.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Global Clients</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Build products and platforms used by users across 20+ countries.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Ownership Culture</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Take charge of your engineering decisions, code, and project outcomes.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Latest Tech Stacks</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Work with distributed systems, Kubernetes, and enterprise AI models.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Learning Budget</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Annual stipend for technical certifications, book allowances, and courses.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-9 h-9 rounded-xl bg-[#153758] border border-[#264868] text-[#D9C48F] flex items-center justify-center shrink-0 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white">Collaborative Team</h4>
                                <p class="text-xs text-[#B4C1CD] leading-relaxed">Learn directly from senior architects through daily code reviews and mentorship.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. What Makes Us Different Section -->
    <section class="py-20 lg:py-24 bg-white border-b border-[#E2E8F0]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758]">THE OCTAVIA DIFFERENCE</span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#0F2334] tracking-tight">What Makes Us Different</h2>
                <p class="text-[#52667A] text-sm sm:text-base">We prioritize genuine engineering craft over vanity metrics.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F2334]">Innovation First</h3>
                    <p class="text-xs text-[#52667A] leading-relaxed">
                        Work on AI, enterprise SaaS, cloud modernization, and mission-critical architectures that shape the future of enterprise software.
                    </p>
                </div>

                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F2334]">Real Impact</h3>
                    <p class="text-xs text-[#52667A] leading-relaxed">
                        Build software deployed to millions of active users and critical corporate workflows worldwide. Your code directly impacts business outcomes.
                    </p>
                </div>

                <div class="p-8 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0] hover:border-[#153758]/40 hover:shadow-xl transition-all duration-300 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#153758] text-[#D9C48F] flex items-center justify-center font-bold shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0F2334]">Continuous Growth</h3>
                    <p class="text-xs text-[#52667A] leading-relaxed">
                        Learn directly from veteran architects and engineering leadership in a fast-paced environment with zero bureaucratic friction.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. "Life at Octavia" 9-Card Value Matrix -->
    <section class="py-24 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758] px-3.5 py-1 rounded-full bg-[#153758]/10 inline-block">
                    LIFE AT OCTAVIA
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
                    Where Great Talent Builds Exceptional Products
                </h2>
                <p class="text-[#52667A] text-base sm:text-lg">
                    Join a team that values curiosity, ownership, collaboration, and relentless engineering quality.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $values = [
                        ['num' => '01', 'title' => 'Meaningful Projects', 'desc' => 'Work on enterprise AI, cloud modernization, FinTech platforms, and custom ERP systems solving mission-critical real world problems.'],
                        ['num' => '02', 'title' => 'Ownership from Day One', 'desc' => 'Take responsibility for features, technical decisions, and client delivery. We trust engineers to make decisions and drive impact.'],
                        ['num' => '03', 'title' => 'Continuous Learning', 'desc' => 'Grow through mentorship, technical workshops, cloud certifications, regular code reviews, and deep dive architecture sessions.'],
                        ['num' => '04', 'title' => 'Global Exposure', 'desc' => 'Collaborate directly with founders, CTOs, and enterprise product teams across North America, Europe, Africa, and the Middle East.'],
                        ['num' => '05', 'title' => 'Innovation Driven', 'desc' => 'Experiment with emerging technologies, multi-agent frameworks, and vector search to push the boundary of enterprise software.'],
                        ['num' => '06', 'title' => 'Collaborative Culture', 'desc' => 'Work alongside talented developers, UI/UX designers, and solutions architects who believe great products are built together.'],
                        ['num' => '07', 'title' => 'Recognition & Growth', 'desc' => 'High performance is rewarded through clear promotion ladders, merit-based bonuses, leadership opportunities, and recognition.'],
                        ['num' => '08', 'title' => 'Work Life Integration', 'desc' => 'We practice sustainable high productivity with hybrid flexibility, wellness initiatives, paid time off, and time to recharge.'],
                        ['num' => '09', 'title' => 'Celebrate Every Win', 'desc' => 'From major production launches and client milestones to team retreats and celebrations, we make time to acknowledge shared success.'],
                    ];
                @endphp

                @foreach ($values as $item)
                    <div class="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-sm hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between">
                        <div class="space-y-3">
                            <span class="text-sm font-black text-[#C1A972] tracking-wider">{{ $item['num'] }}.</span>
                            <h3 class="text-lg font-bold text-[#0F2334]">{{ $item['title'] }}</h3>
                            <p class="text-xs text-[#52667A] leading-relaxed">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. General Application / Resume Drop CTA Section -->
    <section class="py-20 bg-gradient-to-r from-[#0F2334] via-[#153758] to-[#0F2334] text-white">
        <div class="max-w-5xl mx-auto px-6 text-center space-y-8">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-[#D9C48F] text-xs font-bold uppercase tracking-widest">
                <span>TALENT NETWORK</span>
            </div>

            <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight">
                Don't See The Right Role? <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-[#D9C48F] to-[#C1A972]">Drop Your Resume</span>
            </h2>

            <p class="text-[#B4C1CD] text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                We are always seeking exceptional software engineers, AI researchers, designers, and tech consultants. Send your resume directly to our talent acquisition team.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a
                    href="mailto:hr@octaviatechs.com"
                    class="px-8 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-extrabold hover:bg-white transition-all shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center gap-2 text-sm"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>Email hr@octaviatechs.com</span>
                </a>
                <a
                    href="{{ url('/contact') }}"
                    class="px-8 py-4 rounded-xl bg-white/10 text-white font-bold hover:bg-white/20 transition-all border border-white/15 text-sm backdrop-blur-md"
                >
                    General Inquiry
                </a>
            </div>
        </div>
    </section>

</div>
@endsection