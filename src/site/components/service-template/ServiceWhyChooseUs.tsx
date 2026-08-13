import React from 'react';
import { ServiceBenefitsData } from '../../types/service';
import { ServiceIcon } from './IconHelper';
import { Sparkles, CheckCircle2, Award } from '@/site/icons';

interface ServiceWhyChooseUsProps {
  data: ServiceBenefitsData;
}

export const ServiceWhyChooseUs: React.FC<ServiceWhyChooseUsProps> = ({ data }) => {
  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Award className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Benefits Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {data.benefits.map((benefit, idx) => (
            <div
              key={idx}
              className="p-7 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.1)] flex flex-col justify-between group"
            >
              <div>
                <div className="flex items-center justify-between mb-5">
                  <div className="w-12 h-12 rounded-xl bg-[#264868]/10 border border-[#264868]/20 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-white transition-all duration-300">
                    <ServiceIcon name={benefit.iconName} className="w-6 h-6" />
                  </div>

                  {benefit.metric && (
                    <div className="text-right">
                      <span className="text-xl font-extrabold text-[#264868] block">
                        {benefit.metric}
                      </span>
                      <span className="text-[10px] text-[#4A5A6B] uppercase tracking-wider font-semibold">
                        {benefit.metricLabel}
                      </span>
                    </div>
                  )}
                </div>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors">
                  {benefit.title}
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed">
                  {benefit.description}
                </p>
              </div>

              <div className="pt-4 mt-6 border-t border-[#DDE3E9] flex items-center gap-2 text-xs text-[#264868] font-bold">
                <CheckCircle2 className="w-4 h-4 text-[#264868]" />
                <span>Enterprise Value Driver</span>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
