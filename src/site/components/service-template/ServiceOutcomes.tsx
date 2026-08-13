import React from 'react';
import { ServiceOutcomesData } from '../../types/service';
import { TrendingUp, ArrowUpRight, ArrowDownRight, Award } from '@/site/icons';

interface ServiceOutcomesProps {
  data: ServiceOutcomesData;
}

export const ServiceOutcomes: React.FC<ServiceOutcomesProps> = ({ data }) => {
  if (!data || !data.outcomes || data.outcomes.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <TrendingUp className="w-3.5 h-3.5 text-[#264868]" />
            <span className="text-xs font-semibold tracking-wide text-[#264868] uppercase">
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

        {/* Measurable KPI Counters Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
          {data.outcomes.map((item, idx) => (
            <div
              key={idx}
              className="p-6 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 text-center flex flex-col justify-between group shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] hover:-translate-y-1"
            >
              <div>
                <div className="inline-flex items-center justify-center p-2 rounded-xl bg-[#264868]/10 text-[#264868] mb-4 group-hover:bg-[#264868] group-hover:text-white transition-colors">
                  {item.trend === 'up' ? (
                    <ArrowUpRight className="w-5 h-5" />
                  ) : (
                    <ArrowDownRight className="w-5 h-5" />
                  )}
                </div>

                <div className="text-3xl sm:text-4xl font-extrabold text-[#264868] tracking-tight mb-2">
                  {item.metric}
                </div>

                <div className="text-sm font-bold text-[#153758] mb-2">
                  {item.label}
                </div>
              </div>

              <p className="text-xs text-[#153758] leading-relaxed pt-3 border-t border-[#DDE3E9]">
                {item.description}
              </p>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
