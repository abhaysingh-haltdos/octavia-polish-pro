import React from 'react';
import {
  MapPin,
  Clock,
  ArrowRight,
  TrendingUp,
  Sparkles,
  Building2,
  Cpu,
} from '@/site/icons';
import { CaseStudy } from '../../../data/caseStudiesData';

interface CaseStudyCardProps {
  caseStudy: CaseStudy;
  onReadClick: (slug: string) => void;
  onCategoryClick?: (category: string) => void;
  featuredMode?: boolean;
  viewMode?: 'grid' | 'list';
}

export const CaseStudyCard: React.FC<CaseStudyCardProps> = ({
  caseStudy,
  onReadClick,
  onCategoryClick,
  featuredMode = false,
  viewMode = 'grid',
}) => {
  // FEATURED HIGHLIGHT CARD (LARGE BANNER STYLE)
  if (featuredMode) {
    return (
      <div className="group relative bg-white border border-[#DDE3E9] rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 grid grid-cols-1 lg:grid-cols-12">
        {/* Left Image Section */}
        <div className="lg:col-span-6 relative overflow-hidden min-h-[300px] lg:min-h-[420px]">
          <img
            src={caseStudy.featuredImage}
            alt={caseStudy.title}
            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-[#153758]/80 via-transparent to-transparent lg:hidden" />
          
          {/* Featured Badge */}
          <div className="absolute top-4 left-4 z-10 flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#153758]/90 text-[#D9C48F] text-xs font-black uppercase tracking-wider backdrop-blur-md border border-[#C1A972]/40 shadow-lg">
            <Sparkles className="w-3.5 h-3.5 text-[#D9C48F]" />
            <span>Featured Enterprise Success</span>
          </div>

          {/* Industry badge overlay */}
          <div className="absolute bottom-4 left-4 z-10 lg:hidden flex flex-wrap gap-2">
            <span className="px-3 py-1 bg-white/90 backdrop-blur-md text-[#264868] text-xs font-bold rounded-full">
              {caseStudy.industry}
            </span>
          </div>
        </div>

        {/* Right Content Section */}
        <div className="lg:col-span-6 p-6 sm:p-8 lg:p-10 flex flex-col justify-between space-y-6 bg-gradient-to-br from-white via-[#FEFEFE] to-[#C1A972]/20">
          <div className="space-y-4">
            {/* Top Meta Badges */}
            <div className="flex flex-wrap items-center gap-2">
              <button
                onClick={() => onCategoryClick?.(caseStudy.industry)}
                className="px-3 py-1 bg-[#264868]/10 hover:bg-[#264868] hover:text-white text-[#264868] text-xs font-bold rounded-full transition-all"
              >
                {caseStudy.industry}
              </button>
              <span className="text-[#B4C1CD]">•</span>
              <span className="px-3 py-1 bg-[#C1A972]/15 text-[#153758] text-xs font-bold rounded-full border border-[#C1A972]/30">
                {caseStudy.serviceCategory}
              </span>
            </div>

            {/* Title */}
            <h3
              onClick={() => onReadClick(caseStudy.slug)}
              className="text-xl sm:text-2xl lg:text-3xl font-black text-[#264868] group-hover:text-[#D9C48F] transition-colors cursor-pointer leading-tight"
            >
              {caseStudy.title}
            </h3>

            {/* Short Challenge */}
            <p className="text-[#5C6B7A] text-xs sm:text-sm leading-relaxed font-normal">
              <strong className="text-[#264868] font-bold">The Challenge: </strong>
              {caseStudy.shortChallenge}
            </p>

            {/* Result Highlight Banner */}
            <div className="p-3.5 bg-[#264868] text-white rounded-2xl flex items-start gap-3 shadow-md border border-[#264868]/20">
              <div className="p-2 bg-[#C1A972]/20 text-[#D9C48F] rounded-xl shrink-0">
                <TrendingUp className="w-4 h-4" />
              </div>
              <div>
                <span className="text-[10px] uppercase font-extrabold text-[#D9C48F] tracking-wider block">
                  Measurable Impact
                </span>
                <p className="text-xs font-bold text-white leading-snug">
                  {caseStudy.resultHighlight}
                </p>
              </div>
            </div>

            {/* Key Metrics Grid */}
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
              {caseStudy.kpis.slice(0, 3).map((kpi, idx) => (
                <div
                  key={idx}
                  className="bg-white border border-[#DDE3E9] p-3 rounded-2xl shadow-sm text-center"
                >
                  <div className="text-lg sm:text-xl font-black text-[#264868]">
                    {kpi.value}
                  </div>
                  <div className="text-[10px] font-bold text-[#5C6B7A] uppercase tracking-tight">
                    {kpi.label}
                  </div>
                </div>
              ))}
            </div>

            {/* Tech Stack Pills */}
            <div className="flex flex-wrap items-center gap-1.5 pt-2">
              <Cpu className="w-3.5 h-3.5 text-[#B4C1CD] mr-1" />
              {caseStudy.technologies.map((tech) => (
                <span
                  key={tech}
                  className="px-2.5 py-0.5 bg-[#F3F5F7] text-[#153758] text-[11px] font-medium rounded-md border border-[#DDE3E9]"
                >
                  {tech}
                </span>
              ))}
            </div>
          </div>

          {/* Card Footer Info & Read CTA */}
          <div className="pt-4 border-t border-[#DDE3E9] flex flex-wrap items-center justify-between gap-4">
            <div className="flex items-center gap-4 text-xs text-[#5C6B7A] font-medium">
              <span className="flex items-center gap-1">
                <MapPin className="w-3.5 h-3.5 text-[#D9C48F]" />
                {caseStudy.clientLocation}
              </span>
              <span>•</span>
              <span className="flex items-center gap-1">
                <Clock className="w-3.5 h-3.5 text-[#264868]" />
                {caseStudy.projectDuration}
              </span>
            </div>

            <button
              onClick={() => onReadClick(caseStudy.slug)}
              className="px-5 py-2.5 bg-[#264868] hover:bg-[#153758] text-white text-xs font-extrabold rounded-xl transition-all shadow-md hover:shadow-lg flex items-center gap-2 group/btn"
            >
              <span>Read Case Study</span>
              <ArrowRight className="w-4 h-4 text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" />
            </button>
          </div>
        </div>
      </div>
    );
  }

  // LIST VIEW ITEM
  if (viewMode === 'list') {
    return (
      <div className="group bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl p-5 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row items-center gap-6">
        <div className="w-full sm:w-48 h-36 rounded-xl overflow-hidden shrink-0 relative">
          <img
            src={caseStudy.featuredImage}
            alt={caseStudy.title}
            className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <span className="absolute top-2 left-2 px-2.5 py-0.5 bg-[#153758]/80 backdrop-blur-md text-[#D9C48F] text-[10px] font-extrabold rounded-md">
            {caseStudy.industry}
          </span>
        </div>

        <div className="flex-1 space-y-3">
          <div className="flex flex-wrap items-center gap-2 text-xs">
            <span className="px-2.5 py-0.5 bg-[#264868]/10 text-[#264868] font-bold rounded-md">
              {caseStudy.serviceCategory}
            </span>
            <span className="text-[#B4C1CD]">•</span>
            <span className="text-[#5C6B7A] font-medium flex items-center gap-1">
              <MapPin className="w-3 h-3 text-[#D9C48F]" />
              {caseStudy.clientLocation}
            </span>
            <span className="text-[#B4C1CD]">•</span>
            <span className="text-[#5C6B7A] font-medium flex items-center gap-1">
              <Clock className="w-3 h-3 text-[#264868]" />
              {caseStudy.projectDuration}
            </span>
          </div>

          <h3
            onClick={() => onReadClick(caseStudy.slug)}
            className="text-base font-extrabold text-[#264868] group-hover:text-[#D9C48F] transition-colors cursor-pointer leading-snug line-clamp-1"
          >
            {caseStudy.title}
          </h3>

          <p className="text-xs text-[#5C6B7A] line-clamp-2 leading-relaxed">
            {caseStudy.shortChallenge}
          </p>

          <div className="flex flex-wrap items-center justify-between gap-3 pt-1">
            <div className="flex flex-wrap items-center gap-1">
              {caseStudy.technologies.slice(0, 3).map((t) => (
                <span
                  key={t}
                  className="px-2 py-0.5 bg-[#F3F5F7] text-[#5C6B7A] text-[10px] font-semibold rounded"
                >
                  {t}
                </span>
              ))}
            </div>

            <button
              onClick={() => onReadClick(caseStudy.slug)}
              className="text-xs font-extrabold text-[#264868] group-hover:text-[#D9C48F] transition-colors inline-flex items-center gap-1"
            >
              <span>Explore Case Study</span>
              <ArrowRight className="w-3.5 h-3.5" />
            </button>
          </div>
        </div>
      </div>
    );
  }

  // STANDARD GRID CARD (3 IN A ROW ON DESKTOP)
  return (
    <div className="group bg-white border border-[#DDE3E9] hover:border-[#264868] rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between h-full">
      <div>
        {/* Cover Image Container */}
        <div className="relative h-48 overflow-hidden bg-[#F3F5F7]">
          <img
            src={caseStudy.featuredImage}
            alt={caseStudy.title}
            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity" />

          {/* Industry & Service Badges */}
          <div className="absolute top-3 left-3 right-3 flex items-center justify-between z-10">
            <button
              onClick={(e) => {
                e.stopPropagation();
                onCategoryClick?.(caseStudy.industry);
              }}
              className="px-2.5 py-1 bg-[#153758]/90 hover:bg-[#264868] backdrop-blur-md text-[#D9C48F] text-[11px] font-bold rounded-lg shadow-md transition-all border border-[#C1A972]/30"
            >
              {caseStudy.industry}
            </button>

            <span className="px-2.5 py-1 bg-white/90 backdrop-blur-md text-[#264868] text-[10px] font-extrabold rounded-lg shadow-md">
              {caseStudy.serviceCategory}
            </span>
          </div>

          {/* Location & Duration floating bar */}
          <div className="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-white/90 font-medium z-10">
            <span className="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-2 py-0.5 rounded-md">
              <MapPin className="w-3 h-3 text-[#D9C48F]" />
              {caseStudy.clientLocation}
            </span>
            <span className="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-2 py-0.5 rounded-md">
              <Clock className="w-3 h-3 text-[#D9C48F]" />
              {caseStudy.projectDuration}
            </span>
          </div>
        </div>

        {/* Card Content Body */}
        <div className="p-5 space-y-4">
          
          {/* Title */}
          <h3
            onClick={() => onReadClick(caseStudy.slug)}
            className="text-base sm:text-lg font-extrabold text-[#264868] group-hover:text-[#D9C48F] transition-colors cursor-pointer leading-snug line-clamp-2"
          >
            {caseStudy.title}
          </h3>

          {/* Short Challenge */}
          <p className="text-xs text-[#5C6B7A] line-clamp-2 leading-relaxed font-normal">
            <strong className="text-[#264868] font-semibold">Challenge: </strong>
            {caseStudy.shortChallenge}
          </p>

          {/* Result Highlight Box */}
          <div className="p-3 bg-[#C1A972]/50 border border-[#C1A972]/30 rounded-xl space-y-1">
            <div className="flex items-center gap-1.5 text-[10px] font-black uppercase text-[#264868]">
              <TrendingUp className="w-3 h-3 text-[#D9C48F]" />
              <span>Key Business Outcome</span>
            </div>
            <p className="text-xs font-bold text-[#153758] line-clamp-2 leading-tight">
              {caseStudy.resultHighlight}
            </p>
          </div>

          {/* Technology Stack Chips */}
          <div className="flex flex-wrap items-center gap-1 pt-1">
            {caseStudy.technologies.map((tech) => (
              <span
                key={tech}
                className="px-2 py-0.5 bg-[#F3F5F7] text-[#5C6B7A] text-[10px] font-semibold rounded-md border border-[#DDE3E9]"
              >
                {tech}
              </span>
            ))}
          </div>

        </div>
      </div>

      {/* Card Action Footer */}
      <div className="p-5 pt-0 border-t border-[#F3F5F7] mt-2">
        <button
          onClick={() => onReadClick(caseStudy.slug)}
          className="w-full mt-3 py-2.5 bg-[#FEFEFE] hover:bg-[#264868] text-[#264868] hover:text-white border border-[#DDE3E9] hover:border-[#264868] text-xs font-extrabold rounded-xl transition-all shadow-sm hover:shadow-md flex items-center justify-center gap-2 group/btn"
        >
          <span>Read Case Study</span>
          <ArrowRight className="w-3.5 h-3.5 text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" />
        </button>
      </div>
    </div>
  );
};
