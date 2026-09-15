@props(['caseStudy', 'viewMode' => 'grid', 'featuredMode' => false])

@php
    // Determine the array-based values to support Blade
    $isFeatured = $featuredMode;
    $isList = !$isFeatured && $viewMode === 'list';
    $isGrid = !$isFeatured && $viewMode === 'grid';
@endphp

@if($isFeatured)
    <!-- FEATURED HIGHLIGHT CARD -->
    <div class="group relative bg-white border border-[#DDE3E9] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 grid grid-cols-1 lg:grid-cols-12">
        <!-- Left Image Section -->
        <div class="lg:col-span-6 relative overflow-hidden min-h-[300px] lg:min-h-[420px]">
            <img src="{{ $caseStudy['featuredImage'] }}" alt="{{ $caseStudy['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#153758]/80 via-transparent to-transparent lg:hidden"></div>

            <div class="absolute top-4 left-4 z-10 flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#153758]/90 text-[#D9C48F] text-xs font-black uppercase tracking-wider backdrop-blur-md border border-[#C1A972]/40 shadow-lg">
                <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Featured Enterprise Success</span>
            </div>

            <div class="absolute bottom-4 left-4 z-10 lg:hidden flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-[#264868] text-xs font-bold rounded-full">
                    {{ $caseStudy['industry'] }}
                </span>
            </div>
        </div>

        <!-- Right Content Section -->
        <div class="lg:col-span-6 p-6 sm:p-8 lg:p-10 flex flex-col justify-between space-y-6 bg-gradient-to-br from-white via-[#FEFEFE] to-[#C1A972]/20">
            <div class="space-y-4">
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="setIndustry('{{ $caseStudy['industry'] }}')" class="px-3 py-1 bg-[#264868]/10 hover:bg-[#264868] hover:text-white text-[#264868] text-xs font-bold rounded-full transition-all">
                        {{ $caseStudy['industry'] }}
                    </button>
                    <span class="text-[#B4C1CD]">•</span>
                    <span class="px-3 py-1 bg-[#C1A972]/15 text-[#153758] text-xs font-bold rounded-full border border-[#C1A972]/30">
                        {{ $caseStudy['serviceCategory'] }}
                    </span>
                </div>

                <a href="/case-studies/{{ $caseStudy['slug'] }}" class="block text-xl sm:text-2xl lg:text-3xl font-black text-[#264868] hover:text-[#D9C48F] transition-colors leading-tight">
                    {{ $caseStudy['title'] }}
                </a>

                <p class="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed font-normal">
                    <strong class="text-[#264868] font-bold">The Challenge: </strong>
                    {{ $caseStudy['shortChallenge'] }}
                </p>

                <div class="p-3.5 bg-[#264868] text-white rounded-2xl flex items-start gap-3 shadow-md border border-[#264868]/20">
                    <div class="p-2 bg-[#C1A972]/20 text-[#D9C48F] rounded-xl shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-extrabold text-[#D9C48F] tracking-wider block">Measurable Impact</span>
                        <p class="text-xs font-bold text-white leading-snug">
                            {{ $caseStudy['resultHighlight'] }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                    @foreach(array_slice($caseStudy['kpis'], 0, 3) as $kpi)
                        <div class="bg-white border border-[#DDE3E9] p-3 rounded-2xl shadow-sm text-center">
                            <div class="text-lg sm:text-xl font-black text-[#264868]">{{ $kpi['value'] }}</div>
                            <div class="text-[10px] font-bold text-[#5C6B7A] uppercase tracking-tight">{{ $kpi['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap items-center gap-1.5 pt-2">
                    <svg class="w-3.5 h-3.5 text-[#B4C1CD] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    @foreach($caseStudy['technologies'] as $tech)
                        <span class="px-2.5 py-0.5 bg-[#F3F5F7] text-[#153758] text-[11px] font-medium rounded-md border border-[#DDE3E9]">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="pt-4 border-t border-[#DDE3E9] flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4 text-xs text-[#5C6B7A] font-medium">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $caseStudy['clientLocation'] }}
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $caseStudy['projectDuration'] }}
                    </span>
                </div>

                <a href="/case-studies/{{ $caseStudy['slug'] }}" class="px-5 py-2.5 bg-[#264868] hover:bg-[#153758] text-white text-xs font-extrabold rounded-xl transition-all shadow-md hover:shadow-lg flex items-center gap-2 group/btn">
                    <span>Read Case Study</span>
                    <svg class="w-4 h-4 text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

