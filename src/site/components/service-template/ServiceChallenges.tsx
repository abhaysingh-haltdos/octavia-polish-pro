import React from 'react';
import { ServiceChallengesData } from '../../types/service';
import { AlertTriangle } from '@/site/icons';

interface ServiceChallengesProps {
  data: ServiceChallengesData;
}

export const ServiceChallenges: React.FC<ServiceChallengesProps> = ({ data }) => {
  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <AlertTriangle className="w-3.5 h-3.5 text-[#153758]" />
            <span className="text-xs font-semibold tracking-wide text-[#153758] uppercase">
              {data.badge}
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-[#153758] tracking-tight leading-tight">
            {data.heading}
          </h2>
          <p className="text-base sm:text-lg text-[#153758] max-w-2xl mx-auto">
            {data.subheading}
          </p>
        </div>

        {/* 4-6 Problem Challenge Cards Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {data.challenges.map((item) => (
            <div
              key={item.id}
              className="p-7 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(186,26,26,0.08)] flex flex-col justify-between group"
            >
              <div>
                <div className="flex items-center justify-between pb-4 mb-4 border-b border-[#DDE3E9]">
                  <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#C1A972]/15 text-[#153758] border border-[#C1A972]/15">
                    {item.category}
                  </span>
                  <AlertTriangle className="w-4 h-4 text-[#153758] group-hover:scale-110 transition-transform" />
                </div>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#153758] transition-colors">
                  {item.issue}
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed mb-6">
                  {item.description}
                </p>
              </div>

              <div className="p-3.5 rounded-xl bg-[#C1A972]/60 border border-[#C1A972]/15 text-xs text-[#153758] space-y-1">
                <span className="font-bold text-[#153758] block uppercase tracking-wider text-[10px]">
                  Business Impact:
                </span>
                <p className="leading-snug text-[#153758]">{item.impact}</p>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
