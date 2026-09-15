@extends('layouts.app')

@section('content')
<div x-data="caseStudiesListing()" class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pt-24 pb-20">
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[400px] bg-[#C1A972]/10 blur-[150px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto text-center space-y-6 relative z-10">
            <nav class="flex items-center justify-center gap-2 text-xs text-[#B4C1CD] font-medium">
                <a href="/" class="hover:text-[#D9C48F] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#D9C48F] font-semibold">Enterprise Case Studies</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-[#C1A972]/40 text-[#D9C48F] text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-lg">
                <svg class="w-3.5 h-3.5 text-[#D9C48F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Measurable Business Transformation</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                Enterprise Client <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">Success Stories & ROI</span>
            </h1>

            <p class="text-sm sm:text-lg text-[#FEFEFE] max-w-3xl mx-auto leading-relaxed font-normal">
                Explore how Fortune 500 enterprises and hyper-growth tech leaders partner with Octavia Tech Solutions to solve complex engineering challenges, automate financial operations, and scale cloud infrastructure.
            </p>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto pt-4">
                <div class="relative flex items-center bg-white rounded-2xl p-2 shadow-2xl border border-white/20">
                    <svg class="w-5 h-5 text-[#B4C1CD] ml-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" x-model="searchQuery" placeholder="Search case studies by client, technology, or challenge..." class="w-full bg-transparent text-[#153758] text-xs sm:text-sm font-medium px-3 py-2 focus:outline-none placeholder-[#93A3B2]" />
                    <template x-if="searchQuery">
                        <button @click="searchQuery = ''" class="p-2 text-[#B4C1CD] hover:text-[#5C6B7A] text-xs font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- SUCCESS METRICS SECTION -->
    <section class="bg-white border-b border-[#DDE3E9] py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-[#264868]">$1.8B+</div>
                <div class="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">Client Value Created</div>
            </div>
            <div class="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-[#264868]">99.99%</div>
                <div class="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">SLA System Uptime</div>
            </div>
            <div class="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-[#264868]">120+</div>
                <div class="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">Enterprise Deliveries</div>
            </div>
            <div class="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
                <div class="text-2xl sm:text-4xl font-black text-[#264868]">45%</div>
                <div class="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">Avg Cost Reduction</div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT AREA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
        
        <!-- FEATURED HERO BANNER -->
        <template x-if="featuredStudy">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    <h2 class="text-xs font-extrabold uppercase tracking-widest text-[#264868]">Featured Enterprise Case Study</h2>
                </div>
                <!-- Since Alpine is client-side and blade components are server-side, we must render it manually or use Alpine logic. Since we passed the data as JSON to Alpine, we can't easily use the Blade component inside an x-for unless we render all of them and use x-show. For SEO, we will render ALL cards with Blade and filter using Alpine x-show! -->
            </div>
        </template>
        
        @php
            // We find the featured one from PHP directly so it's always there for SEO
            $featuredStudy = collect($data['studies'])->firstWhere('isFeatured', true) ?? $data['studies'][0];
        @endphp

        <div x-show="showFeatured" class="space-y-4">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-[#264868]">Featured Enterprise Case Study</h2>
            </div>
            <x-case-study-card :caseStudy="$featuredStudy" :featuredMode="true" />
        </div>

        <!-- COMPREHENSIVE FILTER BAR -->
        <div class="bg-white border border-[#DDE3E9] rounded-2xl p-5 shadow-sm space-y-4">
            <!-- Header & Reset -->
            <div class="flex items-center justify-between flex-wrap gap-3 pb-3 border-b border-[#F3F5F7]">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#264868]">Filter Case Studies</span>
                </div>
                <template x-if="activeFilterCount > 0">
                    <button @click="resetFilters" class="text-xs text-[#153758] font-bold flex items-center gap-1 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span>Reset All Filters</span>
                    </button>
                </template>
            </div>

            <!-- Filter Dropdowns Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-[#5C6B7A] uppercase">Industry</label>
                    <select x-model="selectedIndustry" class="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none">
                        @foreach($data['industries'] as $ind)
                            <option value="{{ $ind }}">{{ $ind }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-[#5C6B7A] uppercase">Service Offered</label>
                    <select x-model="selectedService" class="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none">
                        @foreach($data['services'] as $srv)
                            <option value="{{ $srv }}">{{ $srv }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-[#5C6B7A] uppercase">Technology</label>
                    <select x-model="selectedTech" class="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none">
                        @foreach($data['technologies'] as $tech)
                            <option value="{{ $tech }}">{{ $tech }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-[#5C6B7A] uppercase">Solution</label>
                    <select x-model="selectedSolution" class="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none">
                        @foreach($data['solutions'] as $sol)
                            <option value="{{ $sol }}">{{ $sol }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- View Mode & Sort Controls -->
            <div class="flex items-center justify-between pt-2 border-t border-[#F3F5F7] flex-wrap gap-3">
                <div class="text-xs text-[#5C6B7A] font-medium">
                    Showing <strong class="text-[#264868] font-bold" x-text="filteredCount"></strong> studies
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center bg-[#FEFEFE] border border-[#DDE3E9] rounded-xl p-1 gap-1">
                        <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-[#264868] text-white shadow-sm' : 'text-[#B4C1CD] hover:text-[#153758]'" class="p-1.5 rounded-lg transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg></button>
                        <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-[#264868] text-white shadow-sm' : 'text-[#B4C1CD] hover:text-[#153758]'" class="p-1.5 rounded-lg transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- GRID/LIST AREA -->
        <main class="space-y-8">
            <template x-if="filteredCount === 0">
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-12 text-center space-y-4">
                    <h3 class="text-xl font-bold text-[#264868]">No Matching Case Studies Found</h3>
                    <button @click="resetFilters" class="px-6 py-2.5 bg-[#264868] text-white font-bold text-xs rounded-xl shadow-md">Clear All Filters</button>
                </div>
            </template>

            <!-- Render all, but filter with x-show -->
            <div :class="viewMode === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4 max-w-4xl mx-auto'">
                @foreach($data['studies'] as $cs)
                    @php $isFeat = $cs['id'] === $featuredStudy['id']; @endphp
                    <div x-show="matchesFilter('{{ $cs['id'] }}')" class="h-full" {{ $isFeat ? 'x-ref="featured"' : '' }}>
                        <div x-show="viewMode === 'grid'" class="h-full">
                            <x-case-study-card :caseStudy="$cs" viewMode="grid" />
                        </div>
                        <div x-show="viewMode === 'list'" class="h-full">
                            <x-case-study-card :caseStudy="$cs" viewMode="list" />
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

<script>
    function caseStudiesListing() {
        const studies = @json($data['studies']);
        const featuredId = "{{ $featuredStudy['id'] }}";
        
        return {
            searchQuery: '',
            selectedIndustry: 'All',
            selectedService: 'All',
            selectedTech: 'All',
            selectedSolution: 'All',
            viewMode: 'grid',

            get activeFilterCount() {
                return (this.selectedIndustry !== 'All' ? 1 : 0) +
                       (this.selectedService !== 'All' ? 1 : 0) +
                       (this.selectedTech !== 'All' ? 1 : 0) +
                       (this.selectedSolution !== 'All' ? 1 : 0) +
                       (this.searchQuery ? 1 : 0);
            },
            
            get showFeatured() {
                return this.activeFilterCount === 0;
            },

            matchesFilter(id) {
                // If we are showing featured, exclude it from the list
                if (this.showFeatured && id === featuredId) return false;

                const study = studies.find(s => s.id === id);
                if (!study) return false;

                // Search query
                if (this.searchQuery) {
                    const q = this.searchQuery.toLowerCase();
                    const matches = study.title.toLowerCase().includes(q) ||
                                    study.clientName.toLowerCase().includes(q) ||
                                    study.shortChallenge.toLowerCase().includes(q) ||
                                    study.industry.toLowerCase().includes(q) ||
                                    study.technologies.some(t => t.toLowerCase().includes(q));
                    if (!matches) return false;
                }

                if (this.selectedIndustry !== 'All' && study.industry !== this.selectedIndustry) return false;
                if (this.selectedService !== 'All' && study.serviceCategory !== this.selectedService) return false;
                if (this.selectedTech !== 'All' && !study.technologies.includes(this.selectedTech)) return false;
                if (this.selectedSolution !== 'All' && study.solutionCategory !== this.selectedSolution) return false;

                return true;
            },

            get filteredCount() {
                let count = 0;
                studies.forEach(study => {
                    if (this.matchesFilter(study.id)) count++;
                });
                return count;
            },

            resetFilters() {
                this.searchQuery = '';
                this.selectedIndustry = 'All';
                this.selectedService = 'All';
                this.selectedTech = 'All';
                this.selectedSolution = 'All';
            },

            setIndustry(ind) {
                this.selectedIndustry = ind;
                window.scrollTo({ top: 400, behavior: 'smooth' });
            }
        }
    }
</script>
@endsection
