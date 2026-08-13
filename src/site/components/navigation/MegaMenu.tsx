import React, { useState } from 'react';
import { MegaMenuConfig } from '../../types';
import { ChevronRight, ArrowRight, Sparkles } from '@/site/icons';

interface MegaMenuProps {
  itemId?: string;
  config: MegaMenuConfig;
  isOpen: boolean;
  onLinkClick: (href: string, label: string) => void;
}

export const MegaMenu: React.FC<MegaMenuProps> = ({ itemId, config, isOpen, onLinkClick }) => {
  const [activeCategoryIndex, setActiveCategoryIndex] = useState(0);

  // Reset active category index when menu opens
  React.useEffect(() => {
    if (isOpen) {
      setActiveCategoryIndex(0);
    }
  }, [isOpen]);

  const isServicesMenu = itemId === 'services';

  if (isServicesMenu) {
    const activeColumn = config.columns[activeCategoryIndex] || config.columns[0];

    return (
      <div
        className={`mega-menu ${config.widthClass} ${isOpen ? 'open' : ''}`}
        aria-hidden={!isOpen}
        id="desktop-mega-menu"
      >
        <div className="mega-menu-tabbed-inner flex min-h-[380px] bg-[#0F2334] border border-white/10 rounded-2xl shadow-2xl overflow-hidden text-[#FEFEFE]">
          
          {/* Category Sidebar (Hover-Activated Only, Non-Clickable Categories) */}
          <div className="w-[260px] bg-[#0F2334] border-r border-white/10 p-3 flex flex-col justify-between shrink-0">
            <div>
              <div className="px-3 py-2 text-[11px] font-bold uppercase tracking-wider text-[#C1A972]/90 flex items-center gap-1.5">
                <Sparkles className="w-3.5 h-3.5 text-[#C1A972]" />
                <span>Categories</span>
              </div>
              <div className="space-y-1 mt-1">
                {config.columns.map((col, idx) => {
                  const isActive = activeCategoryIndex === idx;
                  return (
                    <div
                      key={idx}
                      onMouseEnter={() => setActiveCategoryIndex(idx)}
                      className={`w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 cursor-default flex items-center justify-between select-none ${
                        isActive
                          ? 'bg-[#1b365d] text-white shadow-md border border-white/10 font-bold'
                          : 'text-[#93A3B2] hover:bg-white/5 hover:text-white'
                      }`}
                    >
                      <span className="truncate pr-2">{col.title}</span>
                      <ChevronRight
                        className={`w-3.5 h-3.5 shrink-0 transition-transform duration-200 ${
                          isActive ? 'text-[#C1A972] translate-x-0.5' : 'text-[#5C6B7A] opacity-50'
                        }`}
                      />
                    </div>
                  );
                })}
              </div>
            </div>

            <div className="p-3 bg-white/[0.03] rounded-xl border border-white/5 mt-4">
              <p className="text-[11px] text-[#93A3B2] leading-tight">
                Hover over categories to explore detailed service offerings.
              </p>
            </div>
          </div>

          {/* Active Category Content Area */}
          <div className="flex-1 p-6 bg-[#0F2334] overflow-y-auto max-h-[460px] custom-scrollbar">
            <div className="flex items-center justify-between pb-4 mb-4 border-b border-white/10">
              <div>
                <h3 className="text-base font-bold text-white flex items-center gap-2">
                  <span>{activeColumn?.title}</span>
                  <span className="text-[11px] font-normal px-2 py-0.5 rounded-full bg-[#C1A972]/10 text-[#C1A972] border border-[#C1A972]/20">
                    {activeColumn?.items.length} Options
                  </span>
                </h3>
              </div>
            </div>

            <div className="grid grid-cols-2 gap-x-4 gap-y-2.5">
              {activeColumn?.items.map((item, itemIdx) => (
                <a
                  key={itemIdx}
                  href={item.href}
                  onClick={(e) => {
                    e.preventDefault();
                    onLinkClick(item.href, item.label);
                  }}
                  className="group flex items-center justify-between p-2.5 rounded-lg hover:bg-white/[0.06] border border-transparent hover:border-white/10 transition-all duration-150"
                >
                  <div className="flex items-center gap-2 min-w-0">
                    <span className="w-1.5 h-1.5 rounded-full bg-[#C1A972]/60 group-hover:bg-[#C1A972] transition-colors shrink-0" />
                    <span className="text-xs text-[#FEFEFE] group-hover:text-white font-medium truncate">
                      {item.label}
                    </span>
                  </div>
                  <ArrowRight className="w-3 h-3 text-[#93A3B2] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all shrink-0 ml-2" />
                </a>
              ))}
            </div>
          </div>

          {/* Right CTA Sidebar */}
          <div className="w-[240px] bg-[#0F2334]/90 border-l border-white/10 p-5 flex flex-col justify-between shrink-0">
            <div className="space-y-3">
              <span className="inline-block text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-[#C1A972]/20 text-[#C1A972] border border-[#C1A972]/30">
                Specialized Support
              </span>
              <h4 className="text-sm font-bold text-white leading-snug">{config.cta.title}</h4>
              <p className="text-xs text-[#93A3B2] leading-relaxed">{config.cta.description}</p>
            </div>

            <div className="space-y-2 pt-4 border-t border-white/10">
              {config.cta.secondaryBtnText && config.cta.secondaryBtnHref && (
                <a
                  href={config.cta.secondaryBtnHref}
                  onClick={(e) => {
                    e.preventDefault();
                    onLinkClick(config.cta.secondaryBtnHref!, config.cta.secondaryBtnText!);
                  }}
                  className="w-full py-2 px-3 text-center text-xs font-semibold text-[#FEFEFE] bg-white/10 hover:bg-white/15 rounded-lg transition-colors block border border-white/10"
                >
                  {config.cta.secondaryBtnText}
                </a>
              )}
              <a
                href={config.cta.primaryBtnHref}
                onClick={(e) => {
                  e.preventDefault();
                  onLinkClick(config.cta.primaryBtnHref, config.cta.primaryBtnText);
                }}
                className="w-full py-2.5 px-3 text-center text-xs font-bold text-[#0F2334] bg-[#C1A972] hover:bg-[#C1A972] rounded-lg transition-colors shadow-lg block"
              >
                {config.cta.primaryBtnText}
              </a>
            </div>
          </div>

        </div>
      </div>
    );
  }

  // Classic Mega Menu for Industries, Solutions, Company, etc.
  return (
    <div
      className={`mega-menu ${config.widthClass} ${isOpen ? 'open' : ''}`}
      aria-hidden={!isOpen}
      id="desktop-mega-menu"
    >
      <div
        className="mega-menu-inner"
        style={{
          gridTemplateColumns: config.gridTemplateColumns,
        }}
      >
        {config.columns.map((col, index) => (
          <div key={index} className="mega-col">
            <h4>{col.title}</h4>
            <ul>
              {col.items.map((item, itemIdx) => (
                <li key={itemIdx}>
                  <a
                    href={item.href}
                    onClick={(e) => {
                      e.preventDefault();
                      onLinkClick(item.href, item.label);
                    }}
                    title={item.label}
                  >
                    <span>{item.label}</span>
                  </a>
                </li>
              ))}
            </ul>
          </div>
        ))}

        {/* CTA Card Column */}
        <div className="mega-col mega-cta-col">
          <div className="mega-cta-card">
            <h4>{config.cta.title}</h4>
            <p>{config.cta.description}</p>
            {config.cta.secondaryBtnText && config.cta.secondaryBtnHref && (
              <a
                href={config.cta.secondaryBtnHref}
                onClick={(e) => {
                  e.preventDefault();
                  onLinkClick(config.cta.secondaryBtnHref!, config.cta.secondaryBtnText!);
                }}
                className="btn-secondary"
              >
                {config.cta.secondaryBtnText}
              </a>
            )}
            <a
              href={config.cta.primaryBtnHref}
              onClick={(e) => {
                e.preventDefault();
                onLinkClick(config.cta.primaryBtnHref, config.cta.primaryBtnText);
              }}
              className="btn-primary"
            >
              {config.cta.primaryBtnText}
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};
