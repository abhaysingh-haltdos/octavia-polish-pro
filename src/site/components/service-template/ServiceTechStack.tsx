import React, { useState } from 'react';
import { ServiceTechStackData } from '../../types/service';
import { Cpu } from '@/site/icons';
import { ServiceIcon } from './IconHelper';

interface ServiceTechStackProps {
  data: ServiceTechStackData;
}

export const ServiceTechStack: React.FC<ServiceTechStackProps> = ({ data }) => {
  const [activeTab, setActiveTab] = useState<number>(0);

  if (!data || !data.categories || data.categories.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Cpu className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Category Selector Tabs */}
        <div className="flex flex-wrap items-center justify-center gap-2 mb-12">
          {data.categories.map((cat, idx) => (
            <button
              key={idx}
              onClick={() => setActiveTab(idx)}
              className={`px-5 py-2.5 rounded-full text-xs font-bold transition-all duration-200 ${
                activeTab === idx
                  ? 'bg-[#264868] text-white shadow-sm'
                  : 'bg-[#FEFEFE] text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'
              }`}
            >
              {cat.category}
            </button>
          ))}
        </div>

        {/* Active Tech Category Cards Grid */}
        <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
          {data.categories[activeTab]?.technologies.map((tech, idx) => (
            <div
              key={idx}
              className="p-5 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-200 text-center flex flex-col items-center justify-center gap-2 group hover:-translate-y-1 shadow-2xs hover:shadow-md"
            >
              <div className="w-11 h-11 rounded-xl bg-white border border-[#DDE3E9] flex items-center justify-center text-[#264868] group-hover:bg-[#264868] group-hover:text-white transition-all shadow-2xs">
                <ServiceIcon name={tech.icon || tech.name} className="w-5 h-5" />
              </div>
              <span className="text-sm font-bold text-[#153758] group-hover:text-[#264868] transition-colors">
                {tech.name}
              </span>
              {tech.level && (
                <span className="text-[10px] text-[#4A5A6B] font-semibold uppercase">
                  {tech.level}
                </span>
              )}
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
