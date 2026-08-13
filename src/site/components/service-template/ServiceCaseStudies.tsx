import React from 'react';
import { ServiceCaseStudiesData } from '../../types/service';
import { Sparkles, ArrowRight, Briefcase, TrendingUp } from '@/site/icons';

interface ServiceCaseStudiesProps {
  data: ServiceCaseStudiesData;
  onOpenConsultation: (topic?: string) => void;
}

export const ServiceCaseStudies: React.FC<ServiceCaseStudiesProps> = ({ data, onOpenConsultation }) => {
  if (!data || !data.caseStudies || data.caseStudies.length === 0) return null;

  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Briefcase className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Case Studies Cards Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {data.caseStudies.map((cs) => (
            <div
              key={cs.id}
              className="p-8 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group"
            >
              <div>
                {/* Industry Tag & KPI Highlight Badge */}
                <div className="flex items-center justify-between gap-2 pb-4 mb-4 border-b border-[#DDE3E9]">
                  <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#264868]/10 text-[#264868] border border-[#264868]/20">
                    {cs.industry}
                  </span>
                  <span className="text-xs font-extrabold text-[#264868] flex items-center gap-1">
                    <TrendingUp className="w-3.5 h-3.5 text-[#264868]" />
                    {cs.kpiHighlight}
                  </span>
                </div>

                <h3 className="text-xl font-bold text-[#153758] mb-3 group-hover:text-[#264868] transition-colors">
                  {cs.title}
                </h3>

                <div className="space-y-3 mb-6 text-xs sm:text-sm text-[#153758]">
                  <div>
                    <span className="font-bold text-[#153758] text-xs block mb-0.5">Challenge:</span>
                    <p className="line-clamp-2">{cs.challenge}</p>
                  </div>
                  <div>
                    <span className="font-bold text-[#264868] text-xs block mb-0.5">Octavia Solution:</span>
                    <p className="line-clamp-2">{cs.solution}</p>
                  </div>
                </div>

                {/* Tech Tags */}
                {cs.techTags && cs.techTags.length > 0 && (
                  <div className="flex flex-wrap items-center gap-1.5 mb-6">
                    {cs.techTags.map((tech, tIdx) => (
                      <span key={tIdx} className="text-[10px] font-mono text-[#153758] bg-white px-2 py-1 rounded border border-[#DDE3E9]">
                        {tech}
                      </span>
                    ))}
                  </div>
                )}
              </div>

              <div className="pt-4 border-t border-[#DDE3E9] space-y-3">
                <div className="p-3 rounded-xl bg-[#264868]/5 border border-[#264868]/10 text-xs text-[#153758]">
                  <span className="font-bold text-[#264868] block text-[10px] uppercase">Business Impact:</span>
                  <p className="font-medium text-[#153758]">{cs.businessImpact}</p>
                </div>

                <button
                  onClick={() => onOpenConsultation(`Case Study: ${cs.title}`)}
                  className="w-full py-2.5 rounded-xl text-xs font-bold text-[#264868] hover:bg-[#264868] hover:text-white transition-all duration-200 border border-[#264868]/20 flex items-center justify-center gap-2"
                >
                  <span>Request Full Case Study</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </button>
              </div>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
