import { Logo } from '../ui/Logo';
import React, { useState } from 'react';
import {
  Mail,
  Phone,
  MapPin,
  Globe,
  ArrowUp,
  CheckCircle2,
  ShieldCheck,
  Award,
  Sparkles,
  ArrowRight,
  ExternalLink,
  Building2,
  Clock,
  Send,
} from '@/site/icons';

export const FooterSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
  onLinkClick: (href: string, label: string) => void;
}> = ({ onOpenConsultation, onLinkClick }) => {
  const [newsletterEmail, setNewsletterEmail] = useState('');
  const [subscribed, setSubscribed] = useState(false);

  const handleSubscribe = (e: React.FormEvent) => {
    e.preventDefault();
    if (newsletterEmail.trim()) {
      setSubscribed(true);
      setTimeout(() => setSubscribed(false), 5000);
      setNewsletterEmail('');
    }
  };

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <footer className="bg-[#0F2334] text-[#B4C1CD] text-xs border-t border-[#153758] relative z-10 overflow-hidden" id="main-footer">
      {/* Decorative Glow Elements */}
      <div className="absolute top-0 left-1/4 w-96 h-96 bg-[#264868]/20 rounded-full blur-3xl pointer-events-none -translate-y-1/2" />
      <div className="absolute bottom-0 right-10 w-96 h-96 bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none" />

      {/* Top Pre-Footer Banner / CTA Box (Codinix Style) */}
      <div className="border-b border-[#153758]/80 bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] py-12 px-6 relative z-10">
        <div className="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
          <div className="space-y-2 max-w-2xl text-center lg:text-left">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#C1A972]/10 border border-[#C1A972]/30 text-[#D9C48F] font-bold text-[11px] uppercase tracking-wider">
              <Sparkles className="w-3.5 h-3.5" />
              <span>Enterprise Technology Consulting</span>
            </div>
            <h3 className="text-2xl sm:text-3xl font-black text-white tracking-tight">
              Ready to Accelerate Your Digital Transformation?
            </h3>
            <p className="text-[#B4C1CD] text-xs sm:text-sm leading-relaxed">
              Partner with our global solution architects for CRM, Cloud DevOps, Custom AI, or Dedicated IT Staffing.
            </p>
          </div>

          <div className="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">
            <button
              onClick={() => onOpenConsultation('Footer CTA Banner')}
              className="w-full sm:w-auto px-6 py-3.5 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs uppercase tracking-wider rounded-xl transition-all shadow-lg hover:shadow-[#C1A972]/20 flex items-center justify-center gap-2"
            >
              <span>Schedule Free Consultation</span>
              <ArrowRight className="w-4 h-4" />
            </button>

            {/* Newsletter Subscription Form */}
            <form onSubmit={handleSubscribe} className="relative w-full sm:w-80 flex items-center">
              <input
                type="email"
                required
                value={newsletterEmail}
                onChange={(e) => setNewsletterEmail(e.target.value)}
                placeholder="Enter work email for insights"
                className="w-full pl-4 pr-24 py-3.5 rounded-xl bg-[#0F2334]/90 border border-[#153758] text-white placeholder-[#93A3B2] text-xs focus:outline-none focus:border-[#C1A972] transition-all"
              />
              <button
                type="submit"
                className="absolute right-1.5 px-3 py-2 bg-[#264868] hover:bg-[#153758] text-white font-bold text-[11px] rounded-lg transition-all flex items-center gap-1.5 border border-white/10"
              >
                <span>Subscribe</span>
                <Send className="w-3 h-3 text-[#D9C48F]" />
              </button>
            </form>
          </div>
        </div>

        {subscribed && (
          <div className="max-w-7xl mx-auto mt-4 p-3 bg-[#153758]/80 border border-[#264868]/40 rounded-xl text-[#264868] text-xs text-center flex items-center justify-center gap-2">
            <CheckCircle2 className="w-4 h-4 text-[#264868]" />
            <span>Thank you for subscribing to Octavia Tech Insights! Check your inbox shortly.</span>
          </div>
        )}
      </div>

      {/* Main Multi-Column Footer Grid */}
      <div className="max-w-7xl mx-auto px-6 py-16 space-y-12 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
          
          {/* Column 1: Brand Profile & Trust Certifications (Span 4) */}
          <div className="lg:col-span-4 space-y-6">
            <Logo isScrolled={false} sizeClassName="h-9" onNavigate={(href) => onLinkClick(href, 'Home')} />

            <p className="text-[#B4C1CD] text-xs leading-relaxed max-w-sm">
              Codinix-grade software development & enterprise IT consulting. Engineering secure cloud platforms, AI integrations, CRM/ERP modernizations, and 24/7 managed infrastructure worldwide.
            </p>

            {/* Certifications & Badges Row */}
            <div className="grid grid-cols-2 gap-2 pt-2 max-w-sm">
              <div className="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                <ShieldCheck className="w-4 h-4 text-[#264868] shrink-0" />
                <span>ISO 27001 Certified</span>
              </div>
              <div className="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                <Award className="w-4 h-4 text-[#D9C48F] shrink-0" />
                <span>SOC 2 Type II Compliant</span>
              </div>
              <div className="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                <Sparkles className="w-4 h-4 text-[#D9C48F] shrink-0" />
                <span>Salesforce Partner</span>
              </div>
              <div className="flex items-center gap-2 p-2 rounded-lg bg-white/5 border border-white/10 text-[11px] text-[#B4C1CD]">
                <Globe className="w-4 h-4 text-[#264868] shrink-0" />
                <span>AWS Premier Tier</span>
              </div>
            </div>

            {/* Social Media Links */}
            <div className="pt-2 flex items-center gap-2.5">
              <a
                href="https://www.linkedin.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all"
                aria-label="LinkedIn"
              >
                <svg className="w-4 h-4 fill-currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                </svg>
              </a>
              <a
                href="https://x.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all"
                aria-label="X / Twitter"
              >
                <svg className="w-4 h-4 fill-currentColor" viewBox="0 0 24 24">
                  <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                </svg>
              </a>
              <a
                href="https://www.facebook.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all"
                aria-label="Facebook"
              >
                <svg className="w-4 h-4 fill-currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073C24 5.446 18.627.073 12 .073S0 5.446 0 12.073c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
              </a>
              <a
                href="https://www.instagram.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 rounded-xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-[#264868] text-[#B4C1CD] hover:text-white flex items-center justify-center transition-all"
                aria-label="Instagram"
              >
                <svg className="w-4 h-4 fill-currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 1-2.881 0 1.44 1.44 0 0 1 2.881 0z" />
                </svg>
              </a>
            </div>
          </div>

          {/* Column 2: Core Technology Services (Span 2) */}
          <div className="lg:col-span-2 space-y-3">
            <h4 className="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider flex items-center gap-1.5">
              <span>Services</span>
            </h4>
            <ul className="space-y-2 text-[#B4C1CD]">
              <li>
                <button onClick={() => onLinkClick('/services/crm-erp', 'CRM & ERP Solutions')} className="hover:text-white transition-colors text-left">
                  CRM & ERP Modernization
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/services/cloud-devops', 'Cloud & DevOps')} className="hover:text-white transition-colors text-left">
                  Cloud Enablement & DevOps
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/services/web-development', 'Custom Software Engineering')} className="hover:text-white transition-colors text-left">
                  Custom Software Dev
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/services/ai-ml', 'AI & Machine Learning')} className="hover:text-white transition-colors text-left">
                  AI & Machine Learning
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/services/mobile-apps', 'Mobile App Engineering')} className="hover:text-white transition-colors text-left">
                  Mobile App Engineering
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/services/cyber-security', 'Cybersecurity & Compliance')} className="hover:text-white transition-colors text-left">
                  Cybersecurity & Zero Trust
                </button></li>
              <li>
                <button onClick={() => onLinkClick('/services/staff-augmentation', 'IT Staff Augmentation')} className="hover:text-white transition-colors text-left">
                  IT Staff Augmentation
                </button>
              </li>
            </ul>
          </div>

          {/* Column 3: Industries & Solutions (Span 2) */}
          <div className="lg:col-span-2 space-y-3">
            <h4 className="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider flex items-center gap-1.5">
              <span>Industries</span>
            </h4>
            <ul className="space-y-2 text-[#B4C1CD]">
              <li>
                <button onClick={() => onLinkClick('/industries/healthcare', 'Healthcare & Life Sciences')} className="hover:text-white transition-colors text-left">
                  Healthcare & Life Sciences
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/industries/fintech', 'FinTech & Banking')} className="hover:text-white transition-colors text-left">
                  FinTech & Digital Banking
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/industries/ecommerce', 'Retail & E-Commerce')} className="hover:text-white transition-colors text-left">
                  Retail & Headless Commerce
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/industries/manufacturing', 'Manufacturing & IoT')} className="hover:text-white transition-colors text-left">
                  Smart Manufacturing & IoT
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/industries/telecom', 'Telecom & Media')} className="hover:text-white transition-colors text-left">
                  Telecom & Media
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/industries/supply-chain', 'Supply Chain & Logistics')} className="hover:text-white transition-colors text-left">
                  Supply Chain & Logistics
                </button>
              </li>
            </ul>
          </div>

          {/* Column 4: Quick Links / Company (Span 2) */}
          <div className="lg:col-span-2 space-y-3">
            <h4 className="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider flex items-center gap-1.5">
              <span>Company</span>
            </h4>
            <ul className="space-y-2 text-[#B4C1CD]">
              <li>
                <button onClick={() => onLinkClick('/about-us', 'About Us')} className="hover:text-white transition-colors text-left">
                  About Octavia
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/case-studies', 'Case Studies')} className="hover:text-white transition-colors text-left">
                  Case Studies & ROI
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/process', 'Our Delivery Process')} className="hover:text-white transition-colors text-left">
                  Delivery Process
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/careers', 'Careers')} className="hover:text-white transition-colors text-left flex items-center gap-1.5">
                  <span>Careers</span>
                  <span className="text-[9px] font-bold bg-[#264868] text-[#D9C48F] px-1.5 py-0.5 rounded uppercase">Hiring</span>
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/blog', 'Insights & Blog')} className="hover:text-white transition-colors text-left">
                  Insights & Whitepapers
                </button>
              </li>
              <li>
                <button onClick={() => onLinkClick('/contact', 'Contact Us')} className="hover:text-white transition-colors text-left">
                  Contact Us
                </button>
              </li>
            </ul>
          </div>

          {/* Column 5: Global Offices & Contact (Span 2) */}
          <div className="lg:col-span-2 space-y-4">
            <h4 className="text-[#D9C48F] font-extrabold text-xs uppercase tracking-wider">
              Global Offices
            </h4>

            {/* US Office */}
            <div className="space-y-1">
              <div className="flex items-center gap-1.5 font-bold text-white text-[11px]">
                <Building2 className="w-3.5 h-3.5 text-[#D9C48F]" />
                <span>US Headquarters</span>
              </div>
              <p className="text-[#B4C1CD] text-[11px] leading-snug">
                200 Middlesex Essex Turnpike,<br />
                Suite 306E, Iselin, NJ 08830, USA
              </p>
            </div>

            {/* India Office */}
            <div className="space-y-1 pt-1 border-t border-[#153758]">
              <div className="flex items-center gap-1.5 font-bold text-white text-[11px]">
                <Building2 className="w-3.5 h-3.5 text-[#D9C48F]" />
                <span>India Tech Hub</span>
              </div>
              <p className="text-[#B4C1CD] text-[11px] leading-snug">
                Bhutani Cyber Park, Sector 62,<br />
                Noida, Uttar Pradesh, India
              </p>
            </div>

            {/* Contact Details */}
            <div className="space-y-1.5 pt-2 border-t border-[#153758]">
              <div className="flex items-center gap-2 text-[#B4C1CD]">
                <Mail className="w-3.5 h-3.5 text-[#D9C48F] shrink-0" />
                <a href="mailto:connect@codinix.com" className="hover:text-white transition-colors truncate">
                  connect@codinix.com
                </a>
              </div>
              <div className="flex items-center gap-2 text-[#B4C1CD]">
                <Phone className="w-3.5 h-3.5 text-[#D9C48F] shrink-0" />
                <a href="tel:+17713332222" className="hover:text-white transition-colors">
                  +1 (771) 333-2222
                </a>
              </div>
              <div className="flex items-center gap-2 text-[#B4C1CD]">
                <Clock className="w-3.5 h-3.5 text-[#264868] shrink-0" />
                <span className="text-[11px] text-[#B4C1CD]">24/7 Global Delivery Support</span>
              </div>
            </div>
          </div>

        </div>

        {/* Bottom Bar: Copyright & Legal */}
        <div className="pt-8 border-t border-[#153758] flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-[#B4C1CD]">
          <p>© {new Date().getFullYear()} Octavia Tech Solutions / Codinix. All rights reserved.</p>

          <div className="flex flex-wrap items-center gap-6">
            <button onClick={() => onLinkClick('/privacy-policy', 'Privacy Policy')} className="hover:text-white transition-colors">
              Privacy Policy
            </button>
            <button onClick={() => onLinkClick('/terms-of-service', 'Terms of Service')} className="hover:text-white transition-colors">
              Terms of Service
            </button>
            <button onClick={() => onLinkClick('/cookie-policy', 'Cookie Policy')} className="hover:text-white transition-colors">
              Cookie Policy
            </button>
            <button onClick={() => onLinkClick('/sitemap', 'Sitemap')} className="hover:text-white transition-colors">
              Sitemap
            </button>

            {/* Back to Top Floating Button */}
            <button
              onClick={scrollToTop}
              className="w-8 h-8 rounded-lg bg-white/10 hover:bg-[#C1A972] text-white hover:text-[#153758] flex items-center justify-center transition-all ml-2"
              title="Back to top"
              aria-label="Back to top"
            >
              <ArrowUp className="w-4 h-4" />
            </button>
          </div>
        </div>
      </div>
    </footer>
  );
};
