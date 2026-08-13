import React, { useState } from 'react';
import {
  Zap,
  Compass,
  FileSpreadsheet,
  Landmark,
  Database,
  Users,
  ShieldAlert,
  BarChart3,
  Activity,
  Cpu,
  Video,
  HeartPulse,
  Building2,
  ShieldCheck,
  ShoppingBag,
  Sparkles,
  Factory,
  Radio,
  Truck,
  Boxes,
  ArrowRight,
  CheckCircle2,
  ChevronDown,
  ChevronUp,
  PhoneCall,
  Download,
  Server,
  Globe,
  Lock,
  Layers,
  ArrowUpRight,
  Shield,
  Clock,
  Briefcase,
  HelpCircle,
  FileText,
} from '@/site/icons';
import { INDUSTRY_DATA, IndustryPageData } from '../../data/industryData';

// Helper icon resolver
const iconMap: Record<string, React.FC<{ className?: string }>> = {
  Zap,
  Compass,
  FileSpreadsheet,
  Landmark,
  Database,
  Users,
  ShieldAlert,
  BarChart3,
  Activity,
  Cpu,
  Video,
  HeartPulse,
  Building2,
  ShieldCheck,
  ShoppingBag,
  Sparkles,
  Factory,
  Radio,
  Truck,
  Boxes,
};

interface IndustryDetailPageProps {
  slug: string;
  onNavigateToIndustry: (slug: string) => void;
  onOpenConsultation: (topic: string) => void;
  onLinkClick: (href: string, label: string) => void;
}

