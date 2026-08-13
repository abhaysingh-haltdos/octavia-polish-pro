import React, { useState, useEffect } from 'react';
import { Logo } from '../ui/Logo';
import { MegaMenu } from '../navigation/MegaMenu';
import { SITE_NAV_ITEMS } from '../../data/navigationData';
import { Button } from '../ui/Button';
import { ChevronDown, Search } from '@/site/icons';

interface HeaderProps {
  forcedScrolled?: boolean | null; // Allow manual override for testing
  onOpenConsultation: (topic?: string) => void;
  onOpenMobileNav: () => void;
  onOpenSearch: () => void;
  onLinkClick: (href: string, label: string) => void;
}

export const Header: React.FC<HeaderProps> = ({
  forcedScrolled = null,
  onOpenConsultation,
  onOpenMobileNav,
  onOpenSearch,
  onLinkClick,
}) => {
  const [scrolled, setScrolled] = useState(false);
  const [activeMega, setActiveMega] = useState<string | null>(null);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 40) {
        setScrolled(true);
      } else {
        setScrolled(false);
      }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const isScrolled = forcedScrolled !== null ? forcedScrolled : scrolled;

  return (
    <header className={`dmt-header ${isScrolled ? 'scrolled' : ''}`} id="header">
      <div className="header-inner">
        {/* Brand Logo */}
        <Logo isScrolled={isScrolled} onNavigate={(href) => onLinkClick(href, 'Home')} />

        {/* Desktop Navigation */}
        <nav className="hidden lg:flex items-center" id="mainNav">
          <ul className="nav-list">
            {SITE_NAV_ITEMS.map((item) => {
              const isMegaOpen = activeMega === item.id;

              if (!item.hasMega) {
                return (
                  <li key={item.id} className="nav-item">
                    <a
                      href={item.href}
                      onClick={(e) => {
                        e.preventDefault();
                        onLinkClick(item.href, item.label);
                      }}
                      className="nav-link"
                      title={item.label}
                    >
                      {item.label}
                    </a>
                  </li>
                );
              }

              return (
                <li
                  key={item.id}
                  className={`nav-item has-mega ${isMegaOpen ? 'open' : ''}`}
                  onMouseEnter={() => setActiveMega(item.id)}
                  onMouseLeave={() => setActiveMega(null)}
                >
                  <a
                    href={item.href}
                    onClick={(e) => {
                      e.preventDefault();
                      onLinkClick(item.href, item.label);
                    }}
                    className={`nav-link ${isMegaOpen ? 'active' : ''}`}
                    title={item.label}
                  >
                    <span>{item.label}</span>
                    <ChevronDown className="w-3.5 h-3.5 opacity-80" />
                  </a>

                  {item.megaConfig && (
                    <MegaMenu
                      itemId={item.id}
                      config={item.megaConfig}
                      isOpen={isMegaOpen}
                      onLinkClick={onLinkClick}
                    />
                  )}
                </li>
              );
            })}
          </ul>
        </nav>

        {/* Header Actions */}
        <div className="flex items-center gap-3">
          {/* Quick Search Button */}
          <button
            onClick={onOpenSearch}
            className={`flex min-h-11 min-w-11 items-center justify-center rounded-xl transition-all ${
              isScrolled
                ? 'text-[#264868] hover:text-[#153758] hover:bg-[#264868]/10'
                : 'text-white/80 hover:text-white hover:bg-white/10'
            }`}
            title="Search Navigation Links"
            aria-label="Search navigation"
            id="search-header-btn"
          >
            <Search className="w-4 h-4" />
          </button>

          {/* Primary CTA Button */}
          <Button
            onClick={() => onOpenConsultation('Get a Free Consultation')}
            variant={isScrolled ? 'primary' : 'accent'}
            size="sm"
            className="hidden lg:inline-flex"
            id="get-consultation-btn"
          >
            <span>Get a Free Consultation</span>
          </Button>

          {/* Mobile Hamburger Button */}
          <button
            onClick={onOpenMobileNav}
            className="hamburger lg:hidden flex"
            aria-label="Toggle navigation"
            id="hamburger-btn"
          >
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
    </header>
  );
};
