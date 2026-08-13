import React from 'react';
import { Award, Building2, CheckCircle2, Globe2 } from '@/site/icons';

export const StatsSection: React.FC = () => {
  const stats = [
    {
      number: '500+',
      label: 'Projects Delivered',
      desc: 'Across North America, Europe, Asia & Africa',
      icon: CheckCircle2,
    },
    {
      number: '98%',
      label: 'Client Satisfaction',
      desc: 'Long-term enterprise partnerships',
      icon: Award,
    },
    {
      number: '20+',
      label: 'Industries Transformed',
      desc: 'Deep domain-specific software engineering',
      icon: Building2,
    },
    {
      number: '15+',
      label: 'Global Offices',
      desc: 'Follow-the-sun 24/7 delivery capability',
      icon: Globe2,
    },
  ];

  return (
    <section className="py-16 bg-[#153758] text-white border-b border-[#264868]/40">
      <div className="max-w-7xl mx-auto px-6">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
          {stats.map((stat, idx) => {
            const Icon = stat.icon;
            return (
              <div
                key={idx}
                className="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972]/60 hover:bg-white/[0.08] transition-all duration-300 group"
              >
                <div className="w-10 h-10 rounded-xl bg-[#C1A972]/20 text-[#D9C48F] flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#264868] group-hover:text-white transition-all">
                  <Icon className="w-5 h-5" />
                </div>
                <div className="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-1 group-hover:text-[#D9C48F] transition-colors">
                  {stat.number}
                </div>
                <div className="text-sm font-bold text-[#FEFEFE] mb-1">
                  {stat.label}
                </div>
                <div className="text-xs text-[#B4C1CD] leading-snug">
                  {stat.desc}
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
};
