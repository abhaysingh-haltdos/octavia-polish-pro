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
    
    $searchableLinks = [];
    foreach ($navItems as $item) {
        $searchableLinks[] = [
            'category' => 'Main Menu',
            'label' => $item['label'],
            'href' => $item['href']
        ];
        if (!empty($item['megaConfig']['columns'])) {
            foreach ($item['megaConfig']['columns'] as $col) {
                foreach ($col['items'] as $subItem) {
                    $searchableLinks[] = [
                        'category' => $item['label'] . ' › ' . $col['title'],
                        'label' => $subItem['label'],
                        'href' => $subItem['href']
                    ];
                }
            }
        }
    }
@endphp

<div
    x-show="searchOpen"
    x-cloak
    class="fixed inset-0 z-[1150] flex items-start justify-center pt-16 sm:pt-24 p-4 bg-black/70 backdrop-blur-md"
    x-data="searchModal({{ json_encode($searchableLinks) }})"
    @keydown.window.prevent.cmd.k="searchOpen = true"
    @keydown.window.prevent.ctrl.k="searchOpen = true"
    @keydown.escape.window="searchOpen = false"
>
    <div
        @click.away="searchOpen = false"
        class="bg-white rounded-2xl max-w-xl w-full shadow-2xl border border-[#F3F5F7] overflow-hidden text-[#153758]"
    >
        <!-- Search Input Bar -->
        <div class="flex items-center gap-3 px-5 py-4 border-b border-[#F3F5F7] bg-[#F3F5F7]/50">
            <svg class="w-5 h-5 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input
                type="text"
                x-ref="searchInput"
                x-model="query"
                placeholder="Search Services, Industries, AI Solutions..."
                class="flex-1 bg-transparent text-[#153758] text-sm sm:text-base font-medium placeholder-[#93A3B2] focus:outline-none"
            />
            <template x-if="query">
                <button
                    @click="query = ''"
                    class="text-xs text-[#93A3B2] hover:text-[#5C6B7A] px-2 py-1 rounded bg-[#DDE3E9]/60"
                >
                    Clear
                </button>
            </template>
            <button
                @click="searchOpen = false"
                class="p-1.5 text-[#93A3B2] hover:text-[#5C6B7A] rounded-lg hover:bg-[#DDE3E9]/50 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Results Count & Recommendations -->
        <div class="p-2 max-h-[380px] overflow-y-auto">
            <template x-if="filteredResults.length === 0">
                <div class="p-8 text-center space-y-2 text-[#5C6B7A]">
                    <p class="text-sm">No navigation items found for "<span x-text="query"></span>"</p>
                    <p class="text-xs text-[#93A3B2]">
                        Try searching for "Web", "Healthcare", or "ERP"
                    </p>
                </div>
            </template>

            <template x-if="filteredResults.length > 0">
                <div class="space-y-1">
                    <div class="px-3 py-1.5 text-[11px] font-bold text-[#93A3B2] uppercase tracking-wider flex items-center justify-between">
                        <span x-text="query ? `Found ${filteredResults.length} links` : 'Popular Navigation Links'"></span>
                        <span class="flex items-center gap-1 text-[#264868]">
                            <svg class="w-3 h-3 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            <span>Octavia Index</span>
                        </span>
                    </div>

                    <template x-for="(item, idx) in filteredResults" :key="idx">
                        <a
                            :href="item.href"
                            @click="searchOpen = false"
                            class="flex items-center justify-between p-3 rounded-xl hover:bg-[#F3F5F7] group transition-colors border border-transparent hover:border-[#DDE3E9]/60"
                        >
                            <div class="flex-1 min-w-0 pr-3">
                                <div class="text-xs text-[#93A3B2] uppercase font-bold tracking-wider" x-text="item.category"></div>
                                <div class="text-sm font-bold text-[#153758] group-hover:text-[#264868] truncate" x-text="item.label"></div>
                            </div>
                            <svg class="w-4 h-4 text-[#93A3B2] group-hover:text-[#264868] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
function searchModal(links) {
    return {
        query: '',
        allLinks: links,
        get filteredResults() {
            if (!this.query.trim()) {
                return this.allLinks.slice(0, 10);
            }
            const q = this.query.toLowerCase();
            return this.allLinks.filter(item => 
                item.label.toLowerCase().includes(q) || item.category.toLowerCase().includes(q)
            ).slice(0, 20);
        }
    }
}
</script>
