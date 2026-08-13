import React, { useState, useMemo } from 'react';
import {
  Search,
  Filter,
  Grid,
  List,
  Sparkles,
  ChevronLeft,
  ChevronRight,
  X,
  BookOpen,
  Award,
  Users,
  Building2,
  CheckCircle2,
  ArrowRight,
  Mail,
  Shield,
  Layers,
  Cpu,
} from '@/site/icons';
import {
  CASE_STUDIES,
  CASE_STUDIES_INDUSTRIES,
  CASE_STUDIES_SERVICES,
  CASE_STUDIES_TECHNOLOGIES,
  CASE_STUDIES_SOLUTIONS,
} from '../../data/caseStudiesData';
import { CaseStudyCard } from './components/CaseStudyCard';

interface CaseStudiesListingPageProps {
  onCaseStudyClick: (slug: string) => void;
  onOpenConsultation?: (topic?: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}

export const CaseStudiesListingPage: React.FC<CaseStudiesListingPageProps> = ({
  onCaseStudyClick,
  onOpenConsultation,
  onLinkClick,
}) => {
  // Filters State
  const [searchQuery, setSearchQuery] = useState('');
  const [selectedIndustry, setSelectedIndustry] = useState<string>('All');
  const [selectedService, setSelectedService] = useState<string>('All');
  const [selectedTech, setSelectedTech] = useState<string>('All');
  const [selectedSolution, setSelectedSolution] = useState<string>('All');
  
  const [sortBy, setSortBy] = useState<'latest' | 'featured'>('latest');
  const [viewMode, setViewMode] = useState<'grid' | 'list'>('grid');
  const [currentPage, setCurrentPage] = useState<number>(1);
  const [newsletterEmail, setNewsletterEmail] = useState('');
  const [newsletterSubscribed, setNewsletterSubscribed] = useState(false);

  const ITEMS_PER_PAGE = 12;

  // Filter logic
  const filteredCaseStudies = useMemo(() => {
    return CASE_STUDIES.filter((item) => {
      // Search query filter
      if (searchQuery.trim()) {
        const query = searchQuery.toLowerCase();
        const matchesTitle = item.title.toLowerCase().includes(query);
        const matchesClient = item.clientName.toLowerCase().includes(query);
        const matchesChallenge = item.shortChallenge.toLowerCase().includes(query);
        const matchesTech = item.technologies.some((t) => t.toLowerCase().includes(query));
        const matchesIndustry = item.industry.toLowerCase().includes(query);
        if (!matchesTitle && !matchesClient && !matchesChallenge && !matchesTech && !matchesIndustry) {
          return false;
        }
      }

      // Industry filter
      if (selectedIndustry !== 'All' && item.industry !== selectedIndustry) {
        return false;
      }

      // Service filter
      if (selectedService !== 'All' && item.serviceCategory !== selectedService) {
        return false;
      }

      // Tech filter
      if (selectedTech !== 'All' && !item.technologies.includes(selectedTech)) {
        return false;
      }

      // Solution filter
      if (selectedSolution !== 'All' && item.solutionCategory !== selectedSolution) {
        return false;
      }

      return true;
    }).sort((a, b) => {
      if (sortBy === 'featured') {
        return (b.isFeatured ? 1 : 0) - (a.isFeatured ? 1 : 0);
      }
      return new Date(b.publishDate).getTime() - new Date(a.publishDate).getTime();
    });
  }, [searchQuery, selectedIndustry, selectedService, selectedTech, selectedSolution, sortBy]);

  // Featured Hero Case Study (if on 'All' filters and no search)
  const featuredCaseStudy = useMemo(() => {
    if (
      selectedIndustry === 'All' &&
      selectedService === 'All' &&
      selectedTech === 'All' &&
      selectedSolution === 'All' &&
      !searchQuery
    ) {
      return CASE_STUDIES.find((cs) => cs.isFeatured) || CASE_STUDIES[0];
    }
    return null;
  }, [selectedIndustry, selectedService, selectedTech, selectedSolution, searchQuery]);

  // List of items excluding featured
  const listCaseStudies = useMemo(() => {
    if (featuredCaseStudy) {
      return filteredCaseStudies.filter((cs) => cs.id !== featuredCaseStudy.id);
    }
    return filteredCaseStudies;
  }, [filteredCaseStudies, featuredCaseStudy]);

  // Pagination
  const totalPages = Math.ceil(listCaseStudies.length / ITEMS_PER_PAGE) || 1;
  const paginatedCaseStudies = useMemo(() => {
    const start = (currentPage - 1) * ITEMS_PER_PAGE;
    return listCaseStudies.slice(start, start + ITEMS_PER_PAGE);
  }, [listCaseStudies, currentPage]);

  const handleClearAllFilters = () => {
    setSearchQuery('');
    setSelectedIndustry('All');
    setSelectedService('All');
    setSelectedTech('All');
    setSelectedSolution('All');
    setCurrentPage(1);
  };

  const handleNewsletterSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (newsletterEmail) {
      setNewsletterSubscribed(true);
      setTimeout(() => setNewsletterSubscribed(false), 5000);
      setNewsletterEmail('');
    }
  };

