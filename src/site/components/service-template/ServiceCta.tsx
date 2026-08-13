import React from 'react';
import { ServiceCtaData } from '../../types/service';
import { ArrowRight, ShieldCheck, Sparkles, CheckCircle2 } from '@/site/icons';

interface ServiceCtaProps {
  data: ServiceCtaData;
  onOpenConsultation: (topic?: string) => void;
}

export const ServiceCta: React.FC<ServiceCtaProps> = ({ data, onOpenConsultation }) => {
  return (
    <section className="py-20 md:py-28 bg-[#153758] text-white relative overflow-hidden">
      {/* Subtle Background Glow Accent */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-[#264868]/40 blur-[130px] rounded-full pointer-events-none" />
      <div className="absolute top-0 right-0 w-[450px] h-[350px] bg-[#C1A972]/15 blur-[120px] rounded-full pointer-events-none" />

      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        
        {/* Badge */}
        <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 backdrop-blur-md mb-6">
          <Sparkles className="w-4 h-4 text-[#D9C48F]" />
          <span className="text-xs font-bold tracking-wide text-[#D9C48F] uppercase">
            {data.badge || 'Enterprise Engineering Partner'}
          </span>
        </div>

        {/* Dynamic Headline */}
        <h2 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight mb-6">
          {data.heading}
        </h2>

        {/* Description */}
        <p className="text-base sm:text-xl text-[#B4C1CD] max-w-2xl mx-auto leading-relaxed mb-10">
          {data.description}
        </p>

        {/* Primary & Secondary Buttons */}
        <div className="flex flex-wrap items-center justify-center gap-4 mb-12">
          <button
            onClick={() => onOpenConsultation(data.primaryCtaText)}
            className="inline-flex items-center gap-2.5 px-8 py-4 rounded-[12px] text-base font-bold text-[#153758] bg-[#C1A972] hover:bg-[#C1A972] transition-all duration-200 shadow-[0_4px_20px_rgba(209,181,121,0.3)] hover:-translate-y-0.5"
          >
            <span>{data.primaryCtaText}</span>
            <ArrowRight className="w-5 h-5" />
          </button>

          <button
            onClick={() => onOpenConsultation(data.secondaryCtaText)}
            className="inline-flex items-center gap-2 px-8 py-4 rounded-[12px] text-base font-semibold text-white bg-white/10 hover:bg-white/15 border border-white/20 transition-all duration-200 hover:-translate-y-0.5"
          >
            <span>{data.secondaryCtaText}</span>
          </button>
        </div>

        {/* Trust Indicators */}
        {data.trustNotes && data.trustNotes.length > 0 && (
          <div className="pt-8 border-t border-white/10 flex flex-wrap items-center justify-center gap-6">
            {data.trustNotes.map((note, idx) => (
              <div key={idx} className="flex items-center gap-2 text-xs sm:text-sm text-[#B4C1CD] font-medium">
                <CheckCircle2 className="w-4 h-4 text-[#D9C48F] shrink-0" />
                <span>{note}</span>
              </div>
            ))}
          </div>
        )}

      </div>
    </section>
  );
};
