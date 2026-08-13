import React from 'react';
import { ServiceSolutionData } from '../../types/service';
import { ServiceIcon } from './IconHelper';
import { Check, Sparkles, ArrowRight, Layers, Cpu, ShieldCheck, Terminal, Zap } from '@/site/icons';

interface ServiceSolutionProps {
  data: ServiceSolutionData;
  onOpenConsultation: (topic?: string) => void;
}

export const ServiceSolution: React.FC<ServiceSolutionProps> = ({ data, onOpenConsultation }) => {
  return (
    <section className="py-20 md:py-24 bg-white text-[#153758] border-b border-[#DDE3E9] relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Header */}
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
          <p className="text-base sm:text-lg text-[#153758] max-w-2xl mx-auto">
            {data.description}
          </p>
        </div>

        {/* 4 Architectural Framework Pillars */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
          {data.architecturalPillars.map((pillar, idx) => (
            <div
              key={idx}
              className="p-6 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-300 hover:-translate-y-1 shadow-[0px_4px_20px_rgba(24,43,58,0.04)]"
            >
              <div className="flex items-center justify-between mb-4">
                <div className="w-10 h-10 rounded-xl bg-[#264868]/10 text-[#264868] flex items-center justify-center border border-[#264868]/20">
                  <ServiceIcon name={pillar.icon} className="w-5 h-5" />
                </div>
                <span className="text-xs font-mono font-bold text-[#264868]">Pillar 0{idx + 1}</span>
              </div>
              <h3 className="text-base font-bold text-[#153758] mb-2">{pillar.title}</h3>
              <p className="text-xs text-[#153758] leading-relaxed">{pillar.desc}</p>
            </div>
          ))}
        </div>

        {/* Alternating Solution Content & Illustration Blocks if available or detailed highlight cards */}
        {data.solutionBlocks && data.solutionBlocks.length > 0 ? (
          <div className="space-y-12 mb-16">
            {data.solutionBlocks.map((block, idx) => {
              const isEven = idx % 2 === 0;
              return (
                <div
                  key={idx}
                  className={`grid grid-cols-1 lg:grid-cols-12 gap-8 items-center p-8 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] shadow-sm`}
                >
                  <div className={`lg:col-span-7 space-y-4 ${isEven ? 'lg:order-1' : 'lg:order-2'}`}>
                    {block.badge && (
                      <span className="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded bg-[#264868]/10 text-[#264868] border border-[#264868]/20">
                        {block.badge}
                      </span>
                    )}
                    <h3 className="text-2xl font-bold text-[#153758]">{block.title}</h3>
                    <p className="text-sm sm:text-base text-[#153758] leading-relaxed">
                      {block.description}
                    </p>
                    <ul className="space-y-2 pt-2">
                      {block.points.map((pt, pIdx) => (
                        <li key={pIdx} className="flex items-start gap-2.5 text-xs sm:text-sm text-[#153758]">
                          <Check className="w-4 h-4 text-[#264868] shrink-0 mt-0.5" />
                          <span>{pt}</span>
                        </li>
                      ))}
                    </ul>
                  </div>

                  {/* Interactive Illustration Mockup Card */}
                  <div className={`lg:col-span-5 ${isEven ? 'lg:order-2' : 'lg:order-1'}`}>
                    <div className="p-6 rounded-[20px] bg-[#153758] text-white border border-[#264868] space-y-4 shadow-md font-mono text-xs">
                      <div className="flex items-center justify-between pb-3 border-b border-white/10 text-[11px]">
                        <span className="text-[#C1A972] font-bold flex items-center gap-1.5">
                          <Terminal className="w-3.5 h-3.5" />
                          octavia-solution-module.ts
                        </span>
                        <span className="text-[#264868] text-[10px] font-sans font-bold uppercase px-2 py-0.5 bg-[#264868]/20 rounded">
                          Validated Core
                        </span>
                      </div>
                      <div className="p-3.5 rounded-xl bg-[#0F2334] border border-white/10 space-y-2 text-[#93A3B2]">
                        <div className="text-[#93A3B2] text-[11px] leading-relaxed">
                          <span className="text-[#C1A972]">class</span> EnterpriseSolution <span className="text-[#C1A972]">implements</span> IOctaviaService {`{`}
                          <br />
                          &nbsp;&nbsp;<span className="text-[#264868]">executeEngine</span>() {`{`}
                          <br />
                          &nbsp;&nbsp;&nbsp;&nbsp;return <span className="text-[#264868]">'High Throughput SLA Verified'</span>;
                          <br />
                          &nbsp;&nbsp;{`}`}
                          <br />
                          {`}`}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              );
            })}
          </div>
        ) : (
          /* Detailed Solution Highlights Cards Grid */
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
            {data.highlights.map((item, idx) => (
              <div
                key={idx}
                className="p-6 rounded-[20px] bg-[#FEFEFE] border border-[#DDE3E9] hover:border-[#264868] transition-all duration-200 flex items-start gap-4 shadow-sm"
              >
                <div className="w-9 h-9 rounded-xl bg-[#264868]/10 border border-[#264868]/20 text-[#264868] flex items-center justify-center shrink-0 mt-0.5 font-bold">
                  <Check className="w-5 h-5" />
                </div>
                <div className="space-y-1">
                  <div className="flex items-center gap-2">
                    <h4 className="text-base font-bold text-[#153758]">{item.title}</h4>
                    <span className="text-[10px] font-semibold px-2 py-0.5 rounded bg-[#264868]/10 text-[#264868] border border-[#264868]/20 uppercase">
                      {item.tag}
                    </span>
                  </div>
                  <p className="text-xs sm:text-sm text-[#153758] leading-relaxed">{item.description}</p>
                </div>
              </div>
            ))}
          </div>
        )}

        {/* Action Banner */}
        <div className="p-8 rounded-[20px] bg-[#153758] text-white border border-[#264868] flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
          <div className="space-y-1 text-center md:text-left">
            <h4 className="text-lg font-bold text-white">Need a custom architecture assessment?</h4>
            <p className="text-xs sm:text-sm text-[#93A3B2]">Our senior enterprise solution architects will evaluate your technical requirements and deliver a detailed blueprint.</p>
          </div>
          <button
            onClick={() => onOpenConsultation('Architecture Assessment')}
            className="px-6 py-3.5 rounded-[12px] text-xs font-bold text-[#153758] bg-[#C1A972] hover:bg-[#C1A972] transition-all duration-200 shadow-md shrink-0 flex items-center gap-2"
          >
            <span>Request Architecture Audit</span>
            <ArrowRight className="w-4 h-4" />
          </button>
        </div>

      </div>
    </section>
  );
};
