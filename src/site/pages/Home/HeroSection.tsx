import React from 'react';
import { useSite } from '@/site/SiteChrome';
import { Sparkles, ArrowRight, ShieldCheck, Cpu, Code2, Globe, CheckCircle2 } from '@/site/icons';

interface HeroSectionProps {
  onOpenConsultation: () => void;
  activeLinkAlert?: string | null;
}

export const HeroSection: React.FC<HeroSectionProps> = ({
  onOpenConsultation,
  activeLinkAlert,
}) => {
  const { navigateTo } = useSite();

  return (
    <div className="relative min-h-screen bg-[#153758] text-white pt-36 pb-20 px-6 overflow-hidden">
      {/* Background Animated Gradient Orbs */}
      <div className="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-tr from-[#264868]/50 via-[#C1A972]/20 to-[#153758]/80 rounded-full blur-[120px] pointer-events-none" />
      <div className="absolute bottom-10 right-10 w-[400px] h-[400px] bg-[#C1A972]/15 rounded-full blur-[100px] pointer-events-none" />

      {/* Futuristic Background Grid */}
      <div className="absolute inset-0 bg-[linear-gradient(to_right,#FEFEFE0a_1px,transparent_1px),linear-gradient(to_bottom,#FEFEFE0a_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none" />

      {/* Active Navigation Toast / Notification banner */}
      {activeLinkAlert && (
        <div className="max-w-2xl mx-auto mb-8 p-3 px-5 bg-[#264868]/90 border border-[#C1A972]/50 rounded-2xl flex items-center justify-between text-xs text-[#FEFEFE] animate-in slide-in-from-top-3 shadow-xl backdrop-blur-md">
          <div className="flex items-center gap-2">
            <CheckCircle2 className="w-4 h-4 text-[#C1A972]" />
            <span>Navigation Event Triggered: <strong className="text-white">{activeLinkAlert}</strong></span>
          </div>
          <span className="text-[10px] bg-[#153758] px-2 py-0.5 rounded-full font-mono text-[#C1A972]">
            octaviatechnologies.com
          </span>
        </div>
      )}

      {/* Hero Content Container */}
      <div className="max-w-6xl mx-auto relative z-10 text-center space-y-8">
        {/* Eyebrow Tag */}
        <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-[#C1A972]/30 text-xs sm:text-sm font-semibold text-[#C1A972] backdrop-blur-md">
          <Sparkles className="w-4 h-4 text-[#C1A972]" />
          <span>Next-Gen Enterprise Software & AI Innovation</span>
        </div>

        {/* Hero Headline */}
        <h1 className="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight max-w-4xl mx-auto leading-[1.1]">
          Engineered for <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#C1A972] via-[#FEFEFE] to-[#C1A972]">Scale, AI & Digital Speed</span>
        </h1>

        {/* Subhead */}
        <p className="text-base sm:text-xl text-[#93A3B2] max-w-2xl mx-auto font-normal leading-relaxed">
          Octavia Tech Solutions empowers global enterprises with custom SaaS platforms, AI systems, cloud architecture, and end-to-end digital transformation.
        </p>

        {/* Action Buttons */}
        <div className="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <button
            onClick={onOpenConsultation}
            className="w-full sm:w-auto px-8 py-4 bg-[#264868] hover:bg-[#153758] border border-[#C1A972]/40 text-white font-bold rounded-2xl shadow-xl shadow-black/40 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-base"
          >
            <span>Get a Free Consultation</span>
            <ArrowRight className="w-5 h-5 text-[#C1A972]" />
          </button>
          <a
            href="/services"
            onClick={(e) => {
              e.preventDefault();
              navigateTo('/services');
            }}
            className="w-full sm:w-auto px-8 py-4 bg-white/10 hover:bg-white/15 border border-white/15 text-white font-semibold rounded-2xl backdrop-blur-md transition-all text-base text-center"
          >
            Explore Services
          </a>
        </div>

        {/* Features Row */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 pt-16 max-w-5xl mx-auto text-left">
          <div className="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
            <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
              <Code2 className="w-5 h-5" />
            </div>
            <h3 className="font-bold text-white text-base">Custom Software</h3>
            <p className="text-xs text-[#93A3B2]">Web apps, mobile solutions, SaaS & healthcare platforms.</p>
          </div>

          <div className="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
            <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
              <Cpu className="w-5 h-5" />
            </div>
            <h3 className="font-bold text-white text-base">AI & Intelligence</h3>
            <p className="text-xs text-[#93A3B2]">GenAI bots, predictive analytics, MLOps & custom LLMs.</p>
          </div>

          <div className="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
            <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
              <ShieldCheck className="w-5 h-5" />
            </div>
            <h3 className="font-bold text-white text-base">Cloud & Security</h3>
            <p className="text-xs text-[#93A3B2]">DevOps, zero-trust cybersecurity, compliance & networking.</p>
          </div>

          <div className="p-5 rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md space-y-2">
            <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#C1A972] flex items-center justify-center">
              <Globe className="w-5 h-5" />
            </div>
            <h3 className="font-bold text-white text-base">Global Presence</h3>
            <p className="text-xs text-[#93A3B2]">Serving 20+ industries with round-the-clock delivery.</p>
          </div>
        </div>
      </div>
    </div>
  );
};
