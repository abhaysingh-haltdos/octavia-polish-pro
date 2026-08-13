import React, { useState, useMemo } from 'react';
import { SITE_NAV_ITEMS } from '../../data/navigationData';
import { Search, X, ArrowUpRight, Sparkles } from '@/site/icons';

interface SearchModalProps {
  isOpen: boolean;
  onClose: () => void;
  onLinkClick: (href: string, label: string) => void;
}

export const SearchModal: React.FC<SearchModalProps> = ({ isOpen, onClose, onLinkClick }) => {
  const [query, setQuery] = useState('');

  // Extract all searchable links from navigation structure
  const allLinks = useMemo(() => {
    const list: { category: string; label: string; href: string }[] = [];

    SITE_NAV_ITEMS.forEach((item) => {
      list.push({ category: 'Main Menu', label: item.label, href: item.href });

      if (item.megaConfig) {
        item.megaConfig.columns.forEach((col) => {
          col.items.forEach((subItem) => {
            list.push({
              category: `${item.label} › ${col.title}`,
              label: subItem.label,
              href: subItem.href,
            });
          });
        });
      }
    });

    return list;
  }, []);

  const results = useMemo(() => {
    if (!query.trim()) return allLinks.slice(0, 10);
    const q = query.toLowerCase();
    return allLinks.filter(
      (item) => item.label.toLowerCase().includes(q) || item.category.toLowerCase().includes(q)
    );
  }, [query, allLinks]);

  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 z-[1150] flex items-start justify-center pt-16 sm:pt-24 p-4 bg-black/70 backdrop-blur-md animate-in fade-in duration-200">
      <div className="bg-white rounded-2xl max-w-xl w-full shadow-2xl border border-[#F3F5F7] overflow-hidden">
        {/* Search Input Bar */}
        <div className="flex items-center gap-3 px-5 py-4 border-b border-[#F3F5F7] bg-[#F3F5F7]/50">
          <Search className="w-5 h-5 text-[#264868]" />
          <input
            type="text"
            autoFocus
            placeholder="Search Services, Industries, AI Solutions..."
            value={query}
            onChange={(e) => setQuery(e.target.value)}
            className="flex-1 bg-transparent text-[#153758] text-sm sm:text-base font-medium placeholder-[#93A3B2] focus:outline-none"
          />
          {query && (
            <button
              onClick={() => setQuery('')}
              className="text-xs text-[#93A3B2] hover:text-[#5C6B7A] px-2 py-1 rounded bg-[#DDE3E9]/60"
            >
              Clear
            </button>
          )}
          <button
            onClick={onClose}
            className="p-1.5 text-[#93A3B2] hover:text-[#5C6B7A] rounded-lg hover:bg-[#DDE3E9]/50 transition-colors"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        {/* Results Count & Recommendations */}
        <div className="p-2 max-h-[380px] overflow-y-auto">
          {results.length === 0 ? (
            <div className="p-8 text-center space-y-2 text-[#5C6B7A]">
              <p className="text-sm">No navigation items found for &quot;{query}&quot;</p>
              <p className="text-xs text-[#93A3B2]">Try searching for &quot;Web&quot;, &quot;Healthcare&quot;, or &quot;ERP&quot;</p>
            </div>
          ) : (
            <div className="space-y-1">
              <div className="px-3 py-1.5 text-[11px] font-bold text-[#93A3B2] uppercase tracking-wider flex items-center justify-between">
                <span>{query ? `Found ${results.length} links` : 'Popular Navigation Links'}</span>
                <span className="flex items-center gap-1 text-[#264868]">
                  <Sparkles className="w-3 h-3" /> Octavia Index
                </span>
              </div>
              {results.map((item, idx) => (
                <a
                  key={idx}
                  href={item.href}
                  onClick={(e) => {
                    e.preventDefault();
                    onLinkClick(item.href, item.label);
                    onClose();
                  }}
                  className="flex items-center justify-between px-3.5 py-2.5 rounded-xl hover:bg-[#F3F5F7] group transition-all"
                >
                  <div>
                    <div className="text-sm font-semibold text-[#153758] group-hover:text-[#264868] transition-colors">
                      {item.label}
                    </div>
                    <div className="text-xs text-[#93A3B2]">{item.category}</div>
                  </div>
                  <ArrowUpRight className="w-4 h-4 text-[#93A3B2] group-hover:text-[#264868] transition-colors" />
                </a>
              ))}
            </div>
          )}
        </div>

        {/* Search Footer */}
        <div className="px-5 py-3 bg-[#F3F5F7] border-t border-[#F3F5F7] flex items-center justify-between text-xs text-[#93A3B2]">
          <span>Click any link to simulate live navigation</span>
          <span className="font-mono bg-white px-2 py-0.5 rounded border border-[#DDE3E9] text-[10px]">
            ESC to close
          </span>
        </div>
      </div>
    </div>
  );
};
