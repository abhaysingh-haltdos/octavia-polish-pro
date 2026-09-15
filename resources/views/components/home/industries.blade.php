@php
$industries = [
    ['name' => "Healthcare & Life Sciences", 'desc' => "HIPAA compliant EHRs, clinical AI, diagnostic tools & patient portals.", 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
    ['name' => "Banking & Financial Services", 'desc' => "Digital banking, payment gateways, fraud detection & core modernization.", 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'],
    ['name' => "Insurance & InsurTech", 'desc' => "Automated claims processing, actuarial analytics & policy engines.", 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['name' => "E-Commerce & Retail", 'desc' => "Headless commerce, omni-channel POS & personalized AI recommendations.", 'icon' => 'M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z'],
    ['name' => "Education & EdTech", 'desc' => "LMS platforms, virtual classrooms, student analytics & school ERP.", 'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
    ['name' => "Real Estate & PropTech", 'desc' => "Property management, tenant portals, IoT building automation & virtual tours.", 'icon' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25'],
    ['name' => "Logistics & Supply Chain", 'desc' => "Fleet tracking, warehouse management, route optimization & cold chain IoT.", 'icon' => 'M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12'],
    ['name' => "Manufacturing & Industrial", 'desc' => "Smart factory IoT, predictive maintenance, MES & supply chain visibility.", 'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z'],
    ['name' => "Government & Defense", 'desc' => "Citizen services, e-governance, secure communications & defense logistics.", 'icon' => 'M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z'],
    ['name' => "Telecom & Networking", 'desc' => "5G network management, OSS/BSS integration & subscriber self-service.", 'icon' => 'M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z'],
    ['name' => "Energy & Utilities", 'desc' => "Smart grid monitoring, renewable management & field service automation.", 'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z'],
    ['name' => "Automotive & Mobility", 'desc' => "Connected vehicle telemetry, EV charging networks & ride-hailing apps.", 'icon' => 'M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25'],
    ['name' => "Media & Entertainment", 'desc' => "OTT streaming platforms, DRM protection, ad tech & digital asset hubs.", 'icon' => 'M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z'],
    ['name' => "Travel & Hospitality", 'desc' => "Booking engines, hotel PMS, guest mobile keys & loyalty programs.", 'icon' => 'M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5'],
    ['name' => "Agriculture & AgriTech", 'desc' => "Precision farming sensors, crop yield AI & supply chain traceability.", 'icon' => 'M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z'],
    ['name' => "Human Resources & HRTech", 'desc' => "ATS recruitment, payroll automation, employee engagement & performance AI.", 'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
    ['name' => "Legal & Compliance", 'desc' => "Contract analysis NLP, document automation & e-discovery platforms.", 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z'],
    ['name' => "Non-Profit & NGO", 'desc' => "Donor management, volunteer portals, impact analytics & grant tracking.", 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
    ['name' => "Food & Beverage", 'desc' => "Restaurant POS, online ordering, inventory management & kitchen display systems.", 'icon' => 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['name' => "Sports & Fitness", 'desc' => "Wearable integration, gym management software & fan engagement apps.", 'icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
];
@endphp

<section class="py-24 bg-[#153758] text-white border-t border-white/10" id="industries" x-data="{ searchTerm: '' }">
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

      <div class="pt-4 max-w-md mx-auto">
        <input
          type="text"
          placeholder="Search your industry (e.g., Banking, Healthcare, Logistics)..."
          x-model="searchTerm"
          class="w-full px-5 py-3 rounded-2xl bg-white/5 border border-white/10 text-sm text-white placeholder-[#93A3B2] focus:outline-none focus:border-[#C1A972] focus:ring-2 focus:ring-[#C1A972]/30 transition-all"
        />
      </div>
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
          x-show="searchTerm === '' || '{{ strtolower($ind['name']) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($ind['desc']) }}'.includes(searchTerm.toLowerCase())"
          class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 transition-all duration-300 group cursor-pointer flex flex-col justify-between block"
        >
          <div>
            <div class="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#264868] group-hover:text-white transition-all">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ind['icon'] }}"></path></svg>
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
