@extends('layouts.app')

@section('content')
<div class="bg-[#FEFEFE] text-[#0F2334] overflow-hidden">
    <!-- 1. Hero Section -->
    <section class="relative pt-36 pb-24 bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#C1A972]/10 via-transparent to-transparent pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-3xl space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-[#C1A972] text-xs font-bold uppercase tracking-wider backdrop-blur-md">
                    <svg class="w-4 h-4 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span>ABOUT OCTAVIA TECH SOLUTIONS</span>
                </div>

                <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-[1.1]">
                    Architecting the Future of{" "}
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-[#C1A972]">
                        Enterprise Software & AI
                    </span>
                </h1>

                <p class="text-lg sm:text-xl text-white/80 leading-relaxed font-normal max-w-2xl">
                    We are a global team of senior software engineers, AI architects, and cloud
                    specialists building mission-critical digital products for high-growth enterprises
                    worldwide.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <button
                        @click="consultationTopic = 'About Us Inquiry'; consultationOpen = true"
                        class="px-7 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-bold hover:bg-white transition-all shadow-xl hover:shadow-2xl hover:scale-[1.02] flex items-center gap-2 text-sm"
                    >
                        <span>Partner With Us</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>

                    <a
                        href="#global"
                        class="px-7 py-4 rounded-xl bg-white/10 text-white font-semibold hover:bg-white/20 transition-all border border-white/15 text-sm backdrop-blur-md"
                    >
                        Explore Global Hubs
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Stats Bar -->
    <section class="relative z-20 -mt-10 max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-xl border border-[#DDE3E9] p-8 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="space-y-1">
                <div class="text-3xl sm:text-4xl font-black text-[#153758] tracking-tight">10+</div>
                <div class="text-xs sm:text-sm font-semibold text-[#52667A]">Years of Engineering Excellence</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl sm:text-4xl font-black text-[#153758] tracking-tight">250+</div>
                <div class="text-xs sm:text-sm font-semibold text-[#52667A]">Enterprise Projects Delivered</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl sm:text-4xl font-black text-[#153758] tracking-tight">150+</div>
                <div class="text-xs sm:text-sm font-semibold text-[#52667A]">Global Tech Experts</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl sm:text-4xl font-black text-[#153758] tracking-tight">99.4%</div>
                <div class="text-xs sm:text-sm font-semibold text-[#52667A]">Client Satisfaction Rate</div>
            </div>
        </div>
    </section>

    <!-- 3. Our Mission & Vision -->
    <section class="py-24 max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758] bg-[#153758]/5 px-3 py-1 rounded-md">
                    OUR MISSION & PURPOSE
                </span>

                <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-[#0F2334]">
                    Empowering Enterprises with High-Performance Tech
                </h2>

                <p class="text-[#52667A] text-lg leading-relaxed">
                    Founded on the belief that complex software should be engineered with extreme
                    precision, Octavia Tech Solutions bridges the gap between ambitious business vision
                    and scalable technical reality.
                </p>

                <p class="text-[#52667A] text-base leading-relaxed">
                    We specialize in custom web applications, cloud-native DevOps architectures, AI &
                    Agentic systems, and dedicated engineering pods. We don't just write code — we build
                    digital infrastructure that drives measurable revenue and efficiency.
                </p>

                <div class="space-y-3 pt-2">
                    @foreach ([
                        '100% Source Code & Intellectual Property Ownership',
                        'SOC2 Type II & HIPAA Security Compliant Engineering',
                        'Sub-300ms Performance & 99.99% Availability SLAs',
                        'Direct Access to Senior Software & AI Architects',
                    ] as $item)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-sm font-bold text-[#0F2334]">{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div class="p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#0F2334] to-[#153758] text-white space-y-8 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="space-y-4">
                        <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest">
                            WHY CLIENTS CHOOSE US
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white">
                            Built for Speed, Security, and Scalability
                        </h3>
                    </div>

                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                                01
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-base">Top 1% Senior Engineers</h4>
                                <p class="text-xs text-white/70 mt-1">
                                    Every candidate passes a 5-stage technical screening evaluating algorithms,
                                    system design, and security.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                                02
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-base">48-Hour Talent Onboarding</h4>
                                <p class="text-xs text-white/70 mt-1">
                                    Rapidly augment your engineering capacity with dedicated pods matched to your
                                    exact tech stack.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-[#C1A972] shrink-0 font-bold">
                                03
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-base">Zero-Data Retention AI</h4>
                                <p class="text-xs text-white/70 mt-1">
                                    Enterprise LLMs and RAG vector search deployed safely inside your private
                                    cloud perimeter.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Core Values Section -->
    <section class="py-24 bg-[#F8FAFC] border-y border-[#E2E8F0]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758]">
                    OUR GUIDING PRINCIPLES
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
                    The Values That Drive Our Engineering
                </h2>
                <p class="text-[#52667A] text-base sm:text-lg">
                    We operate as an extended technology partner, committed to absolute quality and
                    transparent delivery.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $coreValues = [
                        [
                            'title' => 'Engineering Rigor',
                            'description' => 'We do not build minimum viable code; we architect resilient, sub-second enterprise platforms using zero-trust security and clean design patterns.',
                            'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z'
                        ],
                        [
                            'title' => 'Radical Transparency',
                            'description' => 'Zero hidden fees, 100% direct source code ownership, and real-time visibility into Jira backlogs, sprint velocity, and CI/CD pipelines.',
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'
                        ],
                        [
                            'title' => 'Continuous Innovation',
                            'description' => 'Pioneering production AI systems, autonomous Agentic workflows, and cloud-native Kubernetes architectures that keep our clients ahead.',
                            'icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'
                        ],
                        [
                            'title' => 'Global Delivery & Speed',
                            'description' => 'Cross-functional engineering pods operating across US, MENA, Europe, and Asia with guaranteed 48-hour onboarding capabilities.',
                            'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'
                        ],
                    ];
                @endphp

                @foreach ($coreValues as $val)
                    <div class="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-sm hover:shadow-xl hover:border-[#153758]/40 transition-all duration-300 space-y-4 group">
                        <div class="w-12 h-12 rounded-xl bg-[#153758]/5 text-[#153758] flex items-center justify-center group-hover:bg-[#153758] group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $val['icon'] }}"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#0F2334]">{{ $val['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-[#52667A] leading-relaxed">
                            {{ $val['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Company Journey / Milestones -->
    <section class="py-24 max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-[#153758]">
                EVOLUTION & GROWTH
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
                Our Journey of Innovation
            </h2>
            <p class="text-[#52667A] text-base sm:text-lg">
                A decade of scaling software capabilities, engineering teams, and enterprise solutions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ([
                ['year' => '2015', 'title' => 'Company Founded', 'desc' => 'Established as an enterprise software development boutique specializing in custom web and cloud applications.'],
                ['year' => '2018', 'title' => 'Global Scale & Cloud Focus', 'desc' => 'Expanded delivery centers across 3 continents and launched dedicated AWS, Azure & GCP DevOps practices.'],
                ['year' => '2021', 'title' => 'Enterprise Digital Transformation', 'desc' => 'Crossed 200+ completed enterprise software products across Healthcare, Fintech, and SaaS sectors.'],
                ['year' => '2024+', 'title' => 'AI & Agentic Engineering', 'desc' => 'Pioneered custom RAG vector search, LLM fine-tuning, and autonomous multi-agent software solutions.'],
            ] as $ms)
                <div class="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-md space-y-3 relative">
                    <div class="text-2xl font-black text-[#C1A972] font-mono">{{ $ms['year'] }}</div>
                    <h3 class="text-lg font-bold text-[#0F2334]">{{ $ms['title'] }}</h3>
                    <p class="text-xs text-[#52667A] leading-relaxed">{{ $ms['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 6. Leadership Team -->
    <section class="py-24 bg-[#F8FAFC] border-t border-[#E2E8F0]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#153758]">
                    EXECUTIVE LEADERSHIP
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-[#0F2334] tracking-tight">
                    Guided by Senior Tech Visionaries
                </h2>
                <p class="text-[#52667A] text-base sm:text-lg">
                    Our leadership team combines deep technical expertise with strategic enterprise vision.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ([
                    ['name' => 'Alexandre Mercer', 'role' => 'Chief Executive Officer', 'tag' => 'Executive Leadership', 'bio' => '15+ years leading enterprise digital transformation and scaling technology teams across Fortune 500 companies.'],
                    ['name' => 'Elena Rostova', 'role' => 'Chief Technology Officer', 'tag' => 'Engineering Lead', 'bio' => 'Former Cloud Systems Architect specializing in microservices, distributed AI vector databases, and zero-trust security.'],
                    ['name' => 'Marcus Vance', 'role' => 'VP of AI & Agentic Solutions', 'tag' => 'AI Strategy', 'bio' => 'Pioneer in LLM fine-tuning, Autonomous Multi-Agent frameworks, and enterprise Machine Learning Ops.'],
                ] as $member)
                    <div class="p-8 rounded-2xl bg-white border border-[#E2E8F0] shadow-md space-y-4">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-[#153758]/10 text-[#153758]">
                            {{ $member['tag'] }}
                        </span>
                        <h3 class="text-xl font-bold text-[#0F2334]">{{ $member['name'] }}</h3>
                        <div class="text-xs font-semibold text-[#C1A972] uppercase tracking-wider">
                            {{ $member['role'] }}
                        </div>
                        <p class="text-xs text-[#52667A] leading-relaxed">{{ $member['bio'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. Global Locations (GlobalPresenceSection) -->
    <section class="py-24 bg-[#0F2334] text-white border-t border-[#153758]/30" id="global">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#B4C1CD]">
                    Worldwide Reach
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                    Our Global Presence
                </h2>
                <p class="text-[#B4C1CD] text-base sm:text-lg">
                    Delivering technology solutions across 4 countries and 3 continents — with local
                    expertise and global scale.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ([
                    ['country' => 'United States', 'tag' => 'HQ', 'title' => 'Headquarters & Innovation Hub', 'address' => '6100 Channingway Blvd, Columbus, OH 43232, USA'],
                    ['country' => 'West Africa', 'tag' => 'Innovation Center', 'title' => 'West Africa Innovation Center', 'address' => 'Sacré cœur 1, suite 8410, Dakar, Senegal, West Africa - 27013'],
                    ['country' => 'Dubai, UAE', 'tag' => 'MENA Hub', 'title' => 'Middle East & North Africa Hub', 'address' => 'Dubai Internet City, Building 12, Dubai, United Arab Emirates'],
                    ['country' => 'India', 'tag' => 'R&D Center', 'title' => 'Engineering & Development Center', 'address' => 'UNIT No - 103 1st Floor, TOWER-C, Noida One, Sector 62, Noida, UP 201309, India'],
                ] as $off)
                    <div class="p-8 rounded-3xl bg-white/5 border border-white/10 hover:border-[#264868]/80 hover:bg-white/10 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-10 h-10 rounded-xl bg-[#264868]/20 text-[#B4C1CD] flex items-center justify-center font-bold group-hover:bg-[#264868] group-hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <span class="text-[10px] font-extrabold uppercase px-2.5 py-1 rounded-full bg-[#153758]/50 text-[#D9C48F] border border-[#264868]/40">
                                    {{ $off['tag'] }}
                                </span>
                            </div>

                            <h3 class="text-2xl font-bold text-white mb-1 group-hover:text-[#D9C48F] transition-colors">
                                {{ $off['country'] }}
                            </h3>
                            <h4 class="text-xs font-bold text-[#B4C1CD] mb-4">{{ $off['title'] }}</h4>
                            <p class="text-xs text-[#B4C1CD] leading-relaxed font-mono">{{ $off['address'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 8. Call to Action Banner -->
    <section class="py-20 bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] text-white">
        <div class="max-w-5xl mx-auto px-6 text-center space-y-8">
            <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                Ready to Build Your Next Digital Innovation?
            </h2>
            <p class="text-[#B4C1CD] text-lg max-w-2xl mx-auto">
                Schedule a free consultation with our senior solutions architects to discuss your custom
                software, AI, or cloud engineering roadmap.
            </p>
            <button
                @click="consultationTopic = 'About Us Bottom CTA'; consultationOpen = true"
                class="px-8 py-4 rounded-xl bg-[#C1A972] text-[#0F2334] font-bold hover:bg-white transition-all shadow-xl hover:shadow-2xl hover:scale-105 inline-flex items-center gap-2 text-sm"
            >
                <span>Talk to an Expert Engineer →</span>
            </button>
        </div>
    </section>
</div>
@endsection
