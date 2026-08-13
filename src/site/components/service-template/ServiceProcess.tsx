import React from 'react';
import { ServiceProcessData } from '../../types/service';
import { Sparkles, Check, ArrowRight, ShieldCheck, Clock } from '@/site/icons';

interface ServiceProcessProps {
  data: ServiceProcessData;
}

export const ServiceProcess: React.FC<ServiceProcessProps> = ({ data }) => {
  return (
    <section className="py-20 md:py-24 bg-[#FEFEFE] text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto space-y-4 mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#264868]/10 border border-[#264868]/20">
            <Clock className="w-3.5 h-3.5 text-[#264868]" />
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

        {/* Process Timeline Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {data.steps.map((step, idx) => (
            <div
              key={idx}
              className="p-7 rounded-[20px] bg-white border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 shadow-[0px_4px_20px_rgba(24,43,58,0.04)] hover:shadow-[0px_10px_30px_rgba(32,70,105,0.08)] flex flex-col justify-between group relative"
            >
              <div>
                {/* Step Badge Header */}
                <div className="flex items-center justify-between mb-5">
                  <span className="w-10 h-10 rounded-xl bg-[#153758] text-[#C1A972] font-mono font-bold text-sm flex items-center justify-center border border-[#264868]">
                    {step.stepNumber}
                  </span>
                  <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#264868]/10 text-[#264868] border border-[#264868]/20">
                    {step.phase}
                  </span>
                </div>

                <h3 className="text-lg font-bold text-[#153758] mb-2 group-hover:text-[#264868] transition-colors">
                  {step.title}
                </h3>

                <p className="text-xs sm:text-sm text-[#153758] leading-relaxed mb-6">
                  {step.description}
                </p>

                {/* Deliverables */}
                {step.deliverables && step.deliverables.length > 0 && (
                  <div className="space-y-2 mb-4">
                    <span className="text-[11px] font-bold text-[#153758] block uppercase tracking-wider">Key Deliverables:</span>
                    <ul className="space-y-1.5">
                      {step.deliverables.map((deliv, dIdx) => (
                        <li key={dIdx} className="flex items-start gap-2 text-xs text-[#153758]">
                          <Check className="w-3.5 h-3.5 text-[#264868] shrink-0 mt-0.5" />
                          <span>{deliv}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                )}
              </div>

              {step.duration && (
                <div className="pt-4 border-t border-[#DDE3E9] flex items-center justify-between text-xs text-[#4A5A6B]">
                  <span>Timeline:</span>
                  <span className="font-bold text-[#153758]">{step.duration}</span>
                </div>
              )}
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};
