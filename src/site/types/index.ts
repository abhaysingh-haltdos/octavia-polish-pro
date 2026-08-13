export interface NavItemLink {
  label: string;
  href: string;
  description?: string;
  badge?: string;
}

export interface MegaColumn {
  title: string;
  items: NavItemLink[];
}

export interface MegaCTA {
  title: string;
  description: string;
  primaryBtnText: string;
  primaryBtnHref: string;
  secondaryBtnText?: string;
  secondaryBtnHref?: string;
}

export interface MegaMenuConfig {
  columns: MegaColumn[];
  cta: MegaCTA;
  widthClass: 'mega-menu-xl' | 'mega-menu-md' | 'mega-menu-sm';
  gridTemplateColumns: string;
}

export interface NavItem {
  id: string;
  label: string;
  href: string;
  hasMega?: boolean;
  megaConfig?: MegaMenuConfig;
}
