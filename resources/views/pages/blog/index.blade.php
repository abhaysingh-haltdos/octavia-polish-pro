@extends('layouts.app')

@section('content')
<div x-data="blogListing()" class="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pt-24 pb-20">
    <!-- HERO SECTION -->
    <section class="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 blur-[140px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto text-center space-y-6 relative z-10">
            <nav class="flex items-center justify-center gap-2 text-xs text-[#93A3B2] font-medium">
                <a href="/" class="hover:text-[#C1A972] transition-colors">Home</a>
                <span>/</span>
                <span class="text-[#C1A972] font-semibold">Engineering Insights & Blog</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-[#C1A972]/40 text-[#C1A972] text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-lg">
                <svg class="w-3.5 h-3.5 text-[#C1A972]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <span>Octavia Engineering Hub</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                Enterprise Tech & <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">Architecture Insights</span>
            </h1>

            <p class="text-sm sm:text-lg text-[#FEFEFE] max-w-2xl mx-auto leading-relaxed font-normal">
                Deep-dives into IT staff augmentation, AI RAG pipelines, cloud DevSecOps, Next.js architecture, and enterprise software engineering.
            </p>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto pt-4 relative">
                <div class="relative flex items-center bg-white rounded-2xl p-2 shadow-2xl border border-white/20">
                    <svg class="w-5 h-5 text-[#93A3B2] ml-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" x-model="searchQuery" @input="currentPage = 1" placeholder="Search by keyword, topic, or tech stack..." class="w-full bg-transparent text-[#153758] text-xs sm:text-sm font-medium px-3 py-2 focus:outline-none placeholder-[#93A3B2]" />
                    <template x-if="searchQuery">
                        <button @click="searchQuery = ''; currentPage = 1" class="p-2 text-[#93A3B2] hover:text-[#5C6B7A] text-xs font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT AREA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @php
            $featuredArticle = collect($data['posts'])->firstWhere('isFeatured', true) ?? $data['posts'][0];
        @endphp

        <!-- FEATURED ARTICLE -->
        <div x-show="showFeatured" class="mb-12">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-4 h-4 text-[#264868]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <h2 class="text-sm font-extrabold uppercase tracking-wider text-[#264868]">Featured Insight</h2>
            </div>
            <x-blog-card :article="$featuredArticle" :featuredMode="true" />
        </div>

        <!-- CATEGORY & FILTER CONTROL BAR -->
        <div class="bg-white border border-[#DDE3E9] rounded-2xl p-4 sm:p-5 shadow-sm mb-8 space-y-4">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <!-- Category Pills -->
                <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
                    <button @click="setCategory('All')" :class="selectedCategory === 'All' ? 'bg-[#264868] text-white shadow-md' : 'bg-[#FEFEFE] text-[#5C6B7A] hover:bg-[#F3F5F7] hover:text-[#264868] border border-[#DDE3E9]'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap shrink-0">
                        All
                    </button>
                    @foreach($data['categories'] as $cat)
                        @if($cat !== 'All')
                            <button @click="setCategory('{{ $cat }}')" :class="selectedCategory === '{{ $cat }}' ? 'bg-[#264868] text-white shadow-md' : 'bg-[#FEFEFE] text-[#5C6B7A] hover:bg-[#F3F5F7] hover:text-[#264868] border border-[#DDE3E9]'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap shrink-0">
                                {{ $cat }}
                            </button>
                        @endif
                    @endforeach
                </div>

                <!-- Sort & View Controls -->
                <div class="flex items-center justify-between lg:justify-end gap-3 shrink-0">
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-[#5C6B7A] font-semibold hidden sm:inline">Sort by:</span>
                        <select x-model="sortBy" class="bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2 focus:outline-none focus:border-[#264868] cursor-pointer">
                            <option value="latest">Latest First</option>
                            <option value="popular">Most Popular</option>
                            <option value="trending">Trending Topics</option>
                        </select>
                    </div>

                    <div class="flex items-center bg-[#FEFEFE] border border-[#DDE3E9] rounded-xl p-1 gap-1">
                        <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-[#264868] text-white shadow-sm' : 'text-[#93A3B2] hover:text-[#153758]'" class="p-1.5 rounded-lg transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg></button>
                        <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-[#264868] text-white shadow-sm' : 'text-[#93A3B2] hover:text-[#153758]'" class="p-1.5 rounded-lg transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg></button>
                    </div>
                </div>
            </div>
        </div>

        <main class="space-y-8">
            <div class="flex items-center justify-between text-xs text-[#5C6B7A] font-medium">
                <span>
                    Showing <strong class="text-[#264868] font-bold" x-text="paginatedCount"></strong> of <strong class="text-[#264868] font-bold" x-text="filteredCount"></strong> articles
                </span>
                <template x-if="selectedCategory !== 'All'">
                    <span class="bg-[#264868]/10 text-[#264868] font-bold px-2.5 py-0.5 rounded-full text-[11px]" x-text="'Category: ' + selectedCategory"></span>
                </template>
            </div>

            <template x-if="filteredCount === 0">
                <div class="bg-white border border-[#DDE3E9] rounded-3xl p-12 text-center space-y-4">
                    <div class="w-16 h-16 bg-[#F3F5F7] text-[#93A3B2] rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#264868]">No Matching Articles Found</h3>
                    <p class="text-xs sm:text-sm text-[#5C6B7A] max-w-md mx-auto">
                        We couldn't find any blog posts matching your criteria.
                    </p>
                    <button @click="resetFilters" class="px-6 py-2.5 bg-[#264868] text-white font-bold text-xs rounded-xl shadow-md hover:bg-[#153758] transition-all">
                        Clear Search & Filters
                    </button>
                </div>
            </template>

            <!-- Render all, but filter with Alpine x-show for SPA-like feel without dropping SEO entirely -->
            <div :class="viewMode === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4 max-w-4xl mx-auto'">
                @foreach($data['posts'] as $post)
                    @php $isFeat = $post['id'] === $featuredArticle['id']; @endphp
                    <div x-show="isArticleVisible('{{ $post['id'] }}')" class="h-full">
                        <div x-show="viewMode === 'grid'" class="h-full">
                            <x-blog-card :article="$post" viewMode="grid" />
                        </div>
                        <div x-show="viewMode === 'list'" class="h-full">
                            <x-blog-card :article="$post" viewMode="list" />
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <template x-if="totalPages > 1">
                <div class="pt-8 border-t border-[#DDE3E9] flex items-center justify-between gap-4">
                    <button :disabled="currentPage === 1" @click="currentPage--" class="px-4 py-2 bg-white border border-[#DDE3E9] hover:border-[#264868] disabled:opacity-40 disabled:hover:border-[#DDE3E9] text-xs font-bold text-[#264868] rounded-xl transition-all flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span>Previous</span>
                    </button>

                    <div class="flex items-center gap-1.5">
                        <template x-for="p in totalPages" :key="p">
                            <button @click="currentPage = p" :class="currentPage === p ? 'bg-[#264868] text-[#C1A972] shadow-md' : 'bg-white text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'" class="w-9 h-9 rounded-xl text-xs font-bold transition-all" x-text="p"></button>
                        </template>
                    </div>

                    <button :disabled="currentPage === totalPages" @click="currentPage++" class="px-4 py-2 bg-white border border-[#DDE3E9] hover:border-[#264868] disabled:opacity-40 disabled:hover:border-[#DDE3E9] text-xs font-bold text-[#264868] rounded-xl transition-all flex items-center gap-1.5 shadow-sm">
                        <span>Next</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </template>
        </main>
    </div>
</div>

<script>
    function blogListing() {
        const allPosts = @json($data['posts']);
        const featuredId = "{{ $featuredArticle['id'] }}";
        const itemsPerPage = 12;

        return {
            searchQuery: '',
            selectedCategory: 'All',
            sortBy: 'latest',
            viewMode: 'grid',
            currentPage: 1,

            get showFeatured() {
                return this.selectedCategory === 'All' && !this.searchQuery;
            },

            // Compute the filtered and sorted array of IDs
            get sortedAndFilteredIds() {
                let filtered = allPosts.filter(post => {
                    if (this.showFeatured && post.id === featuredId) return false;

                    if (this.searchQuery) {
                        const q = this.searchQuery.toLowerCase();
                        const matches = post.title.toLowerCase().includes(q) ||
                                        post.excerpt.toLowerCase().includes(q) ||
                                        post.category.toLowerCase().includes(q) ||
                                        (post.tags && post.tags.some(t => t.toLowerCase().includes(q)));
                        if (!matches) return false;
                    }

                    if (this.selectedCategory !== 'All' && post.category !== this.selectedCategory) {
                        return false;
                    }

                    return true;
                });

                filtered.sort((a, b) => {
                    if (this.sortBy === 'popular' || this.sortBy === 'trending') {
                        return b.views - a.views;
                    }
                    return new Date(b.publishDate).getTime() - new Date(a.publishDate).getTime();
                });

                return filtered.map(f => f.id);
            },

            get filteredCount() {
                return this.sortedAndFilteredIds.length;
            },

            get totalPages() {
                return Math.max(1, Math.ceil(this.filteredCount / itemsPerPage));
            },

            get paginatedIds() {
                const start = (this.currentPage - 1) * itemsPerPage;
                return this.sortedAndFilteredIds.slice(start, start + itemsPerPage);
            },

            get paginatedCount() {
                return this.paginatedIds.length;
            },

            isArticleVisible(id) {
                return this.paginatedIds.includes(id);
            },

            setCategory(cat) {
                this.selectedCategory = cat;
                this.currentPage = 1;
                window.scrollTo({ top: 400, behavior: 'smooth' });
            },

            resetFilters() {
                this.searchQuery = '';
                this.selectedCategory = 'All';
                this.currentPage = 1;
            }
        }
    }
</script>
@endsection