@elseif($isList)
    <!-- LIST VIEW ITEM -->
    <div class="group bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl p-5 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row items-center gap-6">
        <div class="w-full sm:w-48 h-36 rounded-xl overflow-hidden shrink-0 relative">
            <img src="{{ $caseStudy['featuredImage'] }}" alt="{{ $caseStudy['title'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <span class="absolute top-2 left-2 px-2.5 py-0.5 bg-[#153758]/80 backdrop-blur-md text-[#D9C48F] text-[10px] font-extrabold rounded-md">
                {{ $caseStudy['industry'] }}
            </span>
        </div>

        <div class="flex-1 space-y-3">
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <span class="px-2.5 py-0.5 bg-[#264868]/10 text-[#264868] font-bold rounded-md">
                    {{ $caseStudy['serviceCategory'] }}
                </span>
                <span class="text-[#B4C1CD]">•</span>
                <span class="text-[#5C6B7A] font-medium flex items-center gap-1">
                    <svg class="w-3 h-3 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    {{ $caseStudy['clientLocation'] }}
                </span>
                <span class="text-[#B4C1CD]">•</span>
                <span class="text-[#5C6B7A] font-medium flex items-center gap-1">
                    <svg class="w-3 h-3 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $caseStudy['projectDuration'] }}
                </span>
            </div>

            <a href="/case-studies/{{ $caseStudy['slug'] }}" class="block text-base font-extrabold text-[#264868] hover:text-[#D9C48F] transition-colors leading-snug line-clamp-1">
                {{ $caseStudy['title'] }}
            </a>

            <p class="text-xs text-[#5C6B7A] line-clamp-2 leading-relaxed">
                {{ $caseStudy['shortChallenge'] }}
            </p>

            <div class="flex flex-wrap items-center justify-between gap-3 pt-1">
                <div class="flex flex-wrap items-center gap-1">
                    @foreach(array_slice($caseStudy['technologies'], 0, 3) as $t)
                        <span class="px-2 py-0.5 bg-[#F3F5F7] text-[#5C6B7A] text-[10px] font-semibold rounded">
                            {{ $t }}
                        </span>
                    @endforeach
                </div>

                <a href="/case-studies/{{ $caseStudy['slug'] }}" class="text-xs font-extrabold text-[#264868] hover:text-[#D9C48F] transition-colors inline-flex items-center gap-1">
                    <span>Explore Case Study</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

@else
    <!-- STANDARD GRID CARD -->
    <div class="group bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
        <div>
            <!-- Cover Image Container -->
            <div class="relative h-48 overflow-hidden bg-[#F3F5F7]">
                <img src="{{ $caseStudy['featuredImage'] }}" alt="{{ $caseStudy['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>

                <!-- Industry & Service Badges -->
                <div class="absolute top-3 left-3 right-3 flex items-center justify-between z-10">
                    <button @click.prevent="setIndustry('{{ $caseStudy['industry'] }}')" class="px-2.5 py-1 bg-[#153758]/90 hover:bg-[#264868] backdrop-blur-md text-[#D9C48F] text-[11px] font-bold rounded-lg shadow-md transition-all border border-[#C1A972]/30">
                        {{ $caseStudy['industry'] }}
                    </button>

                    <span class="px-2.5 py-1 bg-white/90 backdrop-blur-md text-[#264868] text-[10px] font-extrabold rounded-lg shadow-md">
                        {{ $caseStudy['serviceCategory'] }}
                    </span>
                </div>

                <!-- Location & Duration floating bar -->
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-white/90 font-medium z-10">
                    <span class="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-2 py-0.5 rounded-md">
                        <svg class="w-3 h-3 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        {{ $caseStudy['clientLocation'] }}
                    </span>
                    <span class="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-2 py-0.5 rounded-md">
                        <svg class="w-3 h-3 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $caseStudy['projectDuration'] }}
                    </span>
                </div>
            </div>

            <!-- Card Content Body -->
            <div class="p-5 space-y-4">
                <a href="/case-studies/{{ $caseStudy['slug'] }}" class="block text-base sm:text-lg font-extrabold text-[#264868] hover:text-[#D9C48F] transition-colors leading-snug line-clamp-2">
                    {{ $caseStudy['title'] }}
                </a>

                <p class="text-xs text-[#5C6B7A] line-clamp-2 leading-relaxed font-normal">
                    <strong class="text-[#264868] font-semibold">Challenge: </strong>
                    {{ $caseStudy['shortChallenge'] }}
                </p>

                <div class="p-3 bg-[#C1A972]/50 border border-[#C1A972]/30 rounded-xl space-y-1">
                    <div class="flex items-center gap-1.5 text-[10px] font-black uppercase text-[#264868]">
                        <svg class="w-3 h-3 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        <span>Key Business Outcome</span>
                    </div>
                    <p class="text-xs font-bold text-[#153758] line-clamp-2 leading-tight">
                        {{ $caseStudy['resultHighlight'] }}
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-1 pt-1">
                    @foreach($caseStudy['technologies'] as $tech)
                        <span class="px-2 py-0.5 bg-[#F3F5F7] text-[#5C6B7A] text-[10px] font-semibold rounded-md border border-[#DDE3E9]">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="p-5 pt-0 border-t border-[#F3F5F7] mt-2">
            <a href="/case-studies/{{ $caseStudy['slug'] }}" class="w-full mt-3 py-2.5 bg-[#FEFEFE] hover:bg-[#264868] text-[#264868] hover:text-white border border-[#DDE3E9] hover:border-transparent text-xs font-extrabold rounded-xl transition-all shadow-sm flex items-center justify-center gap-2 group/btn">
                <span>Read Case Study</span>
                <svg class="w-3.5 h-3.5 group-hover/btn:text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
@endif