  const activeFilterCount =
    (selectedIndustry !== 'All' ? 1 : 0) +
    (selectedService !== 'All' ? 1 : 0) +
    (selectedTech !== 'All' ? 1 : 0) +
    (selectedSolution !== 'All' ? 1 : 0) +
    (searchQuery ? 1 : 0);

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans selection:bg-[#264868] selection:text-white pt-24 pb-20">
      
      {/* 1. HERO SECTION */}
      <section className="bg-gradient-to-b from-[#153758] via-[#264868] to-[#153758] text-white py-16 sm:py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div className="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[400px] bg-[#C1A972]/10 blur-[150px] rounded-full pointer-events-none" />

        <div className="max-w-7xl mx-auto text-center space-y-6 relative z-10">
          
          {/* Breadcrumbs */}
          <nav className="flex items-center justify-center gap-2 text-xs text-[#B4C1CD] font-medium">
            <button
              onClick={() => onLinkClick?.('/', 'Home')}
              className="hover:text-[#D9C48F] transition-colors"
            >
              Home
            </button>
            <span>/</span>
            <span className="text-[#D9C48F] font-semibold">Enterprise Case Studies</span>
          </nav>

          {/* Badge */}
          <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-[#C1A972]/40 text-[#D9C48F] text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-lg">
            <Sparkles className="w-3.5 h-3.5 text-[#D9C48F]" />
            <span>Measurable Business Transformation</span>
          </div>

          {/* Title */}
          <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
            Enterprise Client <br className="hidden sm:inline" />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#C1A972] to-[#C1A972]">
              Success Stories & ROI
            </span>
          </h1>

          {/* Subtitle */}
          <p className="text-sm sm:text-lg text-[#FEFEFE] max-w-3xl mx-auto leading-relaxed font-normal">
            Explore how Fortune 500 enterprises and hyper-growth tech leaders partner with Octavia Tech Solutions to solve complex engineering challenges, automate financial operations, and scale cloud infrastructure.
          </p>

          {/* Search Bar */}
          <div className="max-w-2xl mx-auto pt-4">
            <div className="relative flex items-center bg-white rounded-2xl p-2 shadow-2xl border border-white/20">
              <Search className="w-5 h-5 text-[#B4C1CD] ml-3 shrink-0" />
              <input
                type="text"
                value={searchQuery}
                onChange={(e) => {
                  setSearchQuery(e.target.value);
                  setCurrentPage(1);
                }}
                placeholder="Search case studies by client, technology, or challenge..."
                className="w-full bg-transparent text-[#153758] text-xs sm:text-sm font-medium px-3 py-2 focus:outline-none placeholder-[#93A3B2]"
              />
              {searchQuery ? (
                <button
                  onClick={() => setSearchQuery('')}
                  className="p-2 text-[#B4C1CD] hover:text-[#5C6B7A] text-xs font-bold"
                >
                  <X className="w-4 h-4" />
                </button>
              ) : (
                <button
                  type="button"
                  className="px-6 py-2.5 bg-[#264868] hover:bg-[#153758] text-white text-xs font-bold rounded-xl transition-all shadow-md shrink-0 hidden sm:block"
                >
                  Search
                </button>
              )}
            </div>
          </div>

        </div>
      </section>

      {/* 2. SUCCESS METRICS SECTION (AGGREGATE KPIS) */}
      <section className="bg-white border-b border-[#DDE3E9] py-10 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-6">
          
          <div className="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
            <div className="text-2xl sm:text-4xl font-black text-[#264868]">$1.8B+</div>
            <div className="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">
              Client Value Created
            </div>
          </div>

          <div className="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
            <div className="text-2xl sm:text-4xl font-black text-[#264868]">99.99%</div>
            <div className="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">
              SLA System Uptime
            </div>
          </div>

          <div className="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
            <div className="text-2xl sm:text-4xl font-black text-[#264868]">120+</div>
            <div className="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">
              Enterprise Deliveries
            </div>
          </div>

          <div className="p-6 bg-[#FEFEFE] border border-[#DDE3E9] rounded-2xl text-center space-y-1">
            <div className="text-2xl sm:text-4xl font-black text-[#264868]">45%</div>
            <div className="text-xs font-bold text-[#5C6B7A] uppercase tracking-wider">
              Avg Cost Reduction
            </div>
          </div>

        </div>
      </section>

      {/* 3. CLIENT LOGOS BAR */}
      <section className="py-8 bg-[#153758] text-[#B4C1CD] border-b border-[#153758]">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <p className="text-center text-[11px] font-bold uppercase tracking-widest text-[#D9C48F] mb-6">
            Trusted By Engineering Leaders Across North America & Europe
          </p>
          <div className="flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-80 font-black text-sm sm:text-base tracking-widest text-[#B4C1CD]">
            <span className="hover:text-white transition-colors">APEX FINANCIAL</span>
            <span className="hover:text-white transition-colors">HEALTHPULSE</span>
            <span className="hover:text-white transition-colors">MERIDIAN BANK</span>
            <span className="hover:text-white transition-colors">LUXELIVING</span>
            <span className="hover:text-white transition-colors">VANGUARD IND</span>
            <span className="hover:text-white transition-colors">TELCOONE</span>
          </div>
        </div>
      </section>

      {/* 4. MAIN CONTENT AREA */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">

        {/* FEATURED CASE STUDY HERO BANNER */}
        {featuredCaseStudy && (
          <div className="space-y-4">
            <div className="flex items-center gap-2">
              <Sparkles className="w-4 h-4 text-[#264868]" />
              <h2 className="text-xs font-extrabold uppercase tracking-widest text-[#264868]">
                Featured Enterprise Case Study
              </h2>
            </div>
            <CaseStudyCard
              caseStudy={featuredCaseStudy}
              onReadClick={onCaseStudyClick}
              onCategoryClick={(ind) => {
                setSelectedIndustry(ind);
                setCurrentPage(1);
              }}
              featuredMode={true}
            />
          </div>
        )}

        {/* COMPREHENSIVE FILTER BAR (INDUSTRY, SERVICE, TECH, SOLUTION) */}
        <div className="bg-white border border-[#DDE3E9] rounded-2xl p-5 shadow-sm space-y-4">
          
          {/* Header & Reset Button */}
          <div className="flex items-center justify-between flex-wrap gap-3 pb-3 border-b border-[#F3F5F7]">
            <div className="flex items-center gap-2">
              <Filter className="w-4 h-4 text-[#264868]" />
              <span className="text-xs font-extrabold uppercase tracking-wider text-[#264868]">
                Filter Case Studies
              </span>
              {activeFilterCount > 0 && (
                <span className="px-2 py-0.5 bg-[#264868] text-white text-[10px] font-bold rounded-full">
                  {activeFilterCount} Active
                </span>
              )}
            </div>

            {activeFilterCount > 0 && (
              <button
                onClick={handleClearAllFilters}
                className="text-xs text-[#153758] hover:text-[#153758] font-bold flex items-center gap-1 transition-colors"
              >
                <X className="w-3.5 h-3.5" />
                <span>Reset All Filters</span>
              </button>
            )}
          </div>

          {/* Filter Dropdowns Grid */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            {/* Filter 1: Industry */}
            <div className="space-y-1">
              <label className="text-[11px] font-bold text-[#5C6B7A] uppercase tracking-tight flex items-center gap-1">
                <Building2 className="w-3 h-3 text-[#264868]" />
                Industry
              </label>
              <select
                aria-label="Filter by industry"
                value={selectedIndustry}
                onChange={(e) => {
                  setSelectedIndustry(e.target.value);
                  setCurrentPage(1);
                }}
                className="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none focus:border-[#264868] cursor-pointer"
              >
                {CASE_STUDIES_INDUSTRIES.map((ind) => (
                  <option key={ind} value={ind}>
                    {ind}
                  </option>
                ))}
              </select>
            </div>

            {/* Filter 2: Service Category */}
            <div className="space-y-1">
              <label className="text-[11px] font-bold text-[#5C6B7A] uppercase tracking-tight flex items-center gap-1">
                <Layers className="w-3 h-3 text-[#264868]" />
                Service Offered
              </label>
              <select
                aria-label="Filter by service"
                value={selectedService}
                onChange={(e) => {
                  setSelectedService(e.target.value);
                  setCurrentPage(1);
                }}
                className="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none focus:border-[#264868] cursor-pointer"
              >
                {CASE_STUDIES_SERVICES.map((srv) => (
                  <option key={srv} value={srv}>
                    {srv}
                  </option>
                ))}
              </select>
            </div>

            {/* Filter 3: Technology */}
            <div className="space-y-1">
              <label className="text-[11px] font-bold text-[#5C6B7A] uppercase tracking-tight flex items-center gap-1">
                <Cpu className="w-3 h-3 text-[#264868]" />
                Technology Stack
              </label>
              <select
                aria-label="Filter by region"
                value={selectedTech}
                onChange={(e) => {
                  setSelectedTech(e.target.value);
                  setCurrentPage(1);
                }}
                className="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none focus:border-[#264868] cursor-pointer"
              >
                {CASE_STUDIES_TECHNOLOGIES.map((tech) => (
                  <option key={tech} value={tech}>
                    {tech}
                  </option>
                ))}
              </select>
            </div>

            {/* Filter 4: Solution Category */}
            <div className="space-y-1">
              <label className="text-[11px] font-bold text-[#5C6B7A] uppercase tracking-tight flex items-center gap-1">
                <Shield className="w-3 h-3 text-[#264868]" />
                Solution
              </label>
              <select
                aria-label="Sort results"
                value={selectedSolution}
                onChange={(e) => {
                  setSelectedSolution(e.target.value);
                  setCurrentPage(1);
                }}
                className="w-full bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-2.5 focus:outline-none focus:border-[#264868] cursor-pointer"
              >
                {CASE_STUDIES_SOLUTIONS.map((sol) => (
                  <option key={sol} value={sol}>
                    {sol}
                  </option>
                ))}
              </select>
            </div>

          </div>

          {/* View Mode & Sort Controls Bar */}
          <div className="flex items-center justify-between pt-2 border-t border-[#F3F5F7] flex-wrap gap-3">
            
            <div className="text-xs text-[#5C6B7A] font-medium">
              Showing <strong className="text-[#264868] font-bold">{paginatedCaseStudies.length}</strong> of{' '}
              <strong className="text-[#264868] font-bold">{listCaseStudies.length}</strong> stories
            </div>

            <div className="flex items-center gap-3">
              {/* Sort Dropdown */}
              <select
                aria-label="Results per page"
                value={sortBy}
                onChange={(e) => setSortBy(e.target.value as any)}
                className="bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] text-xs font-bold rounded-xl px-3 py-1.5 focus:outline-none cursor-pointer"
              >
                <option value="latest">Sort by Latest</option>
                <option value="featured">Sort by Featured</option>
              </select>

              {/* View Toggle (Grid / List) */}
              <div className="flex items-center bg-[#FEFEFE] border border-[#DDE3E9] rounded-xl p-1 gap-1">
                <button
                  onClick={() => setViewMode('grid')}
                  className={`p-1.5 rounded-lg transition-all ${
                    viewMode === 'grid'
                      ? 'bg-[#264868] text-white shadow-sm'
                      : 'text-[#B4C1CD] hover:text-[#153758]'
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
                      : 'text-[#B4C1CD] hover:text-[#153758]'
                  }`}
                  title="List View"
                >
                  <List className="w-4 h-4" />
                </button>
              </div>
            </div>

          </div>

        </div>

        {/* CASE STUDIES GRID / LIST AREA */}
        <main className="space-y-8">
          
          {paginatedCaseStudies.length === 0 ? (
            /* No Results State */
            <div className="bg-white border border-[#DDE3E9] rounded-3xl p-12 text-center space-y-4">
              <div className="w-16 h-16 bg-[#F3F5F7] text-[#B4C1CD] rounded-full flex items-center justify-center mx-auto">
                <BookOpen className="w-8 h-8" />
              </div>
              <h3 className="text-xl font-bold text-[#264868]">No Matching Case Studies Found</h3>
              <p className="text-xs sm:text-sm text-[#5C6B7A] max-w-md mx-auto">
                We couldn&apos;t find any enterprise case studies matching your selected criteria. Try adjusting your filters or search query.
              </p>
              <button
                onClick={handleClearAllFilters}
                className="px-6 py-2.5 bg-[#264868] text-white font-bold text-xs rounded-xl shadow-md hover:bg-[#153758] transition-all"
              >
                Clear All Filters
              </button>
            </div>
          ) : (
            /* Cards Container - Exactly 3 Cards in a Row on Desktop Grid */
            <div
              className={
                viewMode === 'grid'
                  ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6'
                  : 'space-y-4 max-w-4xl mx-auto'
              }
            >
              {paginatedCaseStudies.map((caseStudy) => (
                <CaseStudyCard
                  key={caseStudy.id}
                  caseStudy={caseStudy}
                  viewMode={viewMode}
                  onReadClick={onCaseStudyClick}
                  onCategoryClick={(ind) => {
                    setSelectedIndustry(ind);
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
                          ? 'bg-[#264868] text-[#D9C48F] shadow-md'
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

        {/* 5. NEWSLETTER SUBSCRIPTION BOX */}
        <div className="bg-gradient-to-r from-[#153758] to-[#264868] rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
          <div className="absolute top-0 right-0 w-80 h-80 bg-[#C1A972]/10 blur-[100px] rounded-full pointer-events-none" />
          <div className="max-w-3xl mx-auto text-center space-y-6 relative z-10">
            <div className="w-12 h-12 bg-[#C1A972]/20 text-[#D9C48F] rounded-2xl flex items-center justify-center mx-auto border border-[#C1A972]/40">
              <Mail className="w-6 h-6" />
            </div>
            <h3 className="text-2xl sm:text-3xl font-black text-white">
              Subscribe to Enterprise Engineering Dispatch
            </h3>
            <p className="text-[#B4C1CD] text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
              Quarterly architectural deep dives, ROI benchmarks, and cloud modernization strategies delivered straight to your executive inbox. No spam.
            </p>

            {newsletterSubscribed ? (
              <div className="p-4 bg-[#264868]/20 text-[#264868] rounded-xl border border-[#264868]/40 text-xs font-bold flex items-center justify-center gap-2">
                <CheckCircle2 className="w-4 h-4 text-[#264868]" />
                <span>Thank you! You are now subscribed to Octavia Insights.</span>
              </div>
            ) : (
              <form onSubmit={handleNewsletterSubmit} className="flex flex-col sm:flex-row items-center gap-3 max-w-md mx-auto">
                <input
                  type="email"
                  required
                  value={newsletterEmail}
                  onChange={(e) => setNewsletterEmail(e.target.value)}
                  placeholder="Enter your corporate email address..."
                  className="w-full bg-white/10 text-white placeholder-[#93A3B2] text-xs sm:text-sm font-medium px-4 py-3 rounded-xl border border-white/20 focus:outline-none focus:border-[#C1A972]"
                />
                <button
                  type="submit"
                  className="w-full sm:w-auto px-6 py-3 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs rounded-xl transition-all shadow-md shrink-0"
                >
                  Subscribe
                </button>
              </form>
            )}
          </div>
        </div>

        {/* 6. FINAL ENTERPRISE CONSULTATION CTA BANNER */}
        <div className="bg-white border border-[#DDE3E9] rounded-3xl p-8 sm:p-12 text-center space-y-6 shadow-sm">
          <span className="text-xs font-extrabold text-[#264868] uppercase tracking-wider">
            Ready to Accelerate Your Engineering Strategy?
          </span>
          <h2 className="text-2xl sm:text-4xl font-black text-[#153758] max-w-2xl mx-auto">
            Book a 1-on-1 Discovery Session with Our Senior Solutions Architects
          </h2>
          <p className="text-[#5C6B7A] text-xs sm:text-base max-w-xl mx-auto leading-relaxed">
            We analyze your existing architecture, identify operational bottlenecks, and provide a complimentary technical roadmap within 48 hours.
          </p>
          <button
            onClick={() => onOpenConsultation?.('Case Studies Discovery Call')}
            className="px-8 py-3.5 bg-[#264868] hover:bg-[#153758] text-white font-extrabold text-xs sm:text-sm rounded-xl transition-all shadow-lg hover:shadow-xl inline-flex items-center gap-2"
          >
            <span>Schedule Strategy Call</span>
            <ArrowRight className="w-4 h-4 text-[#D9C48F]" />
          </button>
        </div>

      </div>

    </div>
  );
};
