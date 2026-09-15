@php
$industries = [
    ['name' => "Healthcare & Life Sciences", 'desc' => "HIPAA compliant EHRs, clinical AI, diagnostic tools & patient portals.", 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
    ['name' => "Banking & Financial Services", 'desc' => "Digital banking, payment gateways, fraud detection & core modernization.", 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'],
    ['name' => "E-Commerce & Retail", 'desc' => "Headless commerce, omni-channel POS & personalized AI recommendations.", 'icon' => 'M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z'],
    ['name' => "Education & EdTech", 'desc' => "LMS platforms, virtual classrooms, student analytics & school ERP.", 'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
    ['name' => "Real Estate & PropTech", 'desc' => "Property management, tenant portals, IoT building automation & virtual tours.", 'icon' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25'],
    ['name' => "Logistics & Supply Chain", 'desc' => "Fleet tracking, warehouse management, route optimization & cold chain IoT.", 'icon' => 'M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12'],
    ['name' => "Manufacturing & Industrial", 'desc' => "Smart factory IoT, predictive maintenance, MES & supply chain visibility.", 'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z'],
    ['name' => "Travel & Hospitality", 'desc' => "Booking engines, hotel PMS, guest mobile keys & loyalty programs.", 'icon' => 'M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5'],
];
@endphp

<section class="py-24 bg-[#153758] text-white border-t border-white/10" id="industries" >
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-12 space-y-4">
      <span class="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
        Domain Expertise
      </span>
      <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
        Industries We Serve
      </h2>
      <p class="text-[#B4C1CD] text-base sm:text-lg">
        Decades of combined experience across industries where technology isn't optional —
        it's the competitive edge. We speak your language before writing a single line of
        code.
      </p>
    </div>

@php
$slugMap = [
    "Healthcare & Life Sciences" => "healthcare",
    "Banking & Financial Services" => "fintech",
    "Insurance & InsurTech" => "insurance",
    "E-Commerce & Retail" => "retail",
    "Education & EdTech" => "education",
    "Real Estate & PropTech" => "real-estate",
    "Logistics & Supply Chain" => "logistics",
    "Manufacturing & Industrial" => "manufacturing",
    "Government & Defense" => "government",
    "Telecom & Networking" => "wholesale-softswitch-billing",
    "Automotive & Mobility" => "automotive",
    "Travel & Hospitality" => "travel",
];
@endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($industries as $ind)
        @php
            $targetSlug = $slugMap[$ind['name']] ?? null;
            $url = $targetSlug ? "/industries/{$targetSlug}" : "/industries";
        @endphp
        <a
          href="{{ $url }}"
          class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 transition-all duration-300 group cursor-pointer flex flex-col justify-between block"
        >
          <div>
            <div class="w-12 h-12 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#264868] group-hover:text-white transition-all">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ind['icon'] }}"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-2 group-hover:text-[#D9C48F] transition-colors">{{ $ind['name'] }}</h3>
            <p class="text-xs text-[#B4C1CD] leading-relaxed mb-4">{{ $ind['desc'] }}</p>
          </div>

          <div class="flex items-center gap-1 text-xs font-bold text-[#D9C48F] group-hover:text-white transition-colors">
            <span>Explore Solutions</span>
            <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>


