import React, { useState } from 'react';
import { SITE_NAV_ITEMS } from '../../data/navigationData';
import { Logo } from '../ui/Logo';
import { ChevronDown, ArrowRight, X } from '@/site/icons';

interface MobileNavProps {
  isOpen: boolean;
  onClose: () => void;
  onLinkClick: (href: string, label: string) => void;
  onConsultationClick: () => void;
}

export const MobileNav: React.FC<MobileNavProps> = ({
  isOpen,
  onClose,
  onLinkClick,
  onConsultationClick,
}) => {
  const [expandedSection, setExpandedSection] = useState<string | null>(null);

  if (!isOpen) return null;

  const toggleSection = (id: string) => {
    setExpandedSection(expandedSection === id ? null : id);
  };

  return (
    <div
      className="fixed inset-0 z-[1050] bg-[#0F2334]/95 backdrop-blur-2xl flex flex-col overflow-y-auto animate-in fade-in duration-300 lg:hidden"
      id="mobile-navigation-overlay"
    >
      {/* Mobile Top Header */}
      <div className="flex items-center justify-between px-6 py-5 border-b border-white/10">
        <Logo isScrolled={false} sizeClassName="h-7" onNavigate={(href) => onLinkClick(href, 'Home')} />
        <button
          onClick={onClose}
          className="p-2 text-[#93A3B2] hover:text-white rounded-lg bg-white/5 hover:bg-white/10 transition-colors"
          aria-label="Close menu"
          id="close-mobile-menu"
        >
          <X className="w-6 h-6" />
        </button>
      </div>

      {/* Accordion Menu List */}
      <div className="flex-1 px-6 py-6 space-y-2">
        {SITE_NAV_ITEMS.map((item) => {
          const isExpanded = expandedSection === item.id;

          if (!item.hasMega) {
            return (
              <div key={item.id} className="border-b border-white/5 py-1">
                <a
                  href={item.href}
                  onClick={(e) => {
                    e.preventDefault();
                    onLinkClick(item.href, item.label);
                    onClose();
                  }}
                  className="flex items-center justify-between py-3 text-lg font-semibold text-[#FEFEFE] hover:text-white hover:pl-2 transition-all"
                >
                  <span>{item.label}</span>
                  <ArrowRight className="w-4 h-4 text-[#C1A972] opacity-80" />
                </a>
              </div>
            );
          }

          return (
            <div key={item.id} className="border-b border-white/5 py-1">
              <button
                onClick={() => toggleSection(item.id)}
                className="w-full flex items-center justify-between py-3 text-lg font-semibold text-[#FEFEFE] hover:text-white transition-colors text-left"
              >
                <span>{item.label}</span>
                <ChevronDown
                  className={`w-5 h-5 text-[#C1A972] transition-transform duration-300 ${
                    isExpanded ? 'rotate-180' : ''
                  }`}
                />
              </button>

              {/* Sub Columns Accordion */}
              {isExpanded && item.megaConfig && (
                <div className="pl-3 pr-1 py-3 my-1 bg-white/5 rounded-xl space-y-5 animate-in slide-in-from-top-2 duration-200">
                  {item.megaConfig.columns.map((col, idx) => (
                    <div key={idx} className="space-y-2">
                      <div className="text-xs font-bold uppercase tracking-wider text-[#C1A972] px-2 pt-1">
                        {col.title}
                      </div>
                      <div className="space-y-1 pl-1">
                        {col.items.map((subItem, subIdx) => (
                          <a
                            key={subIdx}
                            href={subItem.href}
                            onClick={(e) => {
                              e.preventDefault();
                              onLinkClick(subItem.href, subItem.label);
                              onClose();
                            }}
                            className="block py-1.5 px-2 text-sm text-[#93A3B2] hover:text-white hover:bg-[#264868]/40 rounded-md transition-colors"
                          >
                            {subItem.label}
                          </a>
                        ))}
                      </div>
                    </div>
                  ))}

                  {/* Mobile CTA Box */}
                  <div className="p-4 bg-[#264868]/60 rounded-lg border border-[#C1A972]/30 mt-3">
                    <h5 className="font-bold text-white text-sm mb-1">{item.megaConfig.cta.title}</h5>
                    <p className="text-xs text-[#93A3B2] mb-3">{item.megaConfig.cta.description}</p>
                    <button
                      onClick={() => {
                        onConsultationClick();
                        onClose();
                      }}
                      className="w-full py-2 px-3 text-xs font-bold bg-[#264868] text-white border border-[#C1A972]/40 rounded-lg hover:bg-[#153758] transition-colors"
                    >
                      {item.megaConfig.cta.primaryBtnText}
                    </button>
                  </div>
                </div>
              )}
            </div>
          );
        })}
      </div>

      {/* Mobile CTA Footer */}
      <div className="p-6 border-t border-white/10 bg-black/40 space-y-3">
        <button
          onClick={() => {
            onConsultationClick();
            onClose();
          }}
          className="w-full py-3 px-5 text-center font-bold text-white bg-[#264868] border border-[#C1A972]/40 rounded-xl hover:bg-[#153758] shadow-lg shadow-black/40 transition-all text-sm"
          id="mobile-get-consultation-btn"
        >
          Get a Free Consultation
        </button>
        <div className="text-center text-xs text-[#93A3B2]">
          sales@octaviatechnologies.com
        </div>
      </div>
    </div>
  );
};
