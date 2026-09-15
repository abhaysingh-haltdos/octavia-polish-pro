@php
$pillars = [
    [
        'title' => 'Innovation-First DNA',
        'desc' => 'Our Innovation Lab invests 15% of revenue into R&D — prototyping with AI, blockchain, and quantum-ready architectures so you are always two steps ahead.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>'
    ],
    [
        'title' => 'Global Delivery, Local Understanding',
        'desc' => '20+ countries. Follow-the-sun coverage. Local domain experts who understand your market, regulations, and culture. Progress never stops.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>'
    ],
    [
        'title' => '24/7 Mission-Critical Support',
        'desc' => '15-minute SLA response. 99.99% uptime guarantee. AI-driven monitoring that detects issues before they become outages.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>'
    ],
    [
        'title' => 'Security Without Compromise',
        'desc' => 'SOC 2 Type II. ISO 27001. Zero-trust by default. Passed audits for Fortune 500 banks, government agencies, and healthcare enterprises.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>'
    ],
    [
        'title' => '500+ Certified Engineers',
        'desc' => 'Certified experts in AWS, Azure, GCP, Kubernetes, Cisco, and AI frameworks. Top 1% talent hired through rigorous engineering benchmarks.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>'
    ],
    [
        'title' => 'Proven Track Record',
        'desc' => '98% client retention rate over 10+ years. 500+ successful enterprise deployments completed on time and on budget.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
    ],
    [
        'title' => 'Flexible Engagement Models',
        'desc' => 'Dedicated development teams, time & materials, or fixed-price project scope. Tailored to match your financial and operational preferences.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
    ],
    [
        'title' => 'Rapid Time-to-Value',
        'desc' => 'Agile 2-week sprint cycles with live demos. Go from concept to production-ready software in weeks, not years.',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>'
    ]
];
@endphp

<section class="py-24 bg-white text-[#153758]" id="why-us">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-[#264868]">
                The Octavia Advantage
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
                Why Leading Enterprises Choose Us
            </h2>
            <p class="text-[#5C6B7A] text-base sm:text-lg">
                We don't just deliver projects — we engineer outcomes. Here's what makes us the technology partner that enterprises bet their future on.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($pillars as $pillar)
                <div class="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/40 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-[#EDF0F3] text-[#264868] flex items-center justify-center mb-6 group-hover:bg-[#264868] group-hover:text-white transition-all shadow-md shadow-[#264868]/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $pillar['icon'] !!}</svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors">
                            {{ $pillar['title'] }}
                        </h3>
                        <p class="text-sm text-[#5C6B7A] leading-relaxed">{{ $pillar['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
