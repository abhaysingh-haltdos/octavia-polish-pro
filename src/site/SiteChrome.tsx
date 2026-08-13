import React, { createContext, useCallback, useContext, useMemo, useState, type ReactNode } from 'react';
import { useRouter } from '@tanstack/react-router';

import { Header } from './components/layout/Header';
import { FooterSection } from './components/layout/FooterSection';
import { MobileNav } from './components/navigation/MobileNav';
import { ConsultationModal } from './components/common/ConsultationModal';
import { SearchModal } from './components/common/SearchModal';
import { SITE_URL } from './site-config';

interface SiteContextValue {
  /** Navigate to an internal href (or open an external one in a new tab). */
  navigateTo: (href: string, label?: string) => void;
  /** Open the consultation modal, optionally pre-filling the topic. */
  openConsultation: (topic?: string) => void;
  openSearch: () => void;
}

const SiteContext = createContext<SiteContextValue | null>(null);

export function useSite(): SiteContextValue {
  const ctx = useContext(SiteContext);
  if (!ctx) throw new Error('useSite must be used inside <SiteChrome>');
  return ctx;
}

/** Turns legacy absolute/hash hrefs into clean internal paths. */
export function normalizeHref(href: string): { path: string; external: boolean } {
  if (!href) return { path: '/', external: false };

  if (href.startsWith('mailto:') || href.startsWith('tel:')) {
    return { path: href, external: true };
  }

  if (/^https?:\/\//i.test(href)) {
    try {
      const url = new URL(href);
      if (url.origin === SITE_URL || /octaviatechnologies\.com$/i.test(url.hostname)) {
        return { path: `${url.pathname}${url.search}` || '/', external: false };
      }
    } catch {
      /* fall through to external */
    }
    return { path: href, external: true };
  }

  if (href.startsWith('#')) return { path: '/', external: false };

  const path = href.startsWith('/') ? href : `/${href}`;
  // Trailing slashes are normalised away so every page has one canonical URL.
  const trimmed = path.length > 1 ? path.replace(/\/+$/, '') : path;
  return { path: trimmed, external: false };
}

export function SiteChrome({ children }: { children: ReactNode }) {
  const router = useRouter();
  const [mobileNavOpen, setMobileNavOpen] = useState(false);
  const [consultationOpen, setConsultationOpen] = useState(false);
  const [consultationTopic, setConsultationTopic] = useState('Get a Free Consultation');
  const [searchOpen, setSearchOpen] = useState(false);

  const navigateTo = useCallback(
    (href: string) => {
      const { path, external } = normalizeHref(href);
      setMobileNavOpen(false);
      setSearchOpen(false);

      if (external) {
        if (path.startsWith('mailto:') || path.startsWith('tel:')) {
          window.location.href = path;
        } else {
          window.open(path, '_blank', 'noopener,noreferrer');
        }
        return;
      }

      void router.navigate({ to: path as string & {} });
    },
    [router],
  );

  const openConsultation = useCallback((topic = 'Get a Free Consultation') => {
    setConsultationTopic(topic);
    setConsultationOpen(true);
  }, []);

  const openSearch = useCallback(() => setSearchOpen(true), []);

  const value = useMemo<SiteContextValue>(
    () => ({ navigateTo, openConsultation, openSearch }),
    [navigateTo, openConsultation, openSearch],
  );

  const handleLinkClick = useCallback((href: string) => navigateTo(href), [navigateTo]);

  return (
    <SiteContext.Provider value={value}>
      <div className="min-h-dvh bg-[#153758] font-sans text-[#FEFEFE] selection:bg-[#264868] selection:text-white">
        <a href="#main-content" className="skip-link">
          Skip to main content
        </a>

        <Header
          onOpenConsultation={openConsultation}
          onOpenMobileNav={() => setMobileNavOpen(true)}
          onOpenSearch={openSearch}
          onLinkClick={handleLinkClick}
        />

        {children}

        <FooterSection onOpenConsultation={openConsultation} onLinkClick={handleLinkClick} />

        <MobileNav
          isOpen={mobileNavOpen}
          onClose={() => setMobileNavOpen(false)}
          onLinkClick={handleLinkClick}
          onConsultationClick={() => openConsultation('Mobile Request')}
        />

        <ConsultationModal
          isOpen={consultationOpen}
          onClose={() => setConsultationOpen(false)}
          defaultTopic={consultationTopic}
        />

        <SearchModal isOpen={searchOpen} onClose={() => setSearchOpen(false)} onLinkClick={handleLinkClick} />
      </div>
    </SiteContext.Provider>
  );
}

/** Standard main landmark used by every page route. */
export function PageMain({ children, className = '' }: { children: ReactNode; className?: string }) {
  return (
    <main id="main-content" className={`relative z-10 ${className}`}>
      {children}
    </main>
  );
}
