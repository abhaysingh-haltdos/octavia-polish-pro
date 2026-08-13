import React from 'react';
import { Clock, Calendar, ArrowRight, Eye, User } from '@/site/icons';
import { BlogArticle } from '../../../types/blog';

interface BlogCardProps {
  article: BlogArticle;
  viewMode?: 'grid' | 'list';
  onArticleClick: (slug: string) => void;
  onCategoryClick?: (category: string) => void;
  featuredMode?: boolean;
}

export const BlogCard: React.FC<BlogCardProps> = ({
  article,
  viewMode = 'grid',
  onArticleClick,
  onCategoryClick,
  featuredMode = false,
}) => {
  const handleCardClick = (e: React.MouseEvent) => {
    e.preventDefault();
    onArticleClick(article.slug);
  };

  if (featuredMode) {
    return (
      <div 
        onClick={handleCardClick}
        className="group relative bg-white border border-[#DDE3E9] rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer grid grid-cols-1 lg:grid-cols-12 gap-0 my-8"
      >
        {/* Left Featured Image */}
        <div className="lg:col-span-7 relative h-64 sm:h-80 lg:h-full overflow-hidden bg-[#0F2334]">
          <img
            src={article.featuredImage}
            alt={article.title}
            className="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700 ease-out"
            loading="lazy"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent lg:hidden" />
          
          {/* Badges Overlay */}
          <div className="absolute top-4 left-4 flex flex-wrap gap-2">
            <span className="px-3 py-1 bg-[#264868] text-[#D9C48F] border border-[#C1A972]/40 text-xs font-bold rounded-full shadow-md backdrop-blur-md uppercase tracking-wider">
              Featured Article
            </span>
            <span className="px-3 py-1 bg-black/70 text-white text-xs font-medium rounded-full backdrop-blur-md">
              {article.category}
            </span>
          </div>
        </div>

        {/* Right Content Area */}
        <div className="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between bg-white">
          <div className="space-y-4">
            {/* Meta Stats */}
            <div className="flex items-center gap-4 text-xs font-medium text-[#5C6B7A]">
              <span className="flex items-center gap-1.5">
                <Calendar className="w-3.5 h-3.5 text-[#264868]" />
                {article.publishDate}
              </span>
            </div>

            {/* Title */}
            <h2 className="text-xl sm:text-2xl lg:text-3xl font-black text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug">
              {article.title}
            </h2>

            {/* Excerpt */}
            <p className="text-sm sm:text-base text-[#5C6B7A] line-clamp-3 leading-relaxed font-normal">
              {article.excerpt}
            </p>
          </div>

          {/* Author & CTA Button Footer */}
          <div className="pt-6 mt-6 border-t border-[#F3F5F7] flex items-center justify-between gap-4">
            <div className="flex items-center gap-3">
              <img
                src={article.author.avatar}
                alt={article.author.name}
                className="w-10 h-10 rounded-full object-cover border-2 border-[#C1A972]/50 shadow-sm"
              />
              <div>
                <span className="text-xs font-bold text-[#264868] block">
                  {article.author.name}
                </span>
                <span className="text-[11px] text-[#5C6B7A] line-clamp-1">
                  {article.author.role}
                </span>
              </div>
            </div>

            <button
              onClick={handleCardClick}
              className="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#264868] hover:bg-[#153758] text-white text-xs font-bold transition-all shadow-md group-hover:shadow-lg group/btn shrink-0"
            >
              <span>Read Full Article</span>
              <ArrowRight className="w-4 h-4 text-[#D9C48F] group-hover/btn:translate-x-1 transition-transform" />
            </button>
          </div>
        </div>
      </div>
    );
  }

  // Horizontal List View
  if (viewMode === 'list') {
    return (
      <div
        onClick={handleCardClick}
        className="group bg-white border border-[#DDE3E9] hover:border-[#C1A972]/60 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col sm:flex-row gap-5 items-stretch"
      >
        {/* Image Box */}
        <div className="sm:w-56 h-48 sm:h-auto shrink-0 relative overflow-hidden rounded-xl bg-[#0F2334]">
          <img
            src={article.featuredImage}
            alt={article.title}
            className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
            loading="lazy"
          />
          <button
            onClick={(e) => {
              e.stopPropagation();
              onCategoryClick?.(article.category);
            }}
            className="absolute top-2.5 left-2.5 px-2.5 py-1 bg-[#264868]/90 text-white text-[11px] font-bold rounded-lg backdrop-blur-md hover:bg-[#264868]"
          >
            {article.category}
          </button>
        </div>

        {/* Content Box */}
        <div className="flex-1 flex flex-col justify-between space-y-3">
          <div className="space-y-2">
            <div className="flex items-center gap-3 text-xs text-[#5C6B7A] font-medium">
              <span className="flex items-center gap-1">
                <Calendar className="w-3.5 h-3.5 text-[#264868]" />
                {article.publishDate}
              </span>
            </div>

            <h3 className="text-lg font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug line-clamp-2">
              {article.title}
            </h3>

            <p className="text-xs sm:text-sm text-[#5C6B7A] line-clamp-2 leading-relaxed">
              {article.excerpt}
            </p>
          </div>

          <div className="flex items-center justify-between pt-2 border-t border-[#F3F5F7] text-xs">
            <div className="flex items-center gap-2">
              <img
                src={article.author.avatar}
                alt={article.author.name}
                className="w-7 h-7 rounded-full object-cover"
              />
              <span className="font-semibold text-[#153758]">{article.author.name}</span>
            </div>

            <span className="text-[#264868] font-bold flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
              Read <ArrowRight className="w-3.5 h-3.5 text-[#D9C48F]" />
            </span>
          </div>
        </div>
      </div>
    );
  }

  // Standard Grid Card View
  return (
    <div
      onClick={handleCardClick}
      className="group bg-white border border-[#DDE3E9] hover:border-[#C1A972]/80 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col h-full"
    >
      {/* Featured Image */}
      <div className="relative h-48 sm:h-52 overflow-hidden bg-[#0F2334] shrink-0">
        <img
          src={article.featuredImage}
          alt={article.title}
          className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
          loading="lazy"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />

        {/* Category Pill */}
        <button
          onClick={(e) => {
            e.stopPropagation();
            onCategoryClick?.(article.category);
          }}
          className="absolute top-3 left-3 px-3 py-1 bg-[#264868]/90 hover:bg-[#264868] text-[#D9C48F] border border-[#C1A972]/30 text-[11px] font-bold rounded-full backdrop-blur-md shadow-sm transition-all"
        >
          {article.category}
        </button>

        {article.isTrending && (
          <span className="absolute top-3 right-3 px-2.5 py-0.5 bg-[#C1A972] text-[#153758] text-[10px] font-extrabold rounded-full uppercase tracking-wider shadow-sm">
            Trending
          </span>
        )}
      </div>

      {/* Card Content Body */}
      <div className="p-5 flex-1 flex flex-col justify-between space-y-4">
        <div className="space-y-2.5">
          {/* Metadata */}
          <div className="flex items-center gap-3 text-[11px] text-[#5C6B7A] font-medium">
            <span className="flex items-center gap-1">
              <Calendar className="w-3 h-3 text-[#264868]" />
              {article.publishDate}
            </span>
          </div>

          {/* Title */}
          <h3 className="text-base sm:text-lg font-bold text-[#264868] group-hover:text-[#D9C48F] transition-colors leading-snug line-clamp-2">
            {article.title}
          </h3>

          {/* Excerpt */}
          <p className="text-xs text-[#5C6B7A] line-clamp-3 leading-relaxed font-normal">
            {article.excerpt}
          </p>
        </div>

        {/* Card Footer */}
        <div className="pt-4 border-t border-[#F3F5F7] flex items-center justify-between text-xs mt-auto">
          <div className="flex items-center gap-2">
            <img
              src={article.author.avatar}
              alt={article.author.name}
              className="w-7 h-7 rounded-full object-cover border border-[#DDE3E9]"
            />
            <span className="font-semibold text-[#153758] text-[11px] line-clamp-1">
              {article.author.name}
            </span>
          </div>

          <span className="text-[#264868] font-bold text-xs flex items-center gap-1 group-hover:translate-x-1 transition-transform shrink-0">
            Read More
            <ArrowRight className="w-3.5 h-3.5 text-[#D9C48F]" />
          </span>
        </div>
      </div>
    </div>
  );
};
