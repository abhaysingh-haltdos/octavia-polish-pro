@php
$dbStudies = \App\Models\CaseStudy::where('status', 'published')->orderByDesc('is_featured')->take(3)->get();
if ($dbStudies->isNotEmpty()) {
    $caseStudies = $dbStudies->map(function ($cs) {
        $view = $cs->toViewArray();
        $metrics = [];
        if (!empty($view['metrics']) && is_array($view['metrics'])) {
            foreach ($view['metrics'] as $k => $v) {
                $metrics[] = ['label' => is_string($k) ? $k : ($v['label'] ?? 'Metric'), 'value' => is_array($v) ? ($v['value'] ?? '') : (string)$v];
            }
        }
        return [
            'title' => $view['title'],
            'category' => $view['industry'] ?? 'Enterprise',
            'slug' => $view['slug'],
            'summary' => $view['shortChallenge'] ?: ($view['subtitle'] ?: 'Enterprise solution engineered for high reliability.'),
            'metrics' => $metrics,
            'featured' => !empty($view['isFeatured']),
            'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'
        ];
    })->all();
} else {
$caseStudies = [
    [
        'title' => "Global FinTech Payment Gateway Processing Engine",
        'category' => "Banking & Finance",
        'slug' => "global-fintech-payment-processing-engine",
        'summary' => "Microservices architecture supporting 10,000 TPS with sub-50ms latency. Reduced transaction failure rate by 99.4% across 15 regions.",
        'metrics' => [['label' => "TPS Capacity", 'value' => "10,000+"], ['label' => "Latency", 'value' => "< 50ms"], ['label' => "Uptime", 'value' => "99.999%"]],
        'featured' => true,
        'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'
    ],
    [
        'title' => "AI-Powered Diagnostics SaaS for Smart Healthcare",
        'category' => "HealthTech & AI",
        'slug' => "ai-diagnostics-saas-platform-healthcare",
        'summary' => "Custom computer vision pipeline analyzing radiology scans in under 2 seconds. HIPAA compliant with end-to-end encryption.",
        'metrics' => [['label' => "Scan Time", 'value' => "< 2s"], ['label' => "AI Accuracy", 'value' => "92%"], ['label' => "Active Users", 'value' => "250K+"]],
        'featured' => true,
        'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    ],
    [
        'title' => "SDS Enclave Property Showcase & Lead Platform",
        'category' => "Real Estate & Property",
        'slug' => "sds-enclave-real-estate-property-showcase-platform",
        'summary' => "Next.js SSR property showcase platform with dynamic floor plans, virtual amenity tours, and automated buyer inquiry lead routing.",
        'metrics' => [['label' => "Buyer Inquiries", 'value' => "3.4x"], ['label' => "Page Load", 'value' => "0.6s"], ['label' => "Mobile Leads", 'value' => "78%"]],
        'featured' => false,
        'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z'
    ],
    ];
}
@endphp

<section class="py-24 bg-[#153758] text-white border-t border-[#153758]" id="case-studies">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
      <span class="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
        Enterprise Client Impact
      </span>
      <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
        Featured Case Studies & ROI
      </h2>
      <p class="text-[#B4C1CD] text-base sm:text-lg">
        Real engineering results for global enterprises. See how Octavia Tech Solutions
        transforms complex operations across banking, healthcare, retail, and manufacturing.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($caseStudies as $cs)
        <div
          class="rounded-3xl p-8 border flex flex-col justify-between transition-all duration-300 group {{ $cs['featured'] ? 'bg-gradient-to-br from-[#264868] to-[#153758] border-[#C1A972] shadow-xl shadow-black/30 md:col-span-2 lg:col-span-1' : 'bg-white/5 border-white/10 hover:border-[#C1A972]/60 hover:bg-white/10' }}"
        >
          <div>
            <div class="flex items-center justify-between mb-6">
              <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center font-bold border border-[#C1A972]/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $cs['icon'] }}"></path></svg>
              </div>
              <span class="text-[11px] font-bold text-[#D9C48F] uppercase bg-[#153758] px-3 py-1 rounded-full border border-[#C1A972]/30">{{ $cs['category'] }}</span>
            </div>

            <a href="/case-studies/{{ $cs['slug'] }}" class="block">
                <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-[#D9C48F] transition-colors cursor-pointer">{{ $cs['title'] }}</h3>
            </a>
            <p class="text-sm text-[#B4C1CD] leading-relaxed mb-8">{{ $cs['summary'] }}</p>

            <!-- Metrics Row -->
            <div class="grid grid-cols-2 gap-4 mb-8 pt-4 border-t border-white/10">
              @foreach($cs['metrics'] as $m)
                <div>
                  <div class="text-2xl font-black text-[#D9C48F]">{{ $m['value'] }}</div>
                  <div class="text-[11px] font-semibold text-[#B4C1CD]">{{ $m['label'] }}</div>
                </div>
              @endforeach
            </div>
          </div>

          <a href="/case-studies/{{ $cs['slug'] }}" class="w-full py-3 px-4 rounded-xl font-extrabold text-xs uppercase tracking-wider bg-white/10 text-white hover:bg-[#C1A972] hover:text-[#153758] transition-all flex items-center justify-center gap-2 block text-center">
            <span>Read Full Case Study</span>
            <svg class="w-5 h-5 text-[#D9C48F] group-hover:text-[#153758] inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
        </div>
      @endforeach
    </div>

    <div class="mt-12 text-center">
      <a href="/case-studies" class="px-8 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm rounded-xl transition-all shadow-lg inline-flex items-center gap-2">
        <span>View All Enterprise Case Studies</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
      </a>
    </div>
  </div>
</section>


