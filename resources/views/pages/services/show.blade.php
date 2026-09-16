@extends('layouts.app')

@php
    $category = $service['serviceCategory'] ?? 'Enterprise Service';
    $pageTitle = ($service['metaTitle'] ?? ($service['hero']['title'] ?? $category)) . ' | Octavia Tech Solutions';
    $pageDescription = $service['seo']['metaDescription'] ?? ($service['hero']['description'] ?? 'Enterprise IT and software engineering solutions tailored to your operational goals.');

    // 1. Hero Content
    $heroBadge = $service['hero']['badge'] ?? $category;
    $heroTitle = $service['hero']['title'] ?? $category;
    $heroHighlight = $service['hero']['titleHighlight'] ?? 'Services';
    $heroDesc = $service['hero']['description'] ?? 'Deploy resilient, high-converting digital platforms engineered with modern frameworks, cloud elasticity, and enterprise security.';
    $primaryCta = $service['hero']['primaryCtaText'] ?? 'Get FREE consultation';
    $secondaryCta = $service['hero']['secondaryCtaText'] ?? 'Explore Approach';
    $heroTags = !empty($service['hero']['tags']) ? $service['hero']['tags'] : [
        'Tailored Architecture',
        'Enterprise Security & SLA',
        'Sub-Second Loading',
        'Scalable Cloud Infrastructure'
    ];

    // 2. Stats ("By the Numbers")
    $statsBadge = $service['stats']['badge'] ?? 'BY THE NUMBERS';
    $statsHeading = $service['stats']['heading'] ?? "Why {$category} Matters";
    $statsNumbers = !empty($service['stats']['numbers']) ? $service['stats']['numbers'] : [
        [
            'value' => '0.4s',
            'label' => 'Average Page Load Speed',
            'description' => 'Sub-second response achieved through modern server-side rendering and edge CDN caching.',
            'source' => 'Google Core Web Vitals Benchmark'
        ],
        [
            'value' => '99.99%',
            'label' => 'Operational Uptime SLA',
            'description' => 'Guaranteed enterprise platform availability with automated failover and elastic cloud architecture.',
            'source' => 'Enterprise SLA Metric'
        ],
        [
            'value' => '100%',
            'label' => 'Clean Code Guarantee',
            'description' => 'Zero technical debt with modular architecture, strict type safety, and automated test coverage.',
            'source' => 'Engineering Standard'
        ]
    ];

    // 3. Overview Content
    $overviewBadge = $service['overview']['badge'] ?? 'SERVICE OVERVIEW';
    $overviewHeading = $service['overview']['heading'] ?? "Engineering Modern {$category} Infrastructure";
    $overviewLead = $service['overview']['leadParagraph'] ?? "Modern enterprise platforms require continuous uptime, rapid response cycles, and scalable architectures that accommodate explosive user growth.";
    $overviewSecondary = $service['overview']['secondaryParagraph'] ?? "Our engineering practice unites seasoned architects and developers to build performant, maintainable, and highly secure digital solutions tailored to your operational workflows.";

    // 4. Challenges ("Why It Matters")
    $challengesBadge = $service['challenges']['badge'] ?? 'WHY IT MATTERS';
    $challengesHeading = $service['challenges']['heading'] ?? "Why {$category} Matters for Modern Businesses";
    $challengesSubheading = $service['challenges']['subheading'] ?? "Technology decisions directly impact business growth, user retention, operational velocity, and security.";
    $challengesList = !empty($service['challenges']['challenges']) ? $service['challenges']['challenges'] : [
        [
            'category' => 'Efficiency',
            'issue' => 'Generate Measurable Revenue Growth',
            'description' => 'Connect every feature directly to business outcomes and user engagement.'
        ],
        [
            'category' => 'High-Intent Reach',
            'issue' => 'Reach & Engage High-Intent Audiences',
            'description' => 'Deliver fast, reliable experiences to users searching for solutions.'
        ],
        [
            'category' => 'Lower Bounce Rates',
            'issue' => 'Reduce Bounce Rates & Abandonment',
            'description' => 'Sub-second load speeds keep visitors engaged on all viewports and mobile devices.'
        ],
        [
            'category' => 'Scalability',
            'issue' => 'Scale Rapidly with Cloud Infrastructure',
            'description' => 'Serverless and elastic backends expand seamlessly during demand spikes.'
        ],
        [
            'category' => 'ROI Maximization',
            'issue' => 'Maximize Digital ROI & Conversion',
            'description' => 'Strategic UI layouts and conversion-rate optimization turn visitors into high-value clients.'
        ],
        [
            'category' => 'Competitive Edge',
            'issue' => 'Outperform Competitors in User Experience',
            'description' => 'Modern technical stack delivers a polished experience setting your brand apart.'
        ]
    ];

    // 5. Features ("Our Services / Capabilities")
    $featuresBadge = $service['features']['badge'] ?? 'OUR CAPABILITIES';
    $featuresHeading = $service['features']['heading'] ?? "{$category} We Offer";
    $featuresSubheading = $service['features']['subheading'] ?? "Comprehensive capabilities engineered across modern frameworks, cloud elasticity, and enterprise security.";
    $featuresList = !empty($service['features']['features']) ? $service['features']['features'] : [
        [
            'title' => "{$category} Solution",
            'badge' => 'Core Service',
            'description' => "Bespoke engineering designed around your exact operational workflows and business requirements.",
            'points' => ["Custom Architecture & Strategy", "Modular Component Design", "Business-Focused Workflows"]
        ],
        [
            'title' => "Enterprise System Security",
            'badge' => 'Compliance',
            'description' => "Integrated authentication, role-based access control, data encryption, and OWASP compliance.",
            'points' => ["SSO & MFA Integration", "Data Encryption at Rest & In Transit", "Regular Security Audits"]
        ],
        [
            'title' => "High-Performance Architecture",
            'badge' => 'Sub-Second',
            'description' => "Optimized server rendering, bundle splitting, and global edge CDN caching for sub-second speeds.",
            'points' => ["Sub-Second Response Latency", "Core Web Vitals Optimization", "Edge Computing & Caching"]
        ],
        [
            'title' => "Custom API & Middleware",
            'badge' => 'Integration',
            'description' => "Connect third-party databases, CRMs, ERPs, and payment gateways seamlessly.",
            'points' => ["RESTful & GraphQL APIs", "Webhook & Event Architecture", "Enterprise CRM/ERP Sync"]
        ],
        [
            'title' => "Conversion Rate Optimization",
            'badge' => 'Growth',
            'description' => "Data-driven UI design and optimized user journeys to maximize customer retention and conversion.",
            'points' => ["User Journey Optimization", "Accessible UI Components", "A/B Testing Readiness"]
        ],
        [
            'title' => "24/7 Managed SLA Support",
            'badge' => 'SRE Support',
            'description' => "Continuous uptime tracking, security updates, disaster recovery, and guaranteed response SLAs.",
            'points' => ["24/7 Health Monitoring", "Zero-Downtime Patching", "Dedicated Solution Architect"]
        ]
    ];

    // 6. FAQs
    $faqsList = !empty($service['faq']['faqs']) ? $service['faq']['faqs'] : [
        [
            'question' => "What is included in {$category}?",
            'answer' => "We provide complete end-to-end delivery including architectural discovery, UI/UX design, custom engineering, automated QA, cloud deployment, and 24/7 ongoing SLA support."
        ],
        [
            'question' => "How quickly can we start the technical engagement?",
            'answer' => "Following our initial technical discovery call, our senior engineering squad prepares an architecture proposal within 48 hours and can begin sprint zero within 1 week."
        ],
        [
            'question' => "How do you handle project IP and code ownership?",
            'answer' => "You retain 100% ownership of all source code, design assets, and intellectual property. Everything is transferred to your private repositories throughout development."
        ],
        [
            'question' => "Do you provide ongoing post-launch maintenance and support?",
            'answer' => "Yes! We offer flexible SLA support packages covering proactive performance monitoring, security patches, bug fixes, and continuous feature expansion."
        ]
    ];
