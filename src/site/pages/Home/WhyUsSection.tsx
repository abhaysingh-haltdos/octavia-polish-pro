import React from 'react';
import {
  Lightbulb,
  Globe2,
  Headphones,
  ShieldAlert,
  Award,
  CheckCircle,
  Briefcase,
  Zap,
} from '@/site/icons';

export const WhyUsSection: React.FC = () => {
  const pillars = [
    {
      title: 'Innovation-First DNA',
      icon: Lightbulb,
      desc: 'Our Innovation Lab invests 15% of revenue into R&D — prototyping with AI, blockchain, and quantum-ready architectures so you are always two steps ahead.',
    },
    {
      title: 'Global Delivery, Local Understanding',
      icon: Globe2,
      desc: '20+ countries. Follow-the-sun coverage. Local domain experts who understand your market, regulations, and culture. Progress never stops.',
    },
    {
      title: '24/7 Mission-Critical Support',
      icon: Headphones,
      desc: '15-minute SLA response. 99.99% uptime guarantee. AI-driven monitoring that detects issues before they become outages.',
    },
    {
      title: 'Security Without Compromise',
      icon: ShieldAlert,
      desc: 'SOC 2 Type II. ISO 27001. Zero-trust by default. Passed audits for Fortune 500 banks, government agencies, and healthcare enterprises.',
    },
    {
      title: '500+ Certified Engineers',
      icon: Award,
      desc: 'Certified experts in AWS, Azure, GCP, Kubernetes, Cisco, and AI frameworks. Top 1% talent hired through rigorous engineering benchmarks.',
    },
    {
      title: 'Proven Track Record',
      icon: CheckCircle,
      desc: '98% client retention rate over 10+ years. 500+ successful enterprise deployments completed on time and on budget.',
    },
    {
      title: 'Flexible Engagement Models',
      icon: Briefcase,
      desc: 'Dedicated development teams, time & materials, or fixed-price project scope. Tailored to match your financial and operational preferences.',
    },
    {
      title: 'Rapid Time-to-Value',
      icon: Zap,
      desc: 'Agile 2-week sprint cycles with live demos. Go from concept to production-ready software in weeks, not years.',
    },
  ];

  return (
    <section className="py-24 bg-white text-[#153758]" id="why-us">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-16 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#264868]">
            The Octavia Advantage
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-[#153758] tracking-tight">
            Why Leading Enterprises Choose Us
          </h2>
          <p className="text-[#5C6B7A] text-base sm:text-lg">
            We don&apos;t just deliver projects — we engineer outcomes. Here&apos;s what makes us the technology partner that enterprises bet their future on.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {pillars.map((pillar, idx) => {
            const Icon = pillar.icon;
            return (
              <div
                key={idx}
                className="p-8 rounded-3xl bg-[#F3F5F7] border border-[#DDE3E9]/80 hover:border-[#264868]/40 hover:shadow-xl hover:shadow-[#264868]/5 transition-all duration-300 group flex flex-col justify-between"
              >
                <div>
                  <div className="w-12 h-12 rounded-2xl bg-[#EDF0F3] text-[#264868] flex items-center justify-center mb-6 group-hover:bg-[#264868] group-hover:text-white transition-all shadow-md shadow-[#264868]/10">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors">
                    {pillar.title}
                  </h3>
                  <p className="text-sm text-[#5C6B7A] leading-relaxed">
                    {pillar.desc}
                  </p>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};
