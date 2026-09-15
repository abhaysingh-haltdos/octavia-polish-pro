@props(['article', 'viewMode' => 'grid', 'featuredMode' => false])

@php
    $isFeatured = $featuredMode;
    $isList = !$isFeatured && $viewMode === 'list';
    $isGrid = !$isFeatured && $viewMode === 'grid';
@endphp

@if($isFeatured)
    <!-- FEATURED ARTICLE HERO CARD -->
    <a href="/blog/{{ $article['slug'] }}" class="group relative bg-white border border-[#DDE3E9] rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer grid grid-cols-1 lg:grid-cols-12 gap-0 my-8 block">
        <!-- Left Featured Image -->
        <div class="lg:col-span-7 relative h-64 sm:h-80 lg:h-full overflow-hidden bg-[#0F2334]">
            <img src="{{ $article['featuredImage'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent lg:hidden"></div>

            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-[#264868] text-[#D9C48F] border border-[#C1A972]/40 text-xs font-bold rounded-full shadow-md backdrop-blur-md uppercase tracking-wider">
                    Featured Article
                </span>
                <span class="px-3 py-1 bg-black/70 text-white text-xs font-medium rounded-full backdrop-blur-md">
                    {{ $article['category'] }}
                </span>
            </div>
        </div>

        <!-- Right Content Area -->
        <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between bg-white">
            <div class="space-y-4">
                <div class="flex items-center gap-4 text-xs font-medium text-[#5C6B7A]">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article['publishDate'] }}
                    </span>
                </div>

                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug">
                    {{ $article['title'] }}
                </h2>

                <p class="text-sm sm:text-base text-[#5C6B7A] line-clamp-3 leading-relaxed font-normal">
                    {{ $article['excerpt'] }}
                </p>
            </div>

            <div class="pt-6 mt-6 border-t border-[#F3F5F7] flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ $article['author']['avatar'] }}" alt="{{ $article['author']['name'] }}" class="w-10 h-10 rounded-full object-cover border-2 border-[#C1A972]/50 shadow-sm" />
                    <div>
                        <span class="text-xs font-bold text-[#264868] block">{{ $article['author']['name'] }}</span>
                        <span class="text-[11px] text-[#5C6B7A] line-clamp-1">{{ $article['author']['role'] }}</span>
                    </div>
                </div>

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#264868] hover:bg-[#153758] text-white text-xs font-bold transition-all shadow-md group-hover:shadow-lg group/btn shrink-0">
                    <span>Read Full Article</span>
                    <svg class="w-4 h-4 text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>
        </div>
    </a>

@elseif($isList)
    <!-- Horizontal List View -->
    <a href="/blog/{{ $article['slug'] }}" class="group bg-white border border-[#DDE3E9] hover:border-[#C1A972]/60 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col sm:flex-row gap-5 items-stretch block">
        <div class="sm:w-56 h-48 sm:h-auto shrink-0 relative overflow-hidden rounded-xl bg-[#0F2334]">
            <img src="{{ $article['featuredImage'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy" />
            <button @click.prevent="setCategory('{{ $article['category'] }}')" class="absolute top-2.5 left-2.5 px-2.5 py-1 bg-[#264868]/90 text-white text-[11px] font-bold rounded-lg backdrop-blur-md hover:bg-[#264868]">
                {{ $article['category'] }}
            </button>
        </div>

        <div class="flex-1 flex flex-col justify-between space-y-3">
            <div class="space-y-2">
                <div class="flex items-center gap-3 text-xs text-[#5C6B7A] font-medium">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article['publishDate'] }}
                    </span>
                </div>

                <h3 class="text-lg font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug line-clamp-2">
                    {{ $article['title'] }}
                </h3>

                <p class="text-xs sm:text-sm text-[#5C6B7A] line-clamp-2 leading-relaxed">
                    {{ $article['excerpt'] }}
                </p>
            </div>

            <div class="flex items-center justify-between pt-2 border-t border-[#F3F5F7] text-xs">
                <div class="flex items-center gap-2">
                    <img src="{{ $article['author']['avatar'] }}" alt="{{ $article['author']['name'] }}" class="w-7 h-7 rounded-full object-cover" />
                    <span class="font-semibold text-[#153758]">{{ $article['author']['name'] }}</span>
                </div>

                <span class="text-[#264868] font-bold flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                    Read <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
            </div>
        </div>
    </a>

@else
    <!-- Standard Grid Card View -->
    <a href="/blog/{{ $article['slug'] }}" class="group bg-white border border-[#DDE3E9] hover:border-[#C1A972]/80 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col h-full block">
        <div class="relative h-48 sm:h-52 overflow-hidden bg-[#0F2334] shrink-0">
            <img src="{{ $article['featuredImage'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

            <button @click.prevent="setCategory('{{ $article['category'] }}')" class="absolute top-3 left-3 px-3 py-1 bg-[#264868]/90 hover:bg-[#264868] text-[#D9C48F] border border-[#C1A972]/30 text-[11px] font-bold rounded-full backdrop-blur-md shadow-sm transition-all">
                {{ $article['category'] }}
            </button>

            @if(!empty($article['isTrending']))
                <span class="absolute top-3 right-3 px-2.5 py-0.5 bg-[#C1A972] text-[#153758] text-[10px] font-extrabold rounded-full uppercase tracking-wider shadow-sm">
                    Trending
                </span>
            @endif
        </div>

        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="space-y-2.5">
                <div class="flex items-center gap-3 text-[11px] text-[#5C6B7A] font-medium">
                    <span class="flex items-center gap-1">
                        <svg class="w-3 h-3 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article['publishDate'] }}
                    </span>
                </div>

                <h3 class="text-base sm:text-lg font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug line-clamp-2">
                    {{ $article['title'] }}
                </h3>

                <p class="text-xs text-[#5C6B7A] line-clamp-3 leading-relaxed font-normal">
                    {{ $article['excerpt'] }}
                </p>
            </div>

            <div class="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs mt-auto">
                <div class="flex items-center gap-2">
                    <img src="{{ $article['author']['avatar'] }}" alt="{{ $article['author']['name'] }}" class="w-7 h-7 rounded-full object-cover border border-[#DDE3E9]" />
                    <span class="font-semibold text-[#153758] text-[11px] line-clamp-1">
                        {{ $article['author']['name'] }}
                    </span>
                </div>

                <span class="text-[#264868] font-bold text-xs flex items-center gap-1 group-hover:translate-x-1 transition-transform shrink-0">
                    Read More
                    <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
            </div>
        </div>
    </a>
@endif