@endphp

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('content')
<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white" x-data="{ openFaq: 0 }">

    <!-- ===================================================
         SECTION 1: HERO SECTION (Centered Majestic Dark Navy)
         =================================================== -->
    <section class="bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white pt-32 sm:pt-36 pb-20 px-6 relative overflow-hidden border-b border-[#153758]">
        <!-- Vector Mesh Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                    <pattern id="hero-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#C1A972" stroke-width="0.75" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
        </div>

        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10 text-center flex flex-col items-center">
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#C1A972]/15 border border-[#C1A972]/35 text-[#C1A972] text-xs font-bold uppercase tracking-widest mb-6">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/></svg>
                <span>{{ $heroBadge }}</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.14] max-w-4xl mb-6">
                {{ $heroTitle }} <span class="text-[#C1A972]">{{ $heroHighlight }}</span>
            </h1>

            <!-- Narrative Description -->
            <p class="text-[#B4C1CD] text-base sm:text-lg leading-relaxed max-w-2xl mb-8">
                {{ $heroDesc }}
            </p>

            <!-- Call to Actions -->
            <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
                <button
                    @click="$dispatch('open-consultation', { topic: 'Service Inquiry: {{ addslashes($category) }}' })"
                    class="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#D9C48F] text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl shadow-[#C1A972]/20 flex items-center justify-center gap-2 cursor-pointer hover:scale-[1.02]"
                >
                    <span>{{ $primaryCta }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </button>
                <a
                    href="#approach"
                    class="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all text-center flex items-center justify-center gap-2"
                >
                    <span>{{ $secondaryCta }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </a>
            </div>

            <!-- Trust Tags Row -->
            <div class="pt-10 border-t border-white/10 flex flex-wrap items-center justify-center gap-6 sm:gap-8 text-xs text-[#B4C1CD] font-semibold mt-10 w-full max-w-3xl">
                @foreach ($heroTags as $tag)
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        <span>{{ $tag }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 2: BY THE NUMBERS (Elevated Floating Stats Card)
         =================================================== -->
    <section class="max-w-7xl mx-auto px-6 -mt-10 relative z-20 mb-16">
        <div class="bg-white border border-[#DDE3E9]/80 rounded-3xl p-8 sm:p-10 shadow-xl shadow-[#DDE3E9]/50">
            <div class="text-center mb-8">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
                    {{ $statsBadge }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#264868] mt-3">
                    {{ $statsHeading }}
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-{{ count($statsNumbers) >= 3 ? '3' : '2' }} gap-6">
                @foreach ($statsNumbers as $stat)
                    <div class="p-8 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 text-center flex flex-col items-center justify-center space-y-2 hover:border-[#C1A972] transition-all">
                        <span class="text-4xl sm:text-5xl font-black text-[#264868] tracking-tight">
                            {{ $stat['value'] }}
                        </span>
                        <span class="text-xs sm:text-sm font-bold text-[#153758] max-w-xs leading-snug">
                            {{ $stat['label'] }}
                        </span>
                        @if (!empty($stat['description']))
                            <p class="text-[11px] text-[#5C6B7A] leading-relaxed max-w-xs pt-1">
                                {{ $stat['description'] }}
                            </p>
                        @endif
                        @if (!empty($stat['source']))
                            <span class="text-[10px] uppercase font-bold text-[#93A3B2] tracking-wider pt-2">
                                Source: {{ $stat['source'] }}
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 3: SERVICE OVERVIEW / VISION
         =================================================== -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 space-y-4">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    {{ $overviewBadge }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-[#264868] tracking-tight leading-tight">
                    {{ $overviewHeading }}
                </h2>
            </div>

            <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-3xl border border-[#DDE3E9]/80 shadow-md space-y-4 text-[#153758] text-xs sm:text-sm leading-relaxed">
                <p class="text-base sm:text-lg font-bold text-[#264868] leading-snug">
                    {{ $overviewLead }}
                </p>
                <p class="text-[#5C6B7A]">
                    {{ $overviewSecondary }}
                </p>
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 4: WHY IT MATTERS (Proven Scenarios / Challenges Grid)
         =================================================== -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                {{ $challengesBadge }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">
                {{ $challengesHeading }}
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                {{ $challengesSubheading }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($challengesList as $idx => $item)
                <div class="bg-white border border-[#DDE3E9] hover:border-[#C1A972] rounded-3xl p-6 sm:p-8 shadow-sm flex flex-col justify-between space-y-4 transition-all duration-200 hover:-translate-y-1">
                    <div class="space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center font-extrabold text-sm border border-[#C1A972]/30 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/></svg>
                        </div>
                        <div>
                            @if (!empty($item['category']))
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#C1A972] bg-[#264868]/10 px-2 py-0.5 rounded-md mb-2 inline-block">
                                    {{ $item['category'] }}
                                </span>
                            @endif
                            <h3 class="text-lg font-bold text-[#264868] mb-2 leading-snug">
                                {{ $item['issue'] }}
                            </h3>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                    @if (!empty($item['impact']))
                        <div class="pt-3 border-t border-[#F3F5F7] text-[11px] font-medium text-[#153758] flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                            <span>{{ $item['impact'] }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===================================================
         SECTION 5: EVERYTHING INCLUDED (Core Capabilities - Dark Navy Section)
         =================================================== -->
    <section class="bg-[#153758] text-white py-24 px-6 border-t border-b border-[#153758] relative">
        <div class="max-w-7xl mx-auto space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C1A972]">
                    {{ $featuresBadge }}
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                    {{ $featuresHeading }}
                </h2>
                <p class="text-[#B4C1CD] text-sm sm:text-base">
                    {{ $featuresSubheading }}
                </p>
            </div>

            <!-- Features Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuresList as $idx => $feat)
                    <div class="bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 rounded-3xl p-8 transition-all duration-300 flex flex-col justify-between group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors border border-[#C1A972]/30 font-bold shadow-md">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/></svg>
                                </div>
                                @if (!empty($feat['badge']))
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#C1A972] bg-white/10 px-2.5 py-1 rounded-md">
                                        {{ $feat['badge'] }}
                                    </span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-white group-hover:text-[#C1A972] transition-colors">
                                {{ $feat['title'] }}
                            </h3>
                            <p class="text-xs text-[#B4C1CD] leading-relaxed">
                                {{ $feat['description'] }}
                            </p>

                            @if (!empty($feat['points']))
                                <ul class="space-y-2 border-t border-white/10 pt-4 text-xs text-[#DDE3E9]">
                                    @foreach ($feat['points'] as $pt)
                                        <li class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                            <span>{{ $pt }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Sub-breakdown: Frontend Architecture & Backend Security Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8">
                <!-- Frontend Architecture Card -->
                <div class="bg-[#0F2334]/90 border border-[#264868]/80 rounded-3xl p-8 sm:p-10 shadow-2xl space-y-4">
                    <span class="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full flex items-center gap-1.5 w-max">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5"/></svg>
                        <span>FRONTEND ARCHITECTURE</span>
                    </span>
                    <h3 class="text-2xl font-bold text-white">Sub-Second Loading &amp; Modern UI</h3>
                    <h4 class="text-xs font-bold text-[#C1A972]">Deliver Frictionless Experiences Across All Viewports</h4>
                    <p class="text-xs text-[#B4C1CD] leading-relaxed">
                        Modern frontend engineering ensures high Core Web Vitals, server-side rendering, and responsive accessibility across desktop and mobile.
                    </p>
                    <ul class="space-y-2.5 border-t border-white/10 pt-4 text-xs text-[#DDE3E9]">
                        @foreach (['Next.js & React SSR/SSG', 'Tailwind CSS Design Tokens', 'TypeScript Type Safety', 'WCAG 2.1 AA Accessibility', 'Global Edge Caching & CDN Delivery'] as $item)
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Backend & Security Card -->
                <div class="bg-[#0F2334]/90 border border-[#264868]/80 rounded-3xl p-8 sm:p-10 shadow-2xl space-y-4">
                    <span class="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full flex items-center gap-1.5 w-max">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 5.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/></svg>
                        <span>BACKEND &amp; SECURITY</span>
                    </span>
                    <h3 class="text-2xl font-bold text-white">Scalable APIs &amp; Enterprise Security</h3>
                    <h4 class="text-xs font-bold text-[#C1A972]">Hardened Backends Built for High Concurrency</h4>
                    <p class="text-xs text-[#B4C1CD] leading-relaxed">
                        Secure API gateways, microservices, and database schemas engineered for 99.99% operational uptime and resilient disaster recovery.
                    </p>
                    <ul class="space-y-2.5 border-t border-white/10 pt-4 text-xs text-[#DDE3E9]">
                        @foreach (['RESTful & GraphQL API Gateways', 'Single Sign-On (SSO / OAuth2 / SAML)', 'Automated CI/CD Deployment Pipelines', 'OWASP Top 10 Security Hardening', '24/7 SLA Site Reliability Monitoring'] as $item)
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#C1A972] shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 6: THE APPROACH (How We Make Growth Predictable)
         =================================================== -->
    <section id="approach" class="max-w-7xl mx-auto px-6 py-20">
        <div class="bg-white border border-[#DDE3E9] rounded-3xl p-8 md:p-12 shadow-lg space-y-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-5 space-y-3">
                    <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                        THE APPROACH
                    </span>
                    <h2 class="text-3xl font-black text-[#264868]">How We Make Growth Predictable</h2>
                </div>
                <div class="lg:col-span-7 space-y-4 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed">
                    <p class="text-base font-bold text-[#153758]">
                        Our {{ $category }} engineering combines clean architecture, automated testing, security governance, and cloud deployment into a unified system. Every line of code is written to achieve business growth.
                    </p>
                    <p>
                        At Octavia Tech Solutions, software development is treated as a continuous delivery discipline driven by performance benchmarks, code reviews, and enterprise reliability guarantees.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-[#F3F5F7]">
                <div class="p-6 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex flex-col gap-2">
                    <span class="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9] w-max">
                        01
                    </span>
                    <span class="text-xs font-bold text-[#153758] mt-1">No Technical Debt</span>
                    <span class="text-[11px] text-[#5C6B7A] leading-relaxed">We write clean, modular, and maintainable codebases built to scale without rewriting.</span>
                </div>

                <div class="p-6 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex flex-col gap-2">
                    <span class="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9] w-max">
                        02
                    </span>
                    <span class="text-xs font-bold text-[#153758] mt-1">Full System Ownership</span>
                    <span class="text-[11px] text-[#5C6B7A] leading-relaxed">From technical discovery to deployment, monitoring, and post-launch SLA support.</span>
                </div>

                <div class="p-6 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex flex-col gap-2">
                    <span class="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9] w-max">
                        03
                    </span>
                    <span class="text-xs font-bold text-[#153758] mt-1">Transparent Engineering</span>
                    <span class="text-[11px] text-[#5C6B7A] leading-relaxed">Complete visibility into release sprints, code commits, and project milestone deliveries.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 7: OUR PROCESS (5-Step Numbered Workflow)
         =================================================== -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                OUR PROCESS
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">
                Our Engineering Process
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach ([
                ['num' => '01', 'title' => 'Discovery & Blueprint', 'desc' => 'Analyze business requirements, target users, system dependencies, and technical architecture.'],
                ['num' => '02', 'title' => 'UI/UX & Prototyping', 'desc' => 'Design interactive component wireframes, responsive layouts, and design system tokens.'],
                ['num' => '03', 'title' => 'Agile Development', 'desc' => 'Develop modular frontends and secure API backends in iterative bi-weekly sprint reviews.'],
                ['num' => '04', 'title' => 'QA & Performance Tuning', 'desc' => 'Rigorous security penetration tests, stress testing, and Core Web Vitals optimization.'],
                ['num' => '05', 'title' => 'Deployment & SLA', 'desc' => 'Zero-downtime production launch backed by 24/7 site reliability engineering support.']
            ] as $step)
                <div class="bg-white border border-[#DDE3E9] rounded-2xl p-6 shadow-sm text-center flex flex-col items-center justify-between space-y-4 hover:border-[#C1A972] transition-all">
                    <div class="w-10 h-10 rounded-full bg-[#264868] text-[#C1A972] font-black flex items-center justify-center text-sm border border-[#C1A972]/30">
                        {{ $step['num'] }}
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-[#264868] mb-1">{{ $step['title'] }}</h3>
                        <p class="text-[11px] text-[#5C6B7A] leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===================================================
         SECTION 8: WHAT INACTION COSTS YOU (Risk Cards)
         =================================================== -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="bg-white border border-[#DDE3E9] rounded-3xl p-8 md:p-12 shadow-sm space-y-8">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    WHAT INACTION COSTS YOU
                </span>
                <h2 class="text-3xl font-black text-[#264868]">The Cost of Technical Debt</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([
                    ['title' => 'Losing customers to competitors.', 'desc' => 'Competitors with faster, more reliable web platforms capture market share and customer goodwill.', 'icon' => 'down'],
                    ['title' => 'Security & Downtime Vulnerabilities.', 'desc' => 'Outdated software architectures lead to unexpected outages and expensive data leaks.', 'icon' => 'alert'],
                    ['title' => 'Slower Feature Releases.', 'desc' => 'Monolithic legacy systems slow down engineering velocity and delay product launches by months.', 'icon' => 'clock']
                ] as $cost)
                    <div class="p-6 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 text-center flex flex-col items-center space-y-3 hover:border-[#C1A972] transition-all">
                        <div class="w-10 h-10 rounded-full bg-[#153758] text-[#C1A972] flex items-center justify-center font-bold">
                            @if ($cost['icon'] === 'down')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 8.464 8.286M21 16.5h-5.25m5.25 0V11.25"/></svg>
                            @elseif ($cost['icon'] === 'alert')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            @endif
                        </div>
                        <h3 class="text-sm font-bold text-[#153758]">{{ $cost['title'] }}</h3>
                        <p class="text-[11px] text-[#5C6B7A] leading-relaxed">{{ $cost['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 9: LIVE LEAD CAPTURE / CONSULTATION BANNER
         =================================================== -->
    <section id="lead-form" class="max-w-7xl mx-auto px-6 py-12" x-data="serviceLeadBanner()">
        <div class="bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] rounded-3xl p-8 sm:p-12 text-[#FEFEFE] shadow-2xl relative overflow-hidden border border-[#C1A972]/30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Left: Value Narrative -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-[11px] font-bold text-[#C1A972] uppercase bg-[#0F2334] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-block">
                        FREE TECHNICAL CONSULTATION
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                        Ready to Scale Your {{ $category }}?
                    </h2>
                    <p class="text-xs sm:text-sm text-[#B4C1CD] leading-relaxed">
                        Connect directly with our lead solution architects. We analyze your requirements, identify architecture bottlenecks, and deliver an actionable technical roadmap within 24–48 hours.
                    </p>
                    <div class="space-y-3">
                        @foreach ([
                            ['title' => 'Identify architecture bottlenecks.', 'desc' => 'Discover how to optimize web performance, security, and cloud scalability.'],
                            ['title' => 'Receive actionable technical proposals.', 'desc' => 'Get transparent sprint roadmaps tailored to your engineering and budget goals.'],
                            ['title' => 'NDA Protected & Zero Obligation.', 'desc' => 'Full intellectual property protection guaranteed prior to technical discovery.']
                        ] as $benefit)
                            <div class="flex items-start gap-3 bg-[#0F2334]/60 p-4 rounded-xl border border-[#153758]">
                                <svg class="w-4 h-4 text-[#C1A972] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                <div>
                                    <h4 class="font-bold text-white text-xs mb-0.5">{{ $benefit['title'] }}</h4>
                                    <p class="text-[11px] text-[#93A3B2]">{{ $benefit['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: High-Converting Form -->
                <div class="lg:col-span-6">
                    <div class="bg-[#0F2334]/95 rounded-2xl p-6 sm:p-8 border border-[#153758] shadow-2xl">
                        <template x-if="submitted">
                            <div class="text-center py-8 space-y-4">
                                <div class="w-14 h-14 rounded-full bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center mx-auto">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Consultation Requested!</h3>
                                <p class="text-xs text-[#B4C1CD] max-w-sm mx-auto">Thank you! A solutions architect specializing in {{ $category }} will contact you within 24 hours.</p>
                            </div>
                        </template>

                        <template x-if="!submitted">
                            <form @submit.prevent="submitForm()" class="space-y-4">
                                <h3 class="text-white text-base font-extrabold tracking-wide mb-2 text-center">
                                    Get In Touch
                                </h3>
                                <input
                                    type="text"
                                    required
                                    maxlength="100"
                                    x-model="fullName"
                                    placeholder="Full Name *"
                                    class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                />
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input
                                        type="email"
                                        required
                                        maxlength="100"
                                        x-model="email"
                                        placeholder="Business Email *"
                                        class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                    />
                                    <input
                                        type="tel"
                                        maxlength="30"
                                        x-model="phone"
                                        placeholder="Phone Number"
                                        class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none transition-colors"
                                    />
                                </div>
                                <textarea
                                    rows="2"
                                    maxlength="1000"
                                    x-model="message"
                                    placeholder="What's your primary engineering requirement?"
                                    class="w-full bg-[#153758] border border-[#264868] rounded-xl px-4 py-3 text-xs text-white placeholder-[#93A3B2] focus:border-[#C1A972] focus:outline-none resize-none transition-colors"
                                ></textarea>

                                <!-- Security Math Captcha -->
                                <div class="p-3 rounded-xl bg-[#153758] border border-[#264868] flex items-center justify-between text-xs">
                                    <span class="text-white font-bold">Security Check: <span x-text="num1"></span> + <span x-text="num2"></span> = ?</span>
                                    <input
                                        type="number"
                                        required
                                        x-model="captchaAnswer"
                                        placeholder="Ans"
                                        class="w-16 px-2 py-1 rounded bg-[#0F2334] border border-[#264868] text-white text-center font-bold focus:border-[#C1A972] focus:outline-none"
                                    />
                                </div>

                                <div x-show="errorMessage" x-cloak x-text="errorMessage" class="text-xs text-red-400 text-center"></div>

                                <button
                                    type="submit"
                                    :disabled="submitting"
                                    class="w-full bg-[#C1A972] hover:bg-[#D9C48F] text-[#153758] font-extrabold text-xs uppercase tracking-wider py-3.5 rounded-xl transition-all shadow-xl cursor-pointer flex items-center justify-center gap-2 hover:scale-[1.01] disabled:opacity-60"
                                >
                                    <span x-text="submitting ? 'Submitting...' : 'CONTACT US'"></span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                                </button>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 10: CASE STUDIES (Real Proof from Database)
         =================================================== -->
    @if (!empty($recentCaseStudies) && $recentCaseStudies->isNotEmpty())
        <section class="max-w-7xl mx-auto px-6 py-16">
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                    CLIENT SUCCESS &amp; ROI
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#264868]">
                    Proven Enterprise Results
                </h2>
                <p class="text-[#5C6B7A] text-xs sm:text-sm">
                    Review how our solutions architects deliver tangible business outcomes and scalable infrastructure.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($recentCaseStudies as $cs)
                    <div class="bg-white border border-[#DDE3E9] rounded-3xl p-8 shadow-sm flex flex-col justify-between space-y-6 hover:border-[#C1A972] transition-all duration-300 hover:-translate-y-1">
                        <div class="space-y-4">
                            @if (!empty($cs->metrics) && is_array($cs->metrics) && count($cs->metrics) > 0)
                                <div class="flex items-center justify-between border-b border-[#F3F5F7] pb-3">
                                    <span class="text-2xl font-black text-[#264868]">{{ $cs->metrics[0]['value'] ?? '99.9%' }}</span>
                                    <span class="text-[10px] uppercase font-bold text-[#C1A972] tracking-wider bg-[#264868] px-2.5 py-1 rounded-md">
                                        {{ $cs->metrics[0]['label'] ?? 'Uptime' }}
                                    </span>
                                </div>
                            @endif
                            <h3 class="text-lg font-bold text-[#153758] leading-snug">
                                {{ $cs->title }}
                            </h3>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed line-clamp-3">
                                {{ $cs->excerpt ?? $cs->challenge }}
                            </p>
                        </div>
                        <a href="{{ route('case-studies.show', $cs->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#264868] hover:text-[#C1A972] transition-colors">
                            <span>Read Full Case Study</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- ===================================================
         SECTION 11: ADJACENT RELATED SERVICES
         =================================================== -->
    @if (!empty($adjacentServices))
        <section class="bg-[#F3F5F7] py-20 px-6 border-t border-b border-[#DDE3E9]">
            <div class="max-w-7xl mx-auto space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-3">
                    <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                        EXPLORE ADJACENT CAPABILITIES
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                        Complementary Solutions
                    </h2>
                    <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed">
                        Discover interconnected engineering practices that power comprehensive digital transformation.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach (array_slice($adjacentServices, 0, 6) as $adj)
                        <a href="{{ $adj['url'] }}" class="bg-white border border-[#DDE3E9] hover:border-[#C1A972] rounded-3xl p-6 shadow-sm flex flex-col justify-between space-y-4 transition-all duration-200 hover:-translate-y-1 group">
                            <div class="space-y-3">
                                <div class="w-10 h-10 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center font-bold group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $adj['icon'] }}"/></svg>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#C1A972] bg-[#264868]/10 px-2 py-0.5 rounded-md inline-block">
                                    {{ $adj['category'] }}
                                </span>
                                <h3 class="text-base font-bold text-[#153758] group-hover:text-[#264868] transition-colors">
                                    {{ $adj['title'] }}
                                </h3>
                                <p class="text-xs text-[#5C6B7A] leading-relaxed line-clamp-2">
                                    {{ $adj['description'] }}
                                </p>
                            </div>
                            <div class="inline-flex items-center gap-1.5 text-xs font-bold text-[#264868] group-hover:text-[#C1A972] transition-colors pt-2">
                                <span>Learn More</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ===================================================
         SECTION 12: FREQUENTLY ASKED QUESTIONS (Alpine Accordion)
         =================================================== -->
    <section class="max-w-4xl mx-auto px-6 py-20">
        <div class="text-center space-y-3 mb-12">
            <span class="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3.5 py-1.5 rounded-full border border-[#264868]/20 inline-block">
                FREQUENTLY ASKED QUESTIONS
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-[#264868]">
                Technical &amp; Commercial FAQ
            </h2>
            <p class="text-[#5C6B7A] text-xs sm:text-sm">
                Common questions regarding engineering timelines, architectures, IP ownership, and SLAs.
            </p>
        </div>

        <div class="space-y-4">
            @foreach ($faqsList as $idx => $faq)
                <div class="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button
                        @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})"
                        class="w-full p-6 text-left font-bold text-sm sm:text-base text-[#264868] flex items-center justify-between gap-4 hover:bg-[#F3F5F7] transition-colors cursor-pointer"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <svg
                            :class="openFaq === {{ $idx }} ? 'rotate-180 text-[#C1A972]' : 'text-[#5C6B7A]'"
                            class="w-5 h-5 shrink-0 transition-transform duration-200"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        >
                            <path d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>

                    <div x-show="openFaq === {{ $idx }}" x-cloak class="px-6 pb-6 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7] pt-4">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>

<script>
function serviceLeadBanner() {
    return {
        fullName: '',
        email: '',
        phone: '',
        message: '',
        submitting: false,
        submitted: false,
        errorMessage: '',
        num1: Math.floor(Math.random() * 8) + 2,
        num2: Math.floor(Math.random() * 8) + 1,
        captchaAnswer: '',
        async submitForm() {
            if (parseInt(this.captchaAnswer, 10) !== (this.num1 + this.num2)) {
                this.errorMessage = 'Please enter the correct answer to the security check.';
                return;
            }
            this.submitting = true;
            this.errorMessage = '';
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                const res = await fetch('/api/submit-lead', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        fullName: this.fullName,
                        email: this.email,
                        phone: this.phone,
                        serviceCategory: '{{ addslashes($category) }}',
                        message: this.message,
                        sourceForm: 'Service Page Banner: {{ addslashes($category) }}',
                        sourceUrl: window.location.href,
                        userCaptchaAnswer: parseInt(this.captchaAnswer, 10),
                        expectedCaptchaAnswer: (this.num1 + this.num2)
                    })
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    this.submitted = true;
                } else {
                    this.errorMessage = data.message || 'Submission failed. Please check your inputs.';
                }
            } catch (e) {
                this.errorMessage = 'Network error. Please try again.';
            } finally {
                this.submitting = false;
            }
        }
    };
}
</script>
@endsection