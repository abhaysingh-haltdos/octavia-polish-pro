import React from 'react';
import { ServiceHeroData, ServiceSeoData } from '../../types/service';
import { Sparkles, ArrowRight, ShieldCheck, CheckCircle2, Terminal, Code2, Cpu, ChevronRight, Activity, Zap } from '@/site/icons';

interface ServiceHeroProps {
  data: ServiceHeroData;
  seo?: ServiceSeoData;
  onOpenConsultation: (topic?: string) => void;
}

export const ServiceHero: React.FC<ServiceHeroProps> = ({ data, seo, onOpenConsultation }) => {
  return (
    <section className="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-[#FEFEFE] border-b border-[#DDE3E9] overflow-hidden text-[#153758]">
      {/* Background Subtle Accent Gradients */}
      <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-[#264868]/5 blur-[120px] rounded-full pointer-events-none" />
      <div className="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[#C1A972]/10 blur-[100px] rounded-full pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {/* SEO Breadcrumb Navigation */}
        {seo?.breadcrumbs && seo.breadcrumbs.length > 0 && (
          <nav aria-label="Breadcrumb" className="mb-6 flex items-center gap-2 text-xs text-[#4A5A6B]">
            {seo.breadcrumbs.map((crumb, idx) => (
              <React.Fragment key={idx}>
                {idx > 0 && <ChevronRight className="w-3.5 h-3.5 text-[#DDE3E9]" />}
                <a
                  href={crumb.href}
                  className="hover:text-[#B4C1CD] transition-colors font-medium"
                >
                  {crumb.name}
                </a>
              </React.Fragment>
            ))}
          </nav>
        )}

        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          
          {/* Left Column: Heading & Value Prop */}
          <div className="lg:col-span-7 space-y-6 text-left">
            {/* Service Category Badge */}
            <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
              <Sparkles className="w-4 h-4 text-[#B4C1CD]" />
              <span className="text-xs font-semibold tracking-wide text-[#5C6B7A] uppercase">
                {data.badge}
              </span>
            </div>

            {/* Main Headline */}
            <h1 className="text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-extrabold tracking-tight text-[#153758] leading-[1.15]">
              {data.title}{' '}
              <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#264868] via-[#153758] to-[#C1A972]">
                {data.titleHighlight}
              </span>
            </h1>

            {/* Description */}
            <p className="text-base sm:text-lg text-[#153758] leading-relaxed font-normal max-w-2xl">
              {data.description}
            </p>

            {/* Action Buttons */}
            <div className="flex flex-wrap items-center gap-4 pt-2">
              <button
                onClick={() => onOpenConsultation(data.primaryCtaText)}
                className="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-[12px] text-sm font-bold text-white bg-[#264868] hover:bg-[#153758] transition-all duration-200 shadow-[0_4px_14px_rgba(32,70,105,0.25)] hover:-translate-y-0.5"
              >
                <span>{data.primaryCtaText}</span>
                <ArrowRight className="w-4 h-4" />
              </button>

              <button
                onClick={() => onOpenConsultation('Request Proposal')}
                className="inline-flex items-center gap-2 px-6 py-3.5 rounded-[12px] text-sm font-semibold text-[#153758] bg-white hover:bg-[#F3F5F7] border border-[#DDE3E9] transition-all duration-200 hover:-translate-y-0.5 shadow-sm"
              >
                <span>{data.secondaryCtaText}</span>
              </button>
            </div>

            {/* Trust Tags */}
            {data.tags && data.tags.length > 0 && (
              <div className="pt-4 border-t border-[#DDE3E9] flex flex-wrap items-center gap-2.5">
                {data.tags.map((tag, idx) => (
                  <div key={idx} className="flex items-center gap-1.5 text-xs text-[#201B09] bg-white px-3 py-1.5 rounded-lg border border-[#DDE3E9] shadow-2xs">
                    <CheckCircle2 className="w-3.5 h-3.5 text-[#B4C1CD] shrink-0" />
                    <span className="font-medium">{tag}</span>
                  </div>
                ))}
              </div>
            )}
          </div>

          {/* Right Column: Dashboard & Interactive Product Mockup */}
          <div className="lg:col-span-5 relative">
            <div className="relative rounded-[20px] bg-[#153758] border border-[#264868] p-6 shadow-[0px_20px_50px_rgba(24,43,58,0.25)] text-white overflow-hidden group">
              
              {/* Header bar of Dashboard Mockup */}
              <div className="flex items-center justify-between pb-4 border-b border-white/10">
                <div className="flex items-center gap-2">
                  <div className="w-3 h-3 rounded-full bg-[#264868]" />
                  <div className="w-3 h-3 rounded-full bg-[#C1A972]" />
                  <div className="w-3 h-3 rounded-full bg-[#264868]" />
                  <span className="ml-2 text-xs font-mono text-[#B4C1CD] flex items-center gap-1">
                    <Terminal className="w-3.5 h-3.5 text-[#D9C48F]" />
                    octavia-service-core.ts
                  </span>
                </div>
                <span className="text-[10px] font-bold uppercase px-2 py-0.5 rounded bg-[#C1A972]/20 text-[#D9C48F] border border-[#C1A972]/30">
                  Enterprise SLA 99.99%
                </span>
              </div>

              {/* Code / Visual Interactive Dashboard Preview */}
              <div className="py-5 space-y-4 font-mono text-xs text-[#FEFEFE]">
                <div className="p-4 rounded-xl bg-[#0F2334] border border-white/10 space-y-2">
                  <div className="text-[#D9C48F] font-bold flex items-center justify-between">
                    <span>// {data.graphicBadge || 'Octavia Engineering Architecture'}</span>
                    <Cpu className="w-4 h-4 text-[#D9C48F]" />
                  </div>
                  <div className="text-[#B4C1CD] font-sans leading-relaxed text-xs">
                    <div className="text-white font-bold text-sm mb-1">{data.graphicTitle || 'Enterprise Performance Platform'}</div>
                    <div className="text-[#B4C1CD] text-xs">{data.graphicSubtext || 'Sub-second latency, zero downtime, and automated compliance.'}</div>
                  </div>
                </div>

                {/* KPI metrics in Mockup */}
                <div className="grid grid-cols-2 gap-3 pt-1 font-sans">
                  <div className="p-3 rounded-xl bg-white/[0.04] border border-white/10 flex items-center gap-3">
                    <div className="p-2 rounded-lg bg-[#264868]/20 text-[#B4C1CD] shrink-0">
                      <ShieldCheck className="w-4 h-4" />
                    </div>
                    <div>
                      <div className="text-[11px] font-bold text-white">Data-Driven ROI</div>
                      <div className="text-[10px] text-[#B4C1CD]">Attribution Core</div>
                    </div>
                  </div>

                  <div className="p-3 rounded-xl bg-white/[0.04] border border-white/10 flex items-center gap-3">
                    <div className="p-2 rounded-lg bg-[#C1A972]/20 text-[#D9C48F] shrink-0">
                      <Zap className="w-4 h-4" />
                    </div>
                    <div>
                      <div className="text-[11px] font-bold text-white">Full-Funnel Ads</div>
                      <div className="text-[10px] text-[#B4C1CD]">Google & Meta</div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  );
};