export const IndustryDetailPage: React.FC<IndustryDetailPageProps> = ({
  slug,
  onNavigateToIndustry,
  onOpenConsultation,
  onLinkClick,
}) => {
  // Fallback to wholesale-softswitch-billing if slug not found
  const industry: IndustryPageData = INDUSTRY_DATA[slug] || INDUSTRY_DATA['wholesale-softswitch-billing']!;
  const [openFaqIndex, setOpenFaqIndex] = useState<number | null>(0);
  const [activeSpecTab, setActiveSpecTab] = useState<number>(0);

  const toggleFaq = (index: number) => {
    setOpenFaqIndex(openFaqIndex === index ? null : index);
  };

  const isSoftswitchPage = slug === 'wholesale-softswitch-billing';

  return (
    <div className="bg-[#FEFEFE] min-h-screen text-[#153758] font-sans pb-24">
      {/* 1. HERO SECTION (Dark Navy Brand Background) */}
      <section className="bg-gradient-to-b from-[#0F2334] via-[#153758] to-[#264868] text-white pt-28 pb-20 px-6 relative overflow-hidden border-b border-[#153758]">
        {/* Subtle Ambient Glow */}
        <div className="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-[#C1A972]/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto relative z-10">
          {/* Breadcrumb Navigation */}
          <div className="flex items-center gap-2 text-xs text-[#93A3B2] mb-8 font-medium">
            <button onClick={() => onLinkClick('/', 'Home')} className="hover:text-[#C1A972] transition-colors">
              Home
            </button>
            <span>/</span>
            <button onClick={() => onLinkClick('/industries', 'Industries')} className="hover:text-[#C1A972] transition-colors">
              Industries
            </button>
            <span>/</span>
            <span className="text-[#C1A972] font-bold">{industry.shortTitle}</span>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            {/* Left Col: Headings & Value Prop */}
            <div className="lg:col-span-7 space-y-6">
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#C1A972]/15 border border-[#C1A972]/30 text-[#C1A972] text-xs font-bold uppercase tracking-widest">
                <ShieldCheck className="w-4 h-4" />
                <span>{industry.category} Enterprise Solutions</span>
              </div>

              <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.15]">
                {industry.title}
              </h1>

              <p className="text-[#93A3B2] text-base sm:text-lg leading-relaxed max-w-2xl">
                {industry.tagline}
              </p>

              {/* Action Buttons */}
              <div className="flex flex-col sm:flex-row items-center gap-4 pt-4">
                <button
                  onClick={() => onOpenConsultation(`Industry Solution Demo: ${industry.title}`)}
                  className="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl shadow-[#C1A972]/10 flex items-center justify-center gap-2 group"
                >
                  <span>Schedule Technical Demo</span>
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                </button>

                <button
                  onClick={() => onOpenConsultation(`Download Architecture Specification: ${industry.title}`)}
                  className="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all flex items-center justify-center gap-2"
                >
                  <Download className="w-4 h-4 text-[#C1A972]" />
                  <span>Download Tech Architecture Spec</span>
                </button>
              </div>

              {/* Trust Micro-Badges */}
              <div className="pt-6 border-t border-white/10 flex flex-wrap items-center gap-6 text-xs text-[#93A3B2] font-semibold">
                <div className="flex items-center gap-1.5">
                  <CheckCircle2 className="w-4 h-4 text-[#264868]" />
                  <span>Carrier-Grade HA 99.999% SLA</span>
                </div>
                <div className="flex items-center gap-1.5">
                  <CheckCircle2 className="w-4 h-4 text-[#C1A972]" />
                  <span>ISO 27001 & SOC 2 Certified</span>
                </div>
                <div className="flex items-center gap-1.5">
                  <CheckCircle2 className="w-4 h-4 text-[#264868]" />
                  <span>Sub-Millisecond LCR Processing</span>
                </div>
              </div>
            </div>

            {/* Right Col: Interactive Topology / Dashboard Graphic */}
            <div className="lg:col-span-5">
              {isSoftswitchPage ? (
                /* Specialized Class 4 Softswitch Topology Mockup */
                <div className="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-6 shadow-2xl space-y-6 relative overflow-hidden backdrop-blur-md">
                  <div className="flex items-center justify-between border-b border-[#153758] pb-4">
                    <div className="flex items-center gap-2">
                      <div className="w-3 h-3 rounded-full bg-[#264868] animate-pulse" />
                      <span className="text-xs font-bold text-white uppercase tracking-wider">
                        Softswitch NOC Active Telemetry
                      </span>
                    </div>
                    <span className="text-[10px] font-mono text-[#264868] bg-[#153758]/80 px-2.5 py-1 rounded-full border border-[#264868]/30">
                      LIVE 2,450 CPS
                    </span>
                  </div>

                  {/* Architecture Topology Box */}
                  <div className="space-y-3">
                    <div className="text-[11px] font-bold text-[#93A3B2] uppercase tracking-widest">
                      Interconnect Routing Topology
                    </div>
                    
                    <div className="grid grid-cols-3 gap-2 text-center text-[10px] font-bold">
                      <div className="p-3 bg-[#153758]/80 rounded-xl border border-[#153758] text-[#93A3B2]">
                        <Server className="w-4 h-4 text-[#264868] mx-auto mb-1" />
                        <span>Inbound Carriers</span>
                        <div className="text-[9px] text-[#264868] mt-1">42 Connected</div>
                      </div>

                      <div className="p-3 bg-[#264868] rounded-xl border border-[#C1A972]/50 text-white shadow-lg">
                        <Zap className="w-4 h-4 text-[#C1A972] mx-auto mb-1 animate-spin" />
                        <span>LCR Rating Engine</span>
                        <div className="text-[9px] text-[#C1A972] mt-1">&lt; 1.8ms Latency</div>
                      </div>

                      <div className="p-3 bg-[#153758]/80 rounded-xl border border-[#153758] text-[#93A3B2]">
                        <Globe className="w-4 h-4 text-[#C1A972] mx-auto mb-1" />
                        <span>Outbound Vendors</span>
                        <div className="text-[9px] text-[#264868] mt-1">85 Tier-1 Vendors</div>
                      </div>
                    </div>
                  </div>

                  {/* Real-time CDR Ingestion Metrics */}
                  <div className="p-4 bg-[#0F2334]/90 rounded-2xl border border-[#153758] space-y-3 font-mono text-xs">
                    <div className="flex justify-between items-center text-[#93A3B2]">
                      <span>Rate Sheet Sync:</span>
                      <span className="text-[#264868] font-bold">1.2M Codes Active</span>
                    </div>
                    <div className="flex justify-between items-center text-[#93A3B2]">
                      <span>Margin Protection:</span>
                      <span className="text-[#C1A972] font-bold">Zero Negative Routes</span>
                    </div>
                    <div className="flex justify-between items-center text-[#93A3B2]">
                      <span>Daily CDR Volume:</span>
                      <span className="text-white font-bold">54,820,102 Rated</span>
                    </div>
                  </div>

                  <div className="pt-2 text-center">
                    <span className="text-[11px] text-[#93A3B2]">
                      High Availability Active-Active Geo Cluster (US-East &amp; EU-Central)
                    </span>
                  </div>
                </div>
              ) : (
                /* General Enterprise Industry Solution Box */
                <div className="bg-[#0F2334]/90 border border-[#153758]/80 rounded-3xl p-6 shadow-2xl space-y-6 relative overflow-hidden">
                  <div className="flex items-center justify-between border-b border-[#153758] pb-4">
                    <span className="text-xs font-bold text-white uppercase tracking-wider flex items-center gap-2">
                      <Layers className="w-4 h-4 text-[#C1A972]" />
                      <span>{industry.shortTitle} Solution Stack</span>
                    </span>
                    <span className="text-[10px] font-semibold text-[#264868] bg-[#153758] px-2.5 py-1 rounded-full">
                      ENTERPRISE READY
                    </span>
                  </div>

                  <div className="space-y-3">
                    {industry.features.slice(0, 3).map((f, i) => (
                      <div key={i} className="p-3.5 bg-[#153758]/60 rounded-xl border border-[#153758]/60 flex items-start gap-3">
                        <CheckCircle2 className="w-4 h-4 text-[#C1A972] shrink-0 mt-0.5" />
                        <div>
                          <div className="text-xs font-bold text-white">{f.title}</div>
                          <div className="text-[11px] text-[#93A3B2] mt-0.5 line-clamp-2">{f.description}</div>
                        </div>
                      </div>
                    ))}
                  </div>

                  <div className="p-4 bg-[#264868]/40 rounded-2xl border border-[#C1A972]/30 text-center">
                    <p className="text-xs text-[#FEFEFE]">
                      Customized deployment tailored to your enterprise security policy &amp; existing infrastructure.
                    </p>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </section>

      {/* 2. KEY METRICS & IMPACT BANNER */}
      <section className="max-w-7xl mx-auto px-6 -mt-10 relative z-20">
        <div className="bg-white border border-[#DDE3E9]/80 rounded-3xl p-8 shadow-xl shadow-[#DDE3E9]/50 grid grid-cols-2 md:grid-cols-4 gap-6">
          {industry.metrics.map((m, idx) => (
            <div key={idx} className="space-y-1 text-center md:text-left border-r last:border-r-0 border-[#F3F5F7] pr-4">
              <div className="text-3xl sm:text-4xl font-black text-[#264868] tracking-tight">{m.value}</div>
              <div className="text-xs font-bold text-[#153758] uppercase tracking-wider">{m.label}</div>
              <div className="text-[11px] text-[#5C6B7A] leading-snug">{m.description}</div>
            </div>
          ))}
        </div>
      </section>

      {/* 3. OVERVIEW SECTION */}
      <section className="max-w-7xl mx-auto px-6 py-20">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          <div className="lg:col-span-5 space-y-4">
            <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
              Strategic Vision
            </span>
            <h2 className="text-2xl sm:text-4xl font-black text-[#264868] tracking-tight leading-tight">
              {industry.overview.heading}
            </h2>
            <p className="text-[#5C6B7A] text-sm sm:text-base font-semibold leading-relaxed">
              {industry.overview.description}
            </p>
          </div>

          <div className="lg:col-span-7 bg-white p-8 rounded-3xl border border-[#DDE3E9]/80 shadow-md space-y-4 text-[#153758] text-xs sm:text-sm leading-relaxed">
            {industry.overview.paragraphs.map((para, i) => (
              <p key={i}>{para}</p>
            ))}
          </div>
        </div>
      </section>

      {/* 4. CORE FEATURES & CAPABILITIES GRID */}
      <section className="bg-[#153758] text-white py-24 px-6 border-t border-b border-[#153758] relative">
        <div className="max-w-7xl mx-auto space-y-16">
          <div className="text-center max-w-3xl mx-auto space-y-4">
            <span className="text-xs font-bold uppercase tracking-widest text-[#C1A972]">
              Architectural Excellence
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
              Key Platform Modules &amp; Capabilities
            </h2>
            <p className="text-[#93A3B2] text-sm sm:text-base">
              Explore the core components engineered to elevate operational performance, compliance, and profitability.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {industry.features.map((feat, idx) => {
              const IconComp = iconMap[feat.iconName] || Zap;
              return (
                <div
                  key={idx}
                  className="bg-white/5 border border-white/10 hover:border-[#C1A972]/80 hover:bg-white/10 rounded-3xl p-8 transition-all duration-300 flex flex-col justify-between group"
                >
                  <div>
                    <div className="w-12 h-12 rounded-2xl bg-[#264868] text-[#C1A972] flex items-center justify-center mb-6 group-hover:bg-[#C1A972] group-hover:text-[#153758] transition-colors border border-[#C1A972]/30">
                      <IconComp className="w-6 h-6" />
                    </div>

                    <h3 className="text-xl font-bold text-white mb-3 group-hover:text-[#C1A972] transition-colors">
                      {feat.title}
                    </h3>

                    <p className="text-xs text-[#93A3B2] leading-relaxed mb-6">
                      {feat.description}
                    </p>

                    <ul className="space-y-2 border-t border-white/10 pt-4 text-xs text-[#93A3B2]">
                      {feat.highlights.map((h, i) => (
                        <li key={i} className="flex items-start gap-2">
                          <CheckCircle2 className="w-3.5 h-3.5 text-[#C1A972] shrink-0 mt-0.5" />
                          <span>{h}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 5. TECHNICAL SPECIFICATIONS TABS (IF AVAILABLE) */}
      {industry.techSpecs && industry.techSpecs.length > 0 && (
        <section className="max-w-7xl mx-auto px-6 py-24">
          <div className="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
              Technical Specifications
            </span>
            <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
              Enterprise System Specifications
            </h2>
            <p className="text-[#5C6B7A] text-xs sm:text-sm">
              Granular technical benchmarks for deployment, integration, and high availability.
            </p>
          </div>

          <div className="bg-white border border-[#DDE3E9] rounded-3xl shadow-lg overflow-hidden">
            {/* Tab Headers */}
            <div className="flex flex-wrap border-b border-[#DDE3E9] bg-[#F3F5F7]">
              {industry.techSpecs.map((spec, i) => (
                <button
                  key={i}
                  onClick={() => setActiveSpecTab(i)}
                  className={`px-8 py-4 text-xs font-bold uppercase tracking-wider transition-all border-b-2 ${
                    activeSpecTab === i
                      ? 'border-[#264868] text-[#264868] bg-white'
                      : 'border-transparent text-[#5C6B7A] hover:text-[#153758]'
                  }`}
                >
                  {spec.category}
                </button>
              ))}
            </div>

            {/* Tab Content */}
            <div className="p-8">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                {industry.techSpecs[activeSpecTab]?.items.map((item, idx) => (
                  <div key={idx} className="p-4 bg-[#F3F5F7] rounded-2xl border border-[#DDE3E9]/80 flex items-center justify-between">
                    <span className="text-xs font-bold text-[#153758]">{item.label}</span>
                    <span className="text-xs font-extrabold text-[#264868] bg-white px-3 py-1 rounded-lg border border-[#DDE3E9]">
                      {item.value}
                    </span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </section>
      )}

      {/* 6. REAL-WORLD CLIENT USE CASES */}
      <section className="max-w-7xl mx-auto px-6 py-20">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-3">
          <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
            Client Success &amp; ROI
          </span>
          <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
            Proven Enterprise Deployment Scenarios
          </h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {industry.useCases.map((uc, i) => (
            <div key={i} className="bg-white border border-[#DDE3E9] rounded-3xl p-8 shadow-md flex flex-col justify-between space-y-6">
              <div className="space-y-4">
                <span className="text-[11px] font-bold text-[#C1A972] uppercase bg-[#264868] px-3 py-1 rounded-full">
                  {uc.clientType}
                </span>

                <h3 className="text-2xl font-bold text-[#264868]">{uc.title}</h3>

                <div className="space-y-3 text-xs text-[#5C6B7A]">
                  <div>
                    <span className="font-bold text-[#153758]">Challenge: </span>
                    {uc.challenge}
                  </div>
                  <div>
                    <span className="font-bold text-[#153758]">Solution: </span>
                    {uc.solution}
                  </div>
                </div>
              </div>

              <div className="p-4 bg-[#264868]/15 rounded-2xl border border-[#264868]/15 text-xs font-semibold text-[#153758] flex items-start gap-2">
                <CheckCircle2 className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                <div>
                  <span className="font-bold">Business Result: </span>
                  {uc.result}
                </div>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* 7. FREQUENTLY ASKED QUESTIONS (FAQ Accordion) */}
      <section className="max-w-4xl mx-auto px-6 py-20">
        <div className="text-center mb-12 space-y-3">
          <span className="text-xs font-bold text-[#C1A972] uppercase tracking-widest bg-[#264868]/10 px-3 py-1 rounded-full border border-[#264868]/20">
            Frequently Asked Questions
          </span>
          <h2 className="text-3xl sm:text-4xl font-black text-[#264868]">
            Technical &amp; Commercial FAQ
          </h2>
        </div>

        <div className="space-y-4">
          {industry.faqs.map((faq, idx) => {
            const isOpen = openFaqIndex === idx;
            return (
              <div
                key={idx}
                className="bg-white border border-[#DDE3E9] rounded-2xl overflow-hidden transition-all shadow-sm"
              >
                <button
                  onClick={() => toggleFaq(idx)}
                  className="w-full p-6 text-left font-bold text-sm sm:text-base text-[#264868] flex items-center justify-between gap-4 hover:bg-[#F3F5F7] transition-colors"
                >
                  <span>{faq.question}</span>
                  {isOpen ? (
                    <ChevronUp className="w-5 h-5 text-[#C1A972] shrink-0" />
                  ) : (
                    <ChevronDown className="w-5 h-5 text-[#93A3B2] shrink-0" />
                  )}
                </button>

                {isOpen && (
                  <div className="px-6 pb-6 text-xs sm:text-sm text-[#5C6B7A] leading-relaxed border-t border-[#F3F5F7] pt-4">
                    {faq.answer}
                  </div>
                )}
              </div>
            );
          })}
        </div>
      </section>

      {/* 8. BOTTOM CONSULTATION CALL TO ACTION */}
      <section className="max-w-7xl mx-auto px-6 mt-12">
        <div className="bg-gradient-to-r from-[#153758] via-[#264868] to-[#153758] rounded-3xl p-10 sm:p-14 text-white text-center space-y-6 shadow-2xl relative overflow-hidden border border-[#C1A972]/30">
          <div className="max-w-2xl mx-auto space-y-4">
            <h2 className="text-3xl sm:text-5xl font-black tracking-tight text-white">
              Ready to Upgrade Your {industry.shortTitle} Infrastructure?
            </h2>
            <p className="text-[#93A3B2] text-xs sm:text-sm leading-relaxed">
              Connect with our principal solution architects for a tailored technical blueprint and quote.
            </p>

            <div className="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
              <button
                onClick={() => onOpenConsultation(`Consultation: ${industry.title}`)}
                className="w-full sm:w-auto px-8 py-4 bg-[#C1A972] hover:bg-[#C1A972] text-[#153758] font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-xl transition-all shadow-xl inline-flex items-center justify-center gap-2"
              >
                <span>Book Architect Consultation</span>
                <PhoneCall className="w-4 h-4" />
              </button>

              <button
                onClick={() => onLinkClick('/case-studies', 'Case Studies')}
                className="w-full sm:w-auto px-7 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm rounded-xl border border-white/20 transition-all inline-flex items-center justify-center gap-2"
              >
                <span>View Enterprise Case Studies</span>
                <ArrowUpRight className="w-4 h-4 text-[#C1A972]" />
              </button>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};
