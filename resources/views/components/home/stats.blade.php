@php
$stats = [
    [
        'number' => '500+',
        'label' => 'Projects Delivered',
        'desc' => 'Across North America, Europe, Asia & Africa',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
    ],
    [
        'number' => '98%',
        'label' => 'Client Satisfaction',
        'desc' => 'Long-term enterprise partnerships',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>'
    ],
    [
        'number' => '20+',
        'label' => 'Industries Transformed',
        'desc' => 'Deep domain-specific software engineering',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>'
    ],
    [
        'number' => '15+',
        'label' => 'Global Offices',
        'desc' => 'Follow-the-sun 24/7 delivery capability',
        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
    ]
];
@endphp

<section class="py-16 bg-[#153758] text-white border-b border-[#264868]/40">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach ($stats as $stat)
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/60 hover:bg-white/[0.08] transition-all duration-300 group">
                    <div class="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#264868] group-hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $stat['icon'] !!}</svg>
                    </div>
                    <div class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-1 group-hover:text-[#D9C48F] transition-colors">
                        {{ $stat['number'] }}
                    </div>
                    <div class="text-sm font-bold text-[#FEFEFE] mb-1">{{ $stat['label'] }}</div>
                    <div class="text-xs text-[#B4C1CD] leading-snug">{{ $stat['desc'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
