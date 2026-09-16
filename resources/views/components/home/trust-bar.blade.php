@php
$partners = [
    ['name' => 'Microsoft', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/microsoft.svg'],
    ['name' => 'Google', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/google.svg'],
    ['name' => 'Amazon Web Services', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/amazon-web-services.svg'],
    ['name' => 'Cisco', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/cisco.svg'],
    ['name' => 'Dell', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/dell.svg'],
    ['name' => 'HP', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/hp.svg'],
    ['name' => 'Intel', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/intel.svg'],
    ['name' => 'IBM', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/ibm.svg'],
    ['name' => 'Fortinet', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/fortinet.svg'],
    ['name' => 'VMware', 'logo' => 'https://octaviatechnologies.com/assets/logos/partners/vmware.svg'],
];
@endphp

<section class="py-12 bg-[#0F2334] border-b border-[#0F2334] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 mb-6 text-center">
        <p class="text-xs font-bold uppercase tracking-widest text-[#C1A972]">
            Trusted by Industry Leaders & Global Tech Partners
        </p>
    </div>

    <div class="relative w-full overflow-hidden flex items-center">
        <!-- Gradient blur overlays -->
        <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-[#0F2334] to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-[#0F2334] to-transparent z-10 pointer-events-none"></div>

        <div class="flex gap-12 sm:gap-16 items-center animate-infinite-scroll whitespace-nowrap">
            <!-- Repeat 3 times for seamless scrolling -->
            @for ($i = 0; $i < 3; $i++)
                @foreach ($partners as $p)
                    <div class="flex items-center justify-center shrink-0 opacity-70 hover:opacity-100 transition-opacity duration-300 grayscale hover:grayscale-0 cursor-pointer">
                        <img
                            src="{{ $p['logo'] }}"
                            alt="{{ $p['name'] }} logo"
                            width="120"
                            height="32"
                            loading="lazy"
                            class="h-7 sm:h-8 w-auto object-contain max-w-[120px] filter invert brightness-200"
                            onerror="this.style.display='none'; this.nextElementSibling?.classList.remove('hidden');"
                        />
                        <span class="text-[#93A3B2] font-semibold text-sm ml-2 hidden sm:inline">
                            {{ $p['name'] }}
                        </span>
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>
