import React from 'react';
import { ServiceRelatedData } from '../../types/service';
import { Layers, ArrowRight } from '@/site/icons';

interface ServiceRelatedProps {
  data: ServiceRelatedData;
}

export const ServiceRelated: React.FC<ServiceRelatedProps> = ({ data }) => {
  if (!data || !data.links || data.links.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Layers className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Links Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {data.links.map((link, idx) => (
            <a
              key={idx}
              href={link.href}
              className="p-6 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group"
            >
              <div>
                <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#264868]/10 text-[#264868] border border-[#264868]/20 mb-3 inline-block">
                  {link.category}
                </span>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors flex items-center justify-between">
                  <span>{link.title}</span>
                  <ArrowRight className="w-4 h-4 text-[#264868] group-hover:translate-x-1 transition-transform" />
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed">
                  {link.description}
                </p>
              </div>

              <div className="pt-4 mt-4 border-t border-[#DDE3E9] flex items-center gap-1.5 text-xs text-[#264868] font-bold">
                <span>Explore Capabilities</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </div>
            </a>
          ))}
        </div>

      </div>
    </section>
  );
};
