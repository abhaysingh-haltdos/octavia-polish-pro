import React from 'react';

import logoAsset from '@/assets/octavia-logo.png.asset.json';

/** Intrinsic dimensions of the supplied brand asset — used to reserve space and avoid layout shift. */
export const LOGO_INTRINSIC = { width: 502, height: 173 } as const;
export const LOGO_SRC = logoAsset.url;

interface LogoProps {
  /** When the surface behind the logo is dark, the mark sits on its own light plate. */
  isScrolled?: boolean;
  onNavigate?: (href: string) => void;
  className?: string;
  /** Height utility classes for the image itself. */
  sizeClassName?: string;
}

/**
 * Official Octavia Tech Solutions wordmark. The asset is used exactly as
 * supplied — never recoloured, cropped or redrawn — and always keeps its
 * aspect ratio via `w-auto` plus intrinsic width/height.
 */
export const Logo: React.FC<LogoProps> = ({
  isScrolled = true,
  onNavigate,
  className = '',
  sizeClassName = 'h-8 sm:h-9 lg:h-11',
}) => {
  const handleClick = (e: React.MouseEvent) => {
    if (onNavigate) {
      e.preventDefault();
      onNavigate('/');
    }
  };

  return (
    <a
      href="/"
      onClick={handleClick}
      className={`logo flex min-w-0 items-center no-underline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#C1A972] ${className}`}
      aria-label="Octavia Tech Solutions — home"
      id="brand-logo-link"
    >
      <span
        className={
          isScrolled
            ? 'flex items-center'
            : 'flex items-center rounded-xl bg-[#FEFEFE] px-2.5 py-1.5 shadow-md shadow-black/20'
        }
      >
        <img
          src={LOGO_SRC}
          width={LOGO_INTRINSIC.width}
          height={LOGO_INTRINSIC.height}
          alt="Octavia Tech Solutions"
          className={`${sizeClassName} w-auto shrink-0 object-contain`}
          loading="eager"
          decoding="async"
        />
      </span>
    </a>
  );
};
