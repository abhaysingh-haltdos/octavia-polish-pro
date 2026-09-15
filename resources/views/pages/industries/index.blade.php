@extends('layouts.app')

@section('content')
@php
    $industriesPath = storage_path('app/industries.json');
    $allIndustriesData = file_exists($industriesPath) ? json_decode(file_get_contents($industriesPath), true) : [];

    // All industries listing array matching React ALL_INDUSTRIES
    $industriesList = [
        [
            'slug' => "wholesale-softswitch-billing",
            'name' => "Wholesale Softswitch & Real-Time Billing",
            'category' => "Telecom & Networking",
            'badge' => "FEATURED SOLUTION",
            'desc' => "Carrier-grade Class 4 VoIP routing, automated rate sheet imports, least cost routing (LCR), and zero-leakage financial settlement.",
            'icon' => "M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
        ],
        [
            'slug' => "healthcare",
            'name' => "Healthcare & Life Sciences",
            'category' => "Healthcare & Life Sciences",
            'badge' => "HIPAA COMPLIANT",
            'desc' => "EHR integrations (Epic/Cerner), clinical AI diagnostic support, patient mobile portals, and FDA medical device software.",
            'icon' => "M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
        ],
        [
            'slug' => "fintech",
            'name' => "FinTech, Banking & Payments",
            'category' => "Financial Services",
            'badge' => "PCI-DSS LEVEL 1",
            'desc' => "Core banking modernization, biometric fraud shields, real-time payment processing, and automated ledger reconciliation.",
            'icon' => "M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
        ],
        [
            'slug' => "retail",
            'name' => "Headless Retail & E-Commerce",
            'category' => "Commerce & Retail",
            'badge' => "HIGH CONCURRENCY",
            'desc' => "Composable commerce architecture, AI recommendation engines, omnichannel POS systems, and sub-second checkout.",
            'icon' => "M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
        ],
        [
            'slug' => "manufacturing",
            'name' => "Smart Manufacturing & Industrial IoT",
            'category' => "Industrial & Manufacturing",
            'badge' => "INDUSTRY 4.0",
            'desc' => "5,000+ IoT sensor telemetry, predictive maintenance ML, digital twin factory modeling, and supply chain visibility.",
            'icon' => "M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"
        ],
        [
            'slug' => "logistics",
            'name' => "Logistics, Freight & Fleet Telematics",
            'category' => "Logistics & Supply Chain",
            'badge' => "REAL-TIME TRACKING",
            'desc' => "AI dynamic fleet route optimization, warehouse management (WMS), cold chain sensors, and electronic proof of delivery.",
            'icon' => "M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
        ],
        [
            'slug' => "insurance",
            'name' => "Insurance & InsurTech",
            'category' => "Financial Services",
            'badge' => "AUTOMATED CLAIMS",
            'desc' => "Automated policy management, OCR claims processing, actuarial risk analytics, and instant customer portal access.",
            'icon' => "M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        ],
        [
            'slug' => "automotive",
            'name' => "Automotive & Connected Mobility",
            'category' => "Industrial & Manufacturing",
            'badge' => "TELEMETRY IoT",
            'desc' => "Connected vehicle OBD-II telematics, EV charging station networks, fleet analytics, and mobility ride-hailing apps.",
            'icon' => "M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
        ],
        [
            'slug' => "education",
            'name' => "Education & EdTech Platforms",
            'category' => "Public & Services",
            'badge' => "VIRTUAL CAMPUS",
            'desc' => "Learning Management Systems (LMS), virtual classrooms, automated grading AI, and student record management.",
            'icon' => "M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"
        ],
        [
            'slug' => "government",
            'name' => "Government & Defense Sector",
            'category' => "Public & Services",
            'badge' => "SECURE GOVCLOUD",
            'desc' => "Citizen portal services, e-governance workflows, defense logistics, and FedRAMP compliant cloud architecture.",
            'icon' => "M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
        ],
        [
            'slug' => "real-estate",
            'name' => "Real Estate & PropTech",
            'category' => "Commerce & Retail",
            'badge' => "PROPTECH AI",
            'desc' => "Property management portals, 3D virtual property tours, tenant billing, and IoT smart building automation.",
            'icon' => "M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
        ],
        [
            'slug' => "travel",
            'name' => "Travel, Tourism & Hospitality",
            'category' => "Public & Services",
            'badge' => "BOOKING ENGINE",
            'desc' => "High-speed flight & hotel booking engines, hotel PMS, guest mobile keyless entry, and AI loyalty portals.",
            'icon' => "M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"
        ],
    ];

    $categories = [
        "All",
        "Telecom & Networking",
        "Healthcare & Life Sciences",
        "Financial Services",
        "Commerce & Retail",
        "Industrial & Manufacturing",
        "Logistics & Supply Chain",
        "Public & Services",
    ];
@endphp

<div class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24" x-data="{ searchTerm: '', selectedCategory: 'All' }">
    <!-- Hero Banner Header -->
    <section class="bg-[#153758] text-white pt-36 pb-16 px-6 border-b border-[#153758] relative overflow-hidden">
        <div class="max-w-7xl mx-auto text-center space-y-4 relative z-10">
            <span class="text-xs font-bold text-[#D9C48F] uppercase tracking-widest bg-[#264868] px-3.5 py-1.5 rounded-full border border-[#C1A972]/30 inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Octavia Tech Industry Directory</span>
            </span>

            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                Industry Solutions &amp; Domain Expertise
            </h1>

            <p class="text-[#B4C1CD] text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Decades of combined engineering leadership across mission-critical industries. Explore
                specialized solutions tailored to your compliance, scale, and performance needs.
            </p>

            <!-- Search Input Bar -->
            <div class="pt-6 max-w-xl mx-auto relative">
                <svg class="w-5 h-5 text-[#B4C1CD] absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input
                    type="text"
                    placeholder="Search by industry (e.g., Softswitch, Healthcare, FinTech, IoT)..."
                    x-model="searchTerm"
                    class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white/10 border border-white/20 text-white placeholder-[#93A3B2] text-sm focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
                />
            </div>
        </div>
    </section>

    <!-- Category Filter Tabs -->
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

    <!-- Industry Cards Grid -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($industriesList as $ind)
                <a
                    href="/industries/{{ $ind['slug'] }}"
                    x-show="(selectedCategory === 'All' || selectedCategory === '{{ $ind['category'] }}') && (searchTerm === '' || '{{ strtolower($ind['name']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($ind['desc']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($ind['category']) }}'.includes(searchTerm.toLowerCase()))"
                    class="bg-white rounded-3xl p-8 border border-[#DDE3E9]/80 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#DDE3E9]/60 transition-all duration-300 cursor-pointer flex flex-col justify-between group relative overflow-hidden"
                >
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-[#264868]/10 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-[#D9C48F] transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ind['icon'] }}"></path></svg>
                            </div>

                            <span class="text-[10px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-2.5 py-1 rounded-full border border-[#C1A972]/30">
                                {{ $ind['badge'] }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-[#264868] mb-3 group-hover:text-[#153758] transition-colors">
                            {{ $ind['name'] }}
                        </h3>

                        <p class="text-xs text-[#5C6B7A] leading-relaxed mb-6">{{ $ind['desc'] }}</p>
                    </div>

                    <div class="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors">
                        <span>Explore Industry Solutions</span>
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Bottom CTA Banner -->
    <section class="max-w-7xl mx-auto px-6 mt-12">
        <div class="bg-[#153758] text-white rounded-3xl p-10 text-center space-y-4 shadow-xl border border-[#153758]">
            <h2 class="text-2xl sm:text-4xl font-black">Need a Custom Enterprise Solution?</h2>
            <p class="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto">
                Our principal solutions engineering team designs custom architectures for unique
                compliance, high-concurrency, or multi-cloud requirements.
            </p>
            <div class="pt-2">
                <button
                    @click="consultationTopic = 'Custom Industry Solution'; consultationOpen = true"
                    class="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg inline-flex items-center gap-2"
                >
                    <span>Speak with an Architect</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </button>
            </div>
        </div>
    </section>
</div>
@endsection
