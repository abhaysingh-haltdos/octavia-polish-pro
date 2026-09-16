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

<header 
    x-data="{ scrolled: false, activeMega: null }"
    x-init="scrolled = (window.pageYOffset > 40)"
    @scroll.window="scrolled = (window.pageYOffset > 40)"
    :class="scrolled ? 'scrolled' : ''"
    class="dmt-header fixed top-0 w-full z-50 transition-all duration-300"
    id="header"
>
    <div class="header-inner">
        <!-- Brand Logo -->
        <a href="/" class="flex items-center gap-2 logo" title="Octavia Tech Solutions" aria-label="Octavia Tech Solutions — home">
            <span :class="scrolled ? 'flex items-center' : 'flex items-center rounded-xl bg-[#FEFEFE] px-2.5 py-1.5 shadow-md shadow-black/20 transition-all'">
                <img src="/assets/octavia-logo.png" width="502" height="173" alt="Octavia Tech Solutions" class="h-8 sm:h-9 lg:h-10 w-auto shrink-0 object-contain logo-img" loading="eager" />
            </span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center" id="mainNav">
            <ul class="nav-list">
                @foreach ($navItems as $item)
                    @if (empty($item['hasMega']))
                        <li class="nav-item">
                            <a href="{{ $item['href'] }}" class="nav-link" title="{{ $item['label'] }}">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @else
                        <li
                            class="nav-item has-mega"
                            :class="activeMega === '{{ $item['id'] }}' ? 'open' : ''"
                            @mouseenter="activeMega = '{{ $item['id'] }}'"
                            @mouseleave="activeMega = null"
                            @focusin="activeMega = '{{ $item['id'] }}'"
                            @focusout="if (!$el.contains($event.relatedTarget)) activeMega = null"
                            @keydown.escape.window="activeMega = null"
                        >
                            <a
                                href="{{ $item['href'] }}"
                                class="nav-link"
                                :class="activeMega === '{{ $item['id'] }}' ? 'active' : ''"
                                title="{{ $item['label'] }}"
                                aria-haspopup="true"
                                :aria-expanded="activeMega === '{{ $item['id'] }}' ? 'true' : 'false'"
                            >
                                <span>{{ $item['label'] }}</span>
                                <svg class="w-3.5 h-3.5 opacity-80" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>

                            <x-layout.mega-menu :item="$item" />
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>

        <!-- Header Actions -->
        <div class="flex items-center gap-3">
            <!-- Quick Search Button -->
            <button
                @click="searchOpen = true"
                class="flex min-h-11 min-w-11 items-center justify-center rounded-xl transition-all"
                :class="scrolled ? 'text-[#264868] hover:text-[#153758] hover:bg-[#264868]/10' : 'text-white/80 hover:text-white hover:bg-white/10'"
                title="Search Navigation Links (Cmd+K / Ctrl+K)"
                aria-label="Search navigation"
                id="search-header-btn"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>

            <!-- Primary CTA Button -->
            <button
                @click="consultationTopic = 'Header Consultation'; consultationOpen = true"
                class="btn-header hidden lg:inline-flex px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all shadow-lg"
            >
                <span>Free Consultation</span>
            </button>

            <!-- Mobile Hamburger Button -->
            <button
                @click="mobileNavOpen = true"
                class="hamburger lg:hidden"
                aria-label="Open mobile navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>
