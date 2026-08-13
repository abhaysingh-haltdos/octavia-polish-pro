import React from 'react';
import { Rocket, ShieldCheck, TrendingUp, Landmark, ArrowUpRight } from '@/site/icons';

export const SolutionsSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
  onLinkClick?: (href: string, label: string) => void;
}> = ({ onOpenConsultation, onLinkClick }) => {
  const slugMap: Record<string, string> = {
    Startups: 'startup-solutions',
    Enterprises: 'enterprise-solutions',
    SMEs: 'business-solutions',
    Government: 'enterprise-solutions',
  };

  const solutions = [
    {
      title: 'Startups',
      icon: Rocket,
      tag: 'Scale Fast',
      desc: 'Move fast with MVPs, scalable architecture, and growth-focused digital strategies. We help you go from idea to market in record time.',
      benefits: ['Rapid Prototyping (4-6 weeks)', 'Investor-Ready Architecture', 'Agile Product Sprints'],
      featured: false,
    },
    {
      title: 'Enterprises',
      icon: ShieldCheck,
      tag: 'Mission Critical',
      desc: 'Mission-critical systems, global deployments, and complex integrations. Enterprise-grade solutions with the security and compliance you demand.',
      benefits: ['SOC 2 & ISO 27001 Security', 'Legacy Core Modernization', '24/7 Dedicated Support'],
      featured: true, // Highlights with the deep azure brand fill
    },
    {
      title: 'SMEs',
      icon: TrendingUp,
      tag: 'High Efficiency',
      desc: 'Cost-effective technology solutions that deliver enterprise capabilities without the enterprise price tag. Smart technology for growing businesses.',
      benefits: ['Automated Workflow Tools', 'Cloud Cost Optimization', 'Flexible Engagement Models'],
      featured: false,
    },
    {
      title: 'Government',
      icon: Landmark,
      tag: 'Public Sector',
      desc: 'Secure, compliant technology solutions designed for public sector requirements. Digital governance, citizen services, and smart infrastructure.',
      benefits: ['FedRAMP & NIST Compliance', 'Citizen Self-Service Portals', 'High-Scale Interoperability'],
      featured: false,
    },
  ];

  return (
    <section className="py-24 bg-[#0F2334] text-white border-t border-[#153758]/30" id="solutions">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#B4C1CD]">
            Tailored Engagement
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            Solutions for Every Business
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            Whether you&apos;re a startup scaling fast or a government body modernizing operations, we have the expertise to deliver.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {solutions.map((sol, idx) => {
            const Icon = sol.icon;
            return (
              <div
                key={idx}
                className={`rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 relative group border ${
                  sol.featured
                    ? 'bg-gradient-to-b from-[#264868] to-[#153758] border-[#264868] shadow-2xl shadow-[#153758]/50 scale-105'
                    : 'bg-white/5 border-white/10 hover:border-[#264868]/60 hover:bg-white/10'
                }`}
              >
                <div>
                  <div className="flex items-center justify-between mb-6">
                    <div
                      className={`w-12 h-12 rounded-2xl flex items-center justify-center font-bold ${
                        sol.featured ? 'bg-white text-[#B4C1CD]' : 'bg-[#264868]/20 text-[#B4C1CD]'
                      }`}
                    >
                      <Icon className="w-6 h-6" />
                    </div>
                    <span
                      className={`text-[11px] font-extrabold uppercase px-3 py-1 rounded-full ${
                        sol.featured ? 'bg-white/20 text-white' : 'bg-[#153758]/40 text-[#D9C48F]'
                      }`}
                    >
                      {sol.tag}
                    </span>
                  </div>

                  <h3 className="text-2xl font-bold text-white mb-3">{sol.title}</h3>
                  <p className="text-sm text-[#B4C1CD] leading-relaxed mb-6">{sol.desc}</p>

                  <ul className="space-y-2 mb-8 text-xs text-[#B4C1CD] font-medium">
                    {sol.benefits.map((b, i) => (
                      <li key={i} className="flex items-center gap-2">
                        <span className="w-1.5 h-1.5 rounded-full bg-[#264868]" />
                        <span>{b}</span>
                      </li>
                    ))}
                  </ul>
                </div>

                <button
                  onClick={() => {
                    const slug = slugMap[sol.title];
                    if (slug && onLinkClick) {
                      onLinkClick(`/solutions/${slug}`, sol.title);
                    } else if (onLinkClick) {
                      onLinkClick('/solutions', sol.title);
                    } else {
                      onOpenConsultation(`Solution: ${sol.title}`);
                    }
                  }}
                  className={`w-full py-3.5 px-4 rounded-xl font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-2 transition-all ${
                    sol.featured
                      ? 'bg-white text-[#264868] hover:bg-[#F3F5F7] shadow-md'
                      : 'bg-white/10 text-white hover:bg-[#264868] hover:text-white'
                  }`}
                >
                  <span>Get Started</span>
                  <ArrowUpRight className="w-4 h-4" />
                </button>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};
