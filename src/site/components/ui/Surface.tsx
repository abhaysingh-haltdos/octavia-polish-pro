import React from 'react';

import { cn } from '@/lib/utils';

interface SurfaceProps extends React.HTMLAttributes<HTMLDivElement> {
  /** `light` sits on white sections, `dark` on the deep-blue sections. */
  tone?: 'light' | 'dark';
  interactive?: boolean;
}

/** Shared card surface: one radius, border, padding rhythm and hover lift. */
export const Card: React.FC<SurfaceProps> = ({
  tone = 'light',
  interactive = true,
  className,
  ...props
}) => (
  <div
    className={cn(
      'rounded-2xl p-6 transition-all duration-300',
      tone === 'light'
        ? 'bg-[#FEFEFE] border border-[#93A3B2]/30 shadow-sm'
        : 'bg-white/[0.04] border border-white/10 backdrop-blur-md',
      interactive &&
        (tone === 'light'
          ? 'hover:-translate-y-1 hover:border-[#C1A972] hover:shadow-xl hover:shadow-[#153758]/10'
          : 'hover:-translate-y-1 hover:border-[#C1A972]/60 hover:bg-white/[0.07]'),
      className,
    )}
    {...props}
  />
);

interface SectionProps extends React.HTMLAttributes<HTMLElement> {
  tone?: 'light' | 'tint' | 'dark';
  containerClassName?: string;
}

/** Shared section wrapper: consistent vertical rhythm and container width. */
export const Section: React.FC<SectionProps> = ({
  tone = 'light',
  className,
  containerClassName,
  children,
  ...props
}) => (
  <section
    className={cn(
      'w-full py-20 px-6 sm:py-24',
      tone === 'light' && 'bg-[#FEFEFE] text-[#153758]',
      tone === 'tint' && 'bg-[#F3F5F7] text-[#153758]',
      tone === 'dark' && 'bg-[#153758] text-[#FEFEFE]',
      className,
    )}
    {...props}
  >
    <div className={cn('mx-auto w-full max-w-7xl', containerClassName)}>{children}</div>
  </section>
);
