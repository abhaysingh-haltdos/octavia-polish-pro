import React from 'react';
import { ServiceOverviewData } from '../../types/service';
import { ServiceIcon } from './IconHelper';
import { Sparkles, Layers } from '@/site/icons';

interface ServiceOverviewProps {
  data: ServiceOverviewData;
}

export const ServiceOverview: React.FC<ServiceOverviewProps> = ({ data }) => {
  return (
    <section id="service-overview" className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Sparkles className="w-3.5 h-3.5 text-[#264868]" />
            <span className="text-xs font-semibold tracking-wide text-[#264868] uppercase">
              {data.badge}
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-[#153758] tracking-tight leading-tight">
            {data.heading}
          </h2>
        </div>

        {/* Narrative Box */}
        <div className="max-w-4xl mx-auto mb-16 p-8 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] text-[#153758] space-y-4 shadow-[0px_4px_20px_rgba(24,43,58,0.04)]">
          <p className="text-lg text-[#153758] leading-relaxed font-semibold">
            {data.leadParagraph}
          </p>
          <p className="text-base text-[#153758] leading-relaxed">
            {data.secondaryParagraph}
          </p>
        </div>

        {/* 4 Core Pillars Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {data.pillars.map((pillar, idx) => (
            <div
              key={idx}
              className="group p-6 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 hover:-translate-y-1 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.1)] flex flex-col justify-between"
            >
              <div>
                <div className="w-12 h-12 rounded-xl bg-[#264868]/10 border border-[#264868]/20 text-[#264868] flex items-center justify-center mb-5 group-hover:scale-105 group-hover:bg-[#264868] group-hover:text-white transition-all duration-300">
                  <ServiceIcon name={pillar.iconName} className="w-6 h-6" />
                </div>
                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors">
                  {pillar.title}
                </h3>
                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed">
                  {pillar.description}
                </p>
              </div>
              <div className="pt-4 mt-6 border-t border-[#DDE3E9] flex items-center text-[11px] text-[#264868] font-bold">
                <span>Core Capability 0{idx + 1}</span>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
