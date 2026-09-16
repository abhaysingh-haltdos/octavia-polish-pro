@props(['item'])

@php
    $config = $item['megaConfig'] ?? null;
    $isServices = ($item['id'] ?? '') === 'services';
@endphp

@if ($config)
    @if ($isServices)
        <!-- Apptad-Style Tabbed Mega Menu for Services -->
        <div
            class="mega-menu {{ $config['widthClass'] ?? 'mega-menu-xl' }}"
            id="desktop-mega-menu-services"
            x-data="{ activeCategoryIndex: 0 }"
        >
            <div class="flex min-h-[480px] bg-[#FFFFFF] border border-[#DDE3E9] rounded-3xl shadow-2xl shadow-[#153758]/12 overflow-hidden text-[#153758]">
                <!-- Category Sidebar (Hover-Activated) -->
                <div class="w-[270px] bg-[#F8FAFC] border-r border-[#DDE3E9] p-4 flex flex-col justify-start shrink-0">
                    <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#5C6B7A] block px-3 mb-3">
                        Service Categories
                    </span>
                    <div class="space-y-1">
                        @foreach ($config['columns'] as $idx => $col)
                            <button
                                type="button"
                                @mouseenter="activeCategoryIndex = {{ $idx }}"
                                @focus="activeCategoryIndex = {{ $idx }}"
                                :class="activeCategoryIndex === {{ $idx }} ? 'bg-[#F0F4F8] text-[#153758] font-bold border-l-4 border-[#153758]' : 'text-[#5C6B7A] hover:bg-[#F0F4F8] hover:text-[#153758]'"
                                class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-150 flex items-center justify-between cursor-pointer"
                            >
                                <span class="truncate pr-2">{{ $col['title'] }}</span>
                                <svg
                                    :class="activeCategoryIndex === {{ $idx }} ? 'text-[#153758]' : 'text-[#5C6B7A]'"
                                    class="w-3.5 h-3.5 shrink-0 transition-transform duration-150"
                                    fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                                </svg>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Active Category Content Area -->
                <div class="flex-1 p-7 bg-[#FFFFFF] flex flex-col justify-between overflow-y-auto max-h-[500px]">
                    @foreach ($config['columns'] as $idx => $col)
                        <div x-show="activeCategoryIndex === {{ $idx }}" x-cloak class="h-full flex flex-col justify-between">
                            <div>
                                <!-- Header with Dark Azure Accent Line -->
                                <div class="mb-5">
                                    <h3 class="text-xl font-black text-[#153758] tracking-tight">{{ $col['title'] }}</h3>
                                    <div class="h-[2px] bg-gradient-to-r from-[#153758] via-[#264868] to-transparent mt-2"></div>
                                </div>

                                <!-- Multi-Column Services Grid -->
                                <div class="grid grid-cols-2 gap-x-6 gap-y-2.5">
                                    @foreach ($col['items'] as $subItem)
                                        <a
                                            href="{{ $subItem['href'] }}"
                                            class="group flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-[#5C6B7A] hover:bg-[#F0F4F8] hover:text-[#153758] transition-all duration-150"
                                            title="{{ $subItem['label'] }}"
                                        >
                                            <div class="flex items-center gap-2.5 min-w-0">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#153758] group-hover:bg-[#C1A972] group-hover:scale-125 transition-all shrink-0"></span>
                                                <span class="truncate font-medium">{{ $subItem['label'] }}</span>
                                            </div>
                                            <svg class="w-3.5 h-3.5 text-[#153758] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                            </svg>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Feature / CTA Panel -->
                <div class="w-[260px] bg-[#F8FAFC] border-l border-[#DDE3E9] p-6 flex flex-col justify-between shrink-0">
                    <div class="space-y-4">
                        <span class="inline-block text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-md bg-[#153758]/10 text-[#153758]">
                            Featured Solution
                        </span>
                        
                        <div class="space-y-2">
                            <h4 class="text-base font-bold text-[#153758] leading-snug">{{ $config['cta']['title'] ?? 'Enterprise Engineering' }}</h4>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $config['cta']['description'] ?? 'Modern architectural frameworks, scalable cloud infrastructure, and robust engineering.' }}</p>
                        </div>

                        <div class="pt-2">
                            <ul class="space-y-2 text-xs text-[#153758] font-medium">
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                    <span>High-Performance APIs</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                    <span>Cloud Native & Modular</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                    <span>99.99% Availability SLA</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="space-y-2 pt-6 border-t border-[#DDE3E9]">
                        @if (!empty($config['cta']['secondaryBtnText']) && !empty($config['cta']['secondaryBtnHref']))
                            <a
                                href="{{ $config['cta']['secondaryBtnHref'] }}"
                                class="w-full py-2.5 px-3 text-center text-xs font-bold text-[#153758] bg-[#F0F4F8] hover:bg-[#E2E8F0] rounded-xl transition-all block border border-[#DDE3E9]"
                            >
                                {{ $config['cta']['secondaryBtnText'] }}
                            </a>
                        @endif
                        <a
                            href="{{ $config['cta']['primaryBtnHref'] ?? '/company/contact' }}"
                            class="w-full py-2.5 px-3 text-center text-xs font-bold text-white bg-[#153758] hover:bg-[#264868] rounded-xl transition-all shadow-md block"
                        >
                            {{ $config['cta']['primaryBtnText'] ?? 'Talk to an Expert' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Multi-Column Mega Menu for Industries, Solutions, etc. -->
        <div
            class="mega-menu {{ $config['widthClass'] ?? 'mega-menu-md' }}"
            id="desktop-mega-menu-{{ $item['id'] ?? 'menu' }}"
        >
            <div
                class="bg-[#FFFFFF] border border-[#DDE3E9] rounded-3xl shadow-2xl shadow-[#153758]/12 overflow-hidden text-[#153758] grid min-h-[440px]"
                style="grid-template-columns: repeat({{ count($config['columns']) }}, minmax(0, 1fr)) 260px;"
            >
                @foreach ($config['columns'] as $col)
                    <div class="p-6 border-r border-[#DDE3E9] flex flex-col justify-start">
                        <div class="mb-4">
                            <h4 class="text-xs font-extrabold uppercase tracking-wider text-[#153758]">
                                {{ $col['title'] }}
                            </h4>
                            <div class="h-[2px] bg-gradient-to-r from-[#153758] via-[#264868] to-transparent mt-2"></div>
                        </div>

                        <ul class="space-y-1">
                            @foreach ($col['items'] as $subItem)
                                <li>
                                    <a
                                        href="{{ $subItem['href'] }}"
                                        class="group flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium text-[#5C6B7A] hover:bg-[#F0F4F8] hover:text-[#153758] transition-all duration-150"
                                        title="{{ $subItem['label'] }}"
                                    >
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#153758] group-hover:bg-[#C1A972] group-hover:scale-125 transition-all shrink-0"></span>
                                            <span class="truncate font-medium">{{ $subItem['label'] }}</span>
                                        </div>
                                        <svg class="w-3.5 h-3.5 text-[#153758] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                        </svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

                <!-- Right CTA Column -->
                <div class="bg-[#F8FAFC] p-6 flex flex-col justify-between shrink-0">
                    <div class="space-y-4">
                        <span class="inline-block text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-md bg-[#153758]/10 text-[#153758]">
                            {{ ($item['id'] ?? '') === 'industries' ? 'Domain Expertise' : 'Frameworks & Acceleration' }}
                        </span>

                        <div class="space-y-2">
                            <h4 class="text-base font-bold text-[#153758] leading-snug">{{ $config['cta']['title'] ?? '' }}</h4>
                            <p class="text-xs text-[#5C6B7A] leading-relaxed">{{ $config['cta']['description'] ?? '' }}</p>
                        </div>

                        <div class="pt-2">
                            <ul class="space-y-2 text-xs text-[#153758] font-medium">
                                @if (($item['id'] ?? '') === 'industries')
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Regulatory Compliance</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Tailored Workflows</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Security-First Design</span>
                                    </li>
                                @else
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Fast-Track Deployment</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Modular Architecture</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#153758]"></span>
                                        <span>Enterprise Scalability</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="space-y-2 pt-6 border-t border-[#DDE3E9]">
                        @if (!empty($config['cta']['secondaryBtnText']) && !empty($config['cta']['secondaryBtnHref']))
                            <a
                                href="{{ $config['cta']['secondaryBtnHref'] }}"
                                class="w-full py-2.5 px-3 text-center text-xs font-bold text-[#153758] bg-[#F0F4F8] hover:bg-[#E2E8F0] rounded-xl transition-all block border border-[#DDE3E9]"
                            >
                                {{ $config['cta']['secondaryBtnText'] }}
                            </a>
                        @endif
                        <a
                            href="{{ $config['cta']['primaryBtnHref'] ?? '/' . ($item['id'] ?? '') }}"
                            class="w-full py-2.5 px-3 text-center text-xs font-bold text-white bg-[#153758] hover:bg-[#264868] rounded-xl transition-all shadow-md block"
                        >
                            {{ $config['cta']['primaryBtnText'] ?? 'Explore All' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
