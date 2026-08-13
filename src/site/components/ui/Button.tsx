import React from 'react';

import { cn } from '@/lib/utils';

type Variant = 'primary' | 'secondary' | 'accent' | 'ghost' | 'onDark';
type Size = 'sm' | 'md' | 'lg';

const BASE =
  'inline-flex items-center justify-center gap-2 rounded-2xl font-bold tracking-tight transition-all duration-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#C1A972] disabled:opacity-60 disabled:pointer-events-none';

const VARIANTS: Record<Variant, string> = {
  primary: 'bg-[#264868] text-[#FEFEFE] hover:bg-[#153758] shadow-lg shadow-[#153758]/20',
  secondary:
    'bg-[#FEFEFE] text-[#264868] border border-[#93A3B2]/45 hover:border-[#264868] hover:bg-[#F3F5F7]',
  accent: 'bg-[#C1A972] text-[#153758] hover:bg-[#C1A972]/90 shadow-lg shadow-[#153758]/15',
  ghost: 'bg-transparent text-[#264868] hover:bg-[#264868]/10',
  onDark: 'bg-white/10 text-[#FEFEFE] border border-white/15 hover:bg-white/20 backdrop-blur-md',
};

const SIZES: Record<Size, string> = {
  sm: 'px-4 py-2.5 text-xs min-h-11',
  md: 'px-6 py-3 text-sm min-h-11',
  lg: 'px-8 py-4 text-base min-h-12',
};

export interface ButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  variant?: Variant;
  size?: Size;
}

/** Shared Octavia button. One radius, weight, padding and focus treatment site-wide. */
export const Button: React.FC<ButtonProps> = ({
  variant = 'primary',
  size = 'md',
  className,
  ...props
}) => <button className={cn(BASE, VARIANTS[variant], SIZES[size], className)} {...props} />;

export interface LinkButtonProps extends React.AnchorHTMLAttributes<HTMLAnchorElement> {
  variant?: Variant;
  size?: Size;
}

/** Anchor styled exactly like <Button> for navigational CTAs. */
export const LinkButton: React.FC<LinkButtonProps> = ({
  variant = 'primary',
  size = 'md',
  className,
  ...props
}) => <a className={cn(BASE, VARIANTS[variant], SIZES[size], className)} {...props} />;

export const buttonClasses = (variant: Variant = 'primary', size: Size = 'md', extra = '') =>
  cn(BASE, VARIANTS[variant], SIZES[size], extra);
