import React from 'react';
import { ServiceIndustriesData } from '../../types/service';
import { ServiceIcon } from './IconHelper';
import { Building2, ArrowRight } from '@/site/icons';

interface ServiceIndustriesProps {
  data: ServiceIndustriesData;
}

export const ServiceIndustries: React.FC<ServiceIndustriesProps> = ({ data }) => {
  if (!data || !data.industries || data.industries.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Building2 className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Industries Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {data.industries.map((ind, idx) => (
            <div
              key={idx}
              className="p-7 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group"
            >
              <div>
                <div className="w-12 h-12 rounded-xl bg-[#264868]/10 border border-[#264868]/20 text-[#264868] flex items-center justify-center mb-5 group-hover:bg-[#264868] group-hover:text-white transition-all duration-300">
                  <ServiceIcon name={ind.iconName} className="w-6 h-6" />
                </div>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors">
                  {ind.name}
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed mb-4">
                  {ind.description}
                </p>

                <div className="p-3 rounded-xl bg-[#FEFEFE] border border-[#DDE3E9] text-xs space-y-1 mb-4">
                  <span className="font-bold text-[#264868] block text-[10px] uppercase">Core Use Case:</span>
                  <p className="text-[#153758]">{ind.useCase}</p>
                </div>
              </div>

              <div className="pt-3 border-t border-[#DDE3E9] flex items-center justify-between text-xs text-[#264868] font-bold">
                <span>Impact KPI:</span>
                <span className="text-[#153758]">{ind.kpi}</span>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
