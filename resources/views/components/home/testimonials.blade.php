@php
$testimonials = [
    [
        'author' => 'James Chen', 'role' => 'CTO, GlobalTech Corp', 'avatar' => 'JC', 'avatarBg' => 'bg-gradient-to-br from-[#264868] to-[#153758]',
        'quote' => 'Reduced cloud infrastructure costs by 42% while improving uptime to 99.99%. Octavia is our secret weapon for engineering velocity.',
        'results' => [['value' => '42%', 'label' => 'Cost Reduction'], ['value' => '99.99%', 'label' => 'Uptime SLA']]
    ],
    [
        'author' => 'Sarah Palmer', 'role' => 'CISO, FinSecure Bank', 'avatar' => 'SP', 'avatarBg' => 'bg-gradient-to-br from-[#153758] to-[#264868]',
        'quote' => 'Zero-trust architecture gave us complete peace of mind. Their security team is genuinely world-class — we sleep better at night.',
        'results' => [['value' => 'Zero', 'label' => 'Breaches'], ['value' => '24/7', 'label' => 'SOC Coverage']]
    ],
    [
        'author' => 'Ahmed Rashid', 'role' => 'Founder & CEO, QuickServe', 'avatar' => 'AR', 'avatarBg' => 'bg-gradient-to-br from-[#264868] to-[#C1A972]',
        'quote' => 'From MVP to 2 million users — Octavia was with us at every step. Their expertise helped us raise our Series B.',
        'results' => [['value' => '2M+', 'label' => 'Active Users'], ['value' => '$8M', 'label' => 'Series B Raised']]
    ],
    [
        'author' => 'Maria Lopez', 'role' => 'CMO, RetailMax', 'avatar' => 'ML', 'avatarBg' => 'bg-gradient-to-br from-[#153758] to-[#264868]',
        'quote' => 'Digital marketing doubled our online revenue in 6 months. Their data-driven approach set them apart from every agency we have tried.',
        'results' => [['value' => '2x', 'label' => 'Online Revenue'], ['value' => '6mo', 'label' => 'Timeline']]
    ],
    [
        'author' => 'Robert Kim', 'role' => 'VP Engineering, LogiFlow', 'avatar' => 'RK', 'avatarBg' => 'bg-gradient-to-br from-[#264868] to-[#C1A972]',
        'quote' => 'Redesigned infrastructure across 15 offices with zero downtime during migration — unheard of in our industry.',
        'results' => [['value' => '15', 'label' => 'Offices Migrated'], ['value' => 'Zero', 'label' => 'Downtime']]
    ],
    [
        'author' => 'Elena Rostova', 'role' => 'Head of Digital, MediCare Plus', 'avatar' => 'ER', 'avatarBg' => 'bg-gradient-to-br from-[#264868] to-[#153758]',
        'quote' => 'HIPAA-compliant telemedicine platform developed and launched in record time. Patient engagement increased by 180%.',
        'results' => [['value' => '180%', 'label' => 'Patient Growth'], ['value' => '100%', 'label' => 'HIPAA Compliant']]
    ]
];
@endphp

<!-- We use a simpler robust CSS-based snap scroll approach combined with Alpine for the buttons for safety in Blade -->
<section class="py-24 bg-[#0F2334] text-white border-t border-[#153758]/30 overflow-hidden" id="testimonials"
    x-data="{ 
        scrollNext() { $refs.slider.scrollBy({ left: $refs.slider.offsetWidth, behavior: 'smooth' }) },
        scrollPrev() { $refs.slider.scrollBy({ left: -$refs.slider.offsetWidth, behavior: 'smooth' }) }
    }"
>
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
            <div class="space-y-3 max-w-2xl">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C1A972] px-3 py-1 rounded-full bg-[#C1A972]/10 border border-[#C1A972]/20">
                    Verified Enterprise Results
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                    What Our Clients Say
                </h2>
                <p class="text-[#B4C1CD] text-base sm:text-lg">
                    Trusted by Fortune 500 companies and fast-growing startups. Here's what leadership teams say about partnering with Octavia.
                </p>
            </div>

            <!-- Carousel Arrows -->
            <div class="flex items-center gap-3 self-start md:self-end shrink-0">
                <button @click="scrollPrev()" aria-label="Previous testimonial" class="p-3 rounded-full bg-white/5 border border-white/10 hover:bg-[#C1A972]/20 hover:border-[#C1A972]/40 text-[#FEFEFE] hover:text-white transition-all duration-200 active:scale-95">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="scrollNext()" aria-label="Next testimonial" class="p-3 rounded-full bg-white/5 border border-white/10 hover:bg-[#C1A972]/20 hover:border-[#C1A972]/40 text-[#FEFEFE] hover:text-white transition-all duration-200 active:scale-95">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>

        <!-- CSS Scroll Snap Container -->
        <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory hide-scrollbar gap-6 pb-8" style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach ($testimonials as $t)
                <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]">
                    <div class="p-8 rounded-3xl bg-white/[0.04] border border-white/10 hover:border-[#C1A972]/40 hover:bg-white/[0.07] transition-all duration-300 flex flex-col justify-between h-full shadow-lg">
                        <div>
                            <!-- Results Metrics Row -->
                            <div class="flex items-center gap-6 mb-6 pb-4 border-b border-white/10">
                                @foreach ($t['results'] as $r)
                                    <div>
                                        <span class="text-2xl font-extrabold text-[#D9C48F] block">{{ $r['value'] }}</span>
                                        <span class="text-[11px] font-semibold text-[#B4C1CD]">{{ $r['label'] }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Star Rating -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex gap-1 text-[#D9C48F]">
                                    @for ($i=0; $i<5; $i++)
                                        <svg class="w-5 h-5 fill-[#C1A972] text-[#D9C48F]" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    @endfor
                                </div>
                                <svg class="w-8 h-8 text-[#C1A972]/30" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            </div>

                            <p class="text-sm text-[#FEFEFE] italic leading-relaxed mb-8">
                                &ldquo;{{ $t['quote'] }}&rdquo;
                            </p>
                        </div>

                        <!-- Author Profile -->
                        <div class="flex items-center gap-3 pt-4 border-t border-white/10">
                            <div class="{{ $t['avatarBg'] }} w-12 h-12 rounded-full text-white font-bold flex items-center justify-center text-sm shadow-md border border-white/10 shrink-0">
                                {{ $t['avatar'] }}
                            </div>
                            <div class="min-w-0">
                                <h4 class="font-bold text-sm text-white truncate">{{ $t['author'] }}</h4>
                                <span class="text-xs text-[#B4C1CD] truncate block">{{ $t['role'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <style>
            .hide-scrollbar::-webkit-scrollbar { display: none; }
        </style>
    </div>
</section>
