import React from 'react';
import { Sparkles } from '@/site/icons';

interface BlogSidebarProps {
  searchQuery?: string;
  onSearchChange?: (query: string) => void;
  selectedCategory?: string;
  onSelectCategory?: (category: string) => void;
  selectedTags?: string[];
  onToggleTag?: (tag: string) => void;
  onArticleClick?: (slug: string) => void;
  onOpenConsultation?: (topic?: string) => void;
}

export const BlogSidebar: React.FC<BlogSidebarProps> = ({
  onOpenConsultation,
}) => {
  return (
    <aside className="space-y-6 sticky top-28">
      {/* BOOK CONSULTATION CTA CARD */}
      <div className="bg-gradient-to-r from-[#264868] to-[#153758] rounded-2xl p-6 text-white text-center space-y-4 shadow-xl border border-[#C1A972]/30">
        <div className="w-10 h-10 bg-[#C1A972]/20 text-[#C1A972] rounded-full flex items-center justify-center mx-auto border border-[#C1A972]/40 shadow-inner">
          <Sparkles className="w-5 h-5" />
        </div>
        <div>
          <h4 className="text-base font-bold text-white">Schedule a Discovery Call</h4>
          <p className="text-xs text-[#93A3B2] mt-1 leading-relaxed font-normal">
            Speak directly with a Senior Solutions Architect to discuss your project scope or engineering staffing requirements.
          </p>
        </div>

        <button
          onClick={() => onOpenConsultation?.('Blog Sidebar Strategy Call')}
          className="w-full py-3 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs rounded-xl transition-all shadow-lg hover:shadow-xl"
        >
          Book 1-on-1 Discovery Call
        </button>
      </div>
    </aside>
  );
};
