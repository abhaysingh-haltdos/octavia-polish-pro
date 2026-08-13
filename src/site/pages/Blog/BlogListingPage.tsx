import React, { useState, useMemo } from 'react';
import {
  Search,
  Grid,
  List,
  Sparkles,
  ChevronLeft,
  ChevronRight,
  X,
  BookOpen,
} from '@/site/icons';
import { BLOG_ARTICLES, BLOG_CATEGORIES } from '../../data/blogData';
import { BlogCard } from './components/BlogCard';

interface BlogListingPageProps {
  onArticleClick: (slug: string) => void;
  onOpenConsultation?: (topic?: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}

export const BlogListingPage: React.FC<BlogListingPageProps> = ({
  onArticleClick,
  onOpenConsultation: _onOpenConsultation,
  onLinkClick,
}) => {
  // State
  const [searchQuery, setSearchQuery] = useState('');
  const [selectedCategory, setSelectedCategory] = useState<string>('All');
  const [sortBy, setSortBy] = useState<'latest' | 'popular' | 'trending'>('latest');
  const [viewMode, setViewMode] = useState<'grid' | 'list'>('grid');
  const [currentPage, setCurrentPage] = useState<number>(1);

  const ITEMS_PER_PAGE = 12;

  // Filter and Sort articles
  const filteredArticles = useMemo(() => {
    return BLOG_ARTICLES.filter((article) => {
      // Search query
      if (searchQuery.trim()) {
        const query = searchQuery.toLowerCase();
        const matchesTitle = article.title.toLowerCase().includes(query);
        const matchesExcerpt = article.excerpt.toLowerCase().includes(query);
        const matchesCategory = article.category.toLowerCase().includes(query);
        const matchesTags = article.tags.some((t) => t.toLowerCase().includes(query));
        if (!matchesTitle && !matchesExcerpt && !matchesCategory && !matchesTags) {
          return false;
        }
      }

      // Category filter
      if (selectedCategory !== 'All' && article.category !== selectedCategory) {
        return false;
      }

      return true;
    }).sort((a, b) => {
      if (sortBy === 'popular') {
        return b.views - a.views;
      }
      if (sortBy === 'trending') {
        return (b.isTrending ? 1 : 0) - (a.isTrending ? 1 : 0);
      }
      // default: latest
      return new Date(b.publishDate).getTime() - new Date(a.publishDate).getTime();
    });
  }, [searchQuery, selectedCategory, sortBy]);

  // Find Featured Hero Article (if on 'All' category and no active search)
  const featuredArticle = useMemo(() => {
    if (selectedCategory === 'All' && !searchQuery) {
      return BLOG_ARTICLES.find((a) => a.isFeatured) || BLOG_ARTICLES[0];
    }
    return null;
  }, [selectedCategory, searchQuery]);

  // Articles list excluding featured article if shown
  const listArticles = useMemo(() => {
    if (featuredArticle) {
      return filteredArticles.filter((a) => a.id !== featuredArticle.id);
    }
    return filteredArticles;
  }, [filteredArticles, featuredArticle]);

  // Pagination slicing
  const totalPages = Math.ceil(listArticles.length / ITEMS_PER_PAGE) || 1;
  const paginatedArticles = useMemo(() => {
    const start = (currentPage - 1) * ITEMS_PER_PAGE;
    return listArticles.slice(start, start + ITEMS_PER_PAGE);
  }, [listArticles, currentPage]);

  const handleClearAllFilters = () => {
    setSearchQuery('');
    setSelectedCategory('All');
    setCurrentPage(1);
  };

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white pt-24 pb-20">
      
      {/* 1. HERO SECTION */}
      <section className="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div className="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 blur-[140px] rounded-full pointer-events-none" />

        <div className="max-w-7xl mx-auto text-center space-y-6 relative z-10">
          
          {/* Breadcrumbs */}
          <nav className="flex items-center justify-center gap-2 text-xs text-[#93A3B2] font-medium">
            <button
              onClick={() => onLinkClick?.('/', 'Home')}
              className="hover:text-[#C1A972] transition-colors"
            >
              Home
            </button>
            <span>/</span>
            <span className="text-[#C1A972] font-semibold">Engineering Insights & Blog</span>
          </nav>

          {/* Badge */}
          <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-[#C1A972]/40 text-[#C1A972] text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-lg">
            <Sparkles className="w-3.5 h-3.5 text-[#C1A972]" />
            <span>Octavia Engineering Hub</span>
          </div>

          {/* Title */}
          <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
            Enterprise Tech & <br className="hidden sm:inline" />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">
              Architecture Insights
            </span>
          </h1>

          {/* Subtitle */}
          <p className="text-sm sm:text-lg text-[#FEFEFE] max-w-2xl mx-auto leading-relaxed font-normal">
            Deep-dives into IT staff augmentation, AI RAG pipelines, cloud DevSecOps, Next.js architecture, and enterprise software engineering.
          </p>

          {/* Hero Search Bar */}
          <div className="max-w-2xl mx-auto pt-4 relative">
            <div className="relative flex items-center bg-white rounded-2xl p-2 shadow-2xl border border-white/20">
              <Search className="w-5 h-5 text-[#93A3B2] ml-3 shrink-0" />
              <input
                type="text"
                value={searchQuery}
                onChange={(e) => {
                  setSearchQuery(e.target.value);
                  setCurrentPage(1);
                }}
                placeholder="Search by keyword, topic, or tech stack..."
                className="w-full bg-transparent text-[#153758] text-xs sm:text-sm font-medium px-3 py-2 focus:outline-none placeholder-[#93A3B2]"
              />
              {searchQuery ? (
                <button
                  onClick={() => setSearchQuery('')}
                  className="p-2 text-[#93A3B2] hover:text-[#5C6B7A] text-xs font-bold"
                >
                  <X className="w-4 h-4" />
                </button>
              ) : (
                <button
                  type="button"
                  className="px-5 py-2.5 bg-[#264868] hover:bg-[#153758] text-white text-xs font-bold rounded-xl transition-all shadow-md shrink-0 hidden sm:block"
                >
                  Search
                </button>
              )}
            </div>
          </div>

        </div>
      </section>

      {/* 2. MAIN CONTENT AREA */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {/* FEATURED ARTICLE HERO CARD */}
        {featuredArticle && (
          <div className="mb-12">
            <div className="flex items-center gap-2 mb-4">
              <Sparkles className="w-4 h-4 text-[#264868]" />
              <h2 className="text-sm font-extrabold uppercase tracking-wider text-[#264868]">
                Featured Insight
              </h2>
            </div>
            <BlogCard
              article={featuredArticle}
              onArticleClick={onArticleClick}
              onCategoryClick={(cat) => {
                setSelectedCategory(cat);
                setCurrentPage(1);
              }}
              featuredMode={true}
            />
          </div>
        )}

        {/* CATEGORY & FILTER CONTROL BAR */}
        <div className="bg-white border border-[#DDE3E9] rounded-2xl p-4 sm:p-5 shadow-sm mb-8 space-y-4">
          
          {/* Top Row: Categories Pills + View & Sort Controls */}
          <div className="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            
            {/* Category Pills Slider */}
            <div className="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
              {BLOG_CATEGORIES.map((category) => {
                const isActive = selectedCategory === category;
                return (
                  <button
                    key={category}
                    onClick={() => {
                      setSelectedCategory(category);
                      setCurrentPage(1);
                    }}
                    className={`px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap shrink-0 ${
                      isActive
                        ? 'bg-[#264868] text-white shadow-md'
                        : 'bg-[#FEFEFE] text-[#5C6B7A] hover:bg-[#F3F5F7] hover:text-[#264868] border border-[#DDE3E9]'
                    }`}
                  >
                    {category}
                  </button>
                );
              })}
            </div>

            {/* Right Controls: Sort + Grid/List Toggle */}
            <div className="flex items-center justify-between lg:justify-end gap-3 shrink-0">
              
              {/* Sort By Dropdown */}
              <div className="flex items-center gap-2">
                <span className="text-xs text-[#5C6B7A] font-semibold hidden sm:inline">Sort by:</span>
                <select
                  value={sortBy}
                  aria-label="Sort articles"
                  onChange={(e) => setSortBy(e.target.value as any)}
                  className="bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2 focus:outline-none focus:border-[#264868] cursor-pointer"
                >
                  <option value="latest">Latest First</option>
                  <option value="popular">Most Popular</option>
                  <option value="trending">Trending Topics</option>
                </select>
              </div>

              {/* View Toggle (Grid / List) */}
              <div className="flex items-center bg-[#FEFEFE] border border-[#DDE3E9] rounded-xl p-1 gap-1">
                <button
                  onClick={() => setViewMode('grid')}
                  className={`p-1.5 rounded-lg transition-all ${
                    viewMode === 'grid'
                      ? 'bg-[#264868] text-white shadow-sm'
                      : 'text-[#93A3B2] hover:text-[#153758]'
                  }`}
                  title="Grid View"
                >
                  <Grid className="w-4 h-4" />
                </button>
                <button
                  onClick={() => setViewMode('list')}
                  className={`p-1.5 rounded-lg transition-all ${
                    viewMode === 'list'
                      ? 'bg-[#264868] text-white shadow-sm'
                      : 'text-[#93A3B2] hover:text-[#153758]'
                  }`}
                  title="List View"
                >
                  <List className="w-4 h-4" />
                </button>
              </div>

            </div>

          </div>

        </div>

        {/* MAIN FULL-WIDTH ARTICLE CONTAINER */}
        <main className="space-y-8">
          
          {/* Results Count Header */}
          <div className="flex items-center justify-between text-xs text-[#5C6B7A] font-medium">
            <span>
              Showing <strong className="text-[#264868] font-bold">{paginatedArticles.length}</strong> of{' '}
              <strong className="text-[#264868] font-bold">{listArticles.length}</strong> articles
            </span>
            {selectedCategory !== 'All' && (
              <span className="bg-[#264868]/10 text-[#264868] font-bold px-2.5 py-0.5 rounded-full text-[11px]">
                Category: {selectedCategory}
              </span>
            )}
          </div>

          {/* No Articles Found State */}
          {paginatedArticles.length === 0 ? (
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-12 text-center space-y-4">
              <div className="w-16 h-16 bg-[#F3F5F7] text-[#93A3B2] rounded-full flex items-center justify-center mx-auto">
                <BookOpen className="w-8 h-8" />
              </div>
              <h3 className="text-xl font-bold text-[#264868]">No Matching Articles Found</h3>
              <p className="text-xs sm:text-sm text-[#5C6B7A] max-w-md mx-auto">
                We couldn&apos;t find any blog posts matching your search query &quot;{searchQuery}&quot; or selected filters.
              </p>
              <button
                onClick={handleClearAllFilters}
                className="px-6 py-2.5 bg-[#264868] text-white font-bold text-xs rounded-xl shadow-md hover:bg-[#153758] transition-all"
              >
                Clear Search & Filters
              </button>
            </div>
          ) : (
            /* Cards Container - 3 Cards in a Row on Desktop */
            <div
              className={
                viewMode === 'grid'
                  ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6'
                  : 'space-y-4 max-w-4xl mx-auto'
              }
            >
              {paginatedArticles.map((article) => (
                <BlogCard
                  key={article.id}
                  article={article}
                  viewMode={viewMode}
                  onArticleClick={onArticleClick}
                  onCategoryClick={(cat) => {
                    setSelectedCategory(cat);
                    setCurrentPage(1);
                  }}
                />
              ))}
            </div>
          )}

          {/* PAGINATION CONTROLS */}
          {totalPages > 1 && (
            <div className="pt-8 border-t border-[#DDE3E9] flex items-center justify-between gap-4">
              <button
                disabled={currentPage === 1}
                onClick={() => setCurrentPage((prev) => Math.max(prev - 1, 1))}
                className="px-4 py-2 bg-white border border-[#DDE3E9] hover:border-[#264868] disabled:opacity-40 disabled:hover:border-[#DDE3E9] text-xs font-bold text-[#264868] rounded-xl transition-all flex items-center gap-1.5 shadow-sm"
              >
                <ChevronLeft className="w-4 h-4" />
                <span>Previous</span>
              </button>

              <div className="flex items-center gap-1.5">
                {Array.from({ length: totalPages }).map((_, idx) => {
                  const pageNum = idx + 1;
                  const isActive = pageNum === currentPage;
                  return (
                    <button
                      key={pageNum}
                      onClick={() => setCurrentPage(pageNum)}
                      className={`w-9 h-9 rounded-xl text-xs font-bold transition-all ${
                        isActive
                          ? 'bg-[#264868] text-[#C1A972] shadow-md'
                          : 'bg-white text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'
                      }`}
                    >
                      {pageNum}
                    </button>
                  );
                })}
              </div>

              <button
                disabled={currentPage === totalPages}
                onClick={() => setCurrentPage((prev) => Math.min(prev + 1, totalPages))}
                className="px-4 py-2 bg-white border border-[#DDE3E9] hover:border-[#264868] disabled:opacity-40 disabled:hover:border-[#DDE3E9] text-xs font-bold text-[#264868] rounded-xl transition-all flex items-center gap-1.5 shadow-sm"
              >
                <span>Next</span>
                <ChevronRight className="w-4 h-4" />
              </button>
            </div>
          )}

        </main>

      </div>

    </div>
  );
};
