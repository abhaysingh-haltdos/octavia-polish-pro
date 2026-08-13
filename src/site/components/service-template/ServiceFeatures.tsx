import React, { useState } from 'react';
import { ServiceFeaturesData } from '../../types/service';
import { ServiceIcon } from './IconHelper';
import { Sparkles, CheckCircle2, ArrowRight } from '@/site/icons';

interface ServiceFeaturesProps {
  data: ServiceFeaturesData;
}

export const ServiceFeatures: React.FC<ServiceFeaturesProps> = ({ data }) => {
  const [selectedCategory, setSelectedCategory] = useState<string>('All');

  const filteredFeatures = selectedCategory === 'All'
    ? data.features
    : data.features.filter((f) => f.category.toLowerCase() === selectedCategory.toLowerCase());

  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Sparkles className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Category Filter Pills if available */}
        {data.categories && data.categories.length > 0 && (
          <div className="flex flex-wrap items-center justify-center gap-2 mb-12">
            <button
              onClick={() => setSelectedCategory('All')}
              className={`px-4 py-2 rounded-full text-xs font-bold transition-all duration-200 ${
                selectedCategory === 'All'
                  ? 'bg-[#264868] text-white shadow-sm'
                  : 'bg-[#FEFEFE] text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'
              }`}
            >
              All Features
            </button>
            {data.categories.map((cat, idx) => (
              <button
                key={idx}
                onClick={() => setSelectedCategory(cat)}
                className={`px-4 py-2 rounded-full text-xs font-bold transition-all duration-200 ${
                  selectedCategory.toLowerCase() === cat.toLowerCase()
                    ? 'bg-[#264868] text-white shadow-sm'
                    : 'bg-[#FEFEFE] text-[#153758] hover:bg-[#F3F5F7] border border-[#DDE3E9]'
                }`}
              >
                {cat}
              </button>
            ))}
          </div>
        )}

        {/* Features Cards Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {filteredFeatures.map((feature) => (
            <div
              key={feature.id}
              className="p-7 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group"
            >
              <div>
                <div className="flex items-center justify-between mb-5">
                  <div className="w-12 h-12 rounded-xl bg-[#264868]/10 border border-[#264868]/20 text-[#264868] flex items-center justify-center group-hover:bg-[#264868] group-hover:text-white transition-all duration-300">
                    <ServiceIcon name={feature.iconName} className="w-6 h-6" />
                  </div>
                  {feature.badge && (
                    <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#C1A972]/20 text-[#153758] border border-[#C1A972]/30">
                      {feature.badge}
                    </span>
                  )}
                </div>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors">
                  {feature.title}
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed mb-6">
                  {feature.description}
                </p>

                {feature.points && feature.points.length > 0 && (
                  <ul className="space-y-2 mb-6">
                    {feature.points.map((pt, idx) => (
                      <li key={idx} className="flex items-start gap-2 text-xs text-[#153758]">
                        <CheckCircle2 className="w-3.5 h-3.5 text-[#264868] shrink-0 mt-0.5" />
                        <span>{pt}</span>
                      </li>
                    ))}
                  </ul>
                )}
              </div>

              <div className="p-3 rounded-xl bg-[#264868]/5 border border-[#264868]/10 text-xs text-[#153758] flex items-center justify-between">
                <span className="font-semibold text-[11px] text-[#264868]">Business Benefit:</span>
                <span className="font-bold text-[11px] text-[#153758]">{feature.businessBenefit || 'Accelerated ROI'}</span>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
