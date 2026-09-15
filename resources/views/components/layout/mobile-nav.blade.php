@php
    $primaryMenu = \App\Models\Menu::where('location', 'primary')->with(['items' => fn($q) => $q->whereNull('parent_id')->orderBy('order')])->first();
    if ($primaryMenu && $primaryMenu->items->isNotEmpty()) {
        $navItems = $primaryMenu->items->map(function ($item) {
            return [
                'id' => \Illuminate\Support\Str::slug($item->title),
                'label' => $item->title,
                'href' => $item->url,
                'hasMega' => !empty($item->meta),
                'megaConfig' => $item->meta,
            ];
        })->all();
    } else {
        $navPath = storage_path('app/navigation.json');
        $navItems = file_exists($navPath) ? json_decode(file_get_contents($navPath), true) : [];
    }
@endphp

<div
    x-show="mobileNavOpen"
    x-cloak
    class="fixed inset-0 z-[1050] bg-[#0F2334]/95 backdrop-blur-2xl flex flex-col overflow-y-auto lg:hidden"
    id="mobile-navigation-overlay"
    x-data="{ expandedSection: null }"
>
    <!-- Mobile Top Header -->
    <div class="flex items-center justify-between px-6 py-5 border-b border-white/10">
        <a href="/" class="flex items-center gap-2">
            <span class="font-extrabold text-2xl text-white tracking-tight">Octavia</span>
        </a>
        <button
            @click="mobileNavOpen = false"
            class="p-2 text-[#93A3B2] hover:text-white rounded-lg bg-white/5 hover:bg-white/10 transition-colors"
            aria-label="Close menu"
            id="close-mobile-menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Accordion Menu List -->
    <div class="flex-1 px-6 py-6 space-y-2">
        @foreach ($navItems as $item)
            @if (empty($item['hasMega']))
                <div class="border-b border-white/5 py-1">
                    <a
                        href="{{ $item['href'] }}"
                        @click="mobileNavOpen = false"
                        class="flex items-center justify-between py-3 text-lg font-semibold text-[#FEFEFE] hover:text-white hover:pl-2 transition-all"
                    >
                        <span>{{ $item['label'] }}</span>
                        <svg class="w-4 h-4 text-[#C1A972] opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            @else
                <div class="border-b border-white/5 py-1">
                    <button
                        @click="expandedSection = (expandedSection === '{{ $item['id'] }}' ? null : '{{ $item['id'] }}')"
                        class="w-full flex items-center justify-between py-3 text-lg font-semibold text-[#FEFEFE] hover:text-white transition-colors text-left"
                    >
                        <span>{{ $item['label'] }}</span>
                        <svg
                            :class="expandedSection === '{{ $item['id'] }}' ? 'rotate-180' : ''"
                            class="w-5 h-5 text-[#C1A972] transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Sub Columns Accordion -->
                    @if (!empty($item['megaConfig']['columns']))
                        <div
                            x-show="expandedSection === '{{ $item['id'] }}'"
                            x-cloak
                            class="pl-3 pr-1 py-3 my-1 bg-white/5 rounded-xl space-y-5"
                        >
                            @foreach ($item['megaConfig']['columns'] as $col)
                                <div class="space-y-2">
                                    <div class="text-xs font-bold uppercase tracking-wider text-[#C1A972] px-2 pt-1">
                                        {{ $col['title'] }}
                                    </div>
                                    <div class="space-y-1 pl-1">
                                        @foreach ($col['items'] as $subItem)
                                            <a
                                                href="{{ $subItem['href'] }}"
                                                @click="mobileNavOpen = false"
                                                class="flex items-center justify-between py-2 px-2 text-sm text-[#B4C1CD] hover:text-white hover:bg-white/5 rounded-lg transition-colors"
                                            >
                                                <span>{{ $subItem['label'] }}</span>
                                                <svg class="w-3.5 h-3.5 text-[#C1A972] opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <!-- Mobile Drawer Footer CTA -->
    <div class="p-6 border-t border-white/10 space-y-3 bg-[#0F2334]">
        <button
            @click="mobileNavOpen = false; consultationTopic = 'Mobile Nav Inquiry'; consultationOpen = true"
            class="w-full py-3.5 px-4 bg-[#C1A972] hover:bg-[#D9C48F] text-[#0F2334] font-extrabold text-sm rounded-xl transition-all shadow-lg flex items-center justify-center gap-2"
        >
            <span>Schedule Free Consultation</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>

        <a
            href="/contact"
            @click="mobileNavOpen = false"
            class="w-full py-3 px-4 bg-white/10 hover:bg-white/15 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center gap-2 border border-white/10 block text-center"
        >
            <span>Contact Global Offices</span>
        </a>
    </div>
</div>
