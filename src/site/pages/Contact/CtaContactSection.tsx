import React from 'react';
import { ArrowRight, Mail, Phone, MapPin, Sparkles, ShieldCheck } from '@/site/icons';

export const CtaContactSection: React.FC<{
  onOpenConsultation: (topic: string) => void;
}> = ({ onOpenConsultation }) => {
  return (
    <section className="py-24 bg-gradient-to-br from-[#153758] via-[#264868] to-[#153758] text-white relative overflow-hidden border-t border-[#C1A972]/30" id="contact">
      {/* Glow Effects */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#C1A972]/15 rounded-full blur-[140px] pointer-events-none" />

      <div className="max-w-7xl mx-auto px-6 relative z-10">
        <div className="bg-white/5 border border-white/10 rounded-3xl p-8 sm:p-12 lg:p-16 backdrop-blur-xl shadow-2xl">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            {/* Left Content */}
            <div className="lg:col-span-7 space-y-6">
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#C1A972]/20 text-[#C1A972] text-xs font-bold uppercase tracking-wider border border-[#C1A972]/30">
                <Sparkles className="w-4 h-4 text-[#C1A972]" />
                <span>Next-Gen Enterprise Partnership</span>
              </div>

              <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                Let&apos;s Build the Future Together
              </h2>

              <p className="text-[#FEFEFE] text-base sm:text-lg leading-relaxed">
                Ready to transform your enterprise with AI, cloud, and modern software engineering? Our architects and domain engineers are standing by to discuss your next big initiative.
              </p>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div className="flex items-center gap-3 text-sm text-[#FEFEFE] font-medium">
                  <ShieldCheck className="w-5 h-5 text-[#C1A972]" />
                  <span>Free Initial Architecture Review</span>
                </div>
                <div className="flex items-center gap-3 text-sm text-[#FEFEFE] font-medium">
                  <ShieldCheck className="w-5 h-5 text-[#C1A972]" />
                  <span>NDA Protected Discussion</span>
                </div>
              </div>

              <div className="pt-4 flex flex-wrap gap-4">
                <button
                  onClick={() => onOpenConsultation('Free Consultation')}
                  className="px-8 py-4 bg-[#264868] hover:bg-[#153758] border border-[#C1A972]/40 text-white font-bold rounded-2xl transition-all shadow-xl shadow-black/30 flex items-center gap-2 group"
                >
                  <span>Schedule Free Consultation</span>
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform text-[#C1A972]" />
                </button>
              </div>
            </div>

            {/* Right Contact Details Card */}
            <div className="lg:col-span-5 bg-white/5 border border-white/15 rounded-2xl p-8 space-y-6">
              <h3 className="text-xl font-bold text-white border-b border-white/10 pb-4">
                Direct Contact
              </h3>

              <ul className="space-y-4 text-sm">
                <li className="flex items-start gap-3 text-[#FEFEFE]">
                  <Mail className="w-5 h-5 text-[#C1A972] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-xs text-[#93A3B2] block font-semibold uppercase">Email Us</span>
                    <a href="mailto:info@octaviatechnologies.com" className="hover:text-[#C1A972] transition-colors font-semibold">
                      info@octaviatechnologies.com
                    </a>
                  </div>
                </li>

                <li className="flex items-start gap-3 text-[#FEFEFE]">
                  <Phone className="w-5 h-5 text-[#C1A972] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-xs text-[#93A3B2] block font-semibold uppercase">Call Us</span>
                    <div className="font-semibold space-y-0.5">
                      <a href="tel:+16504548668" className="hover:text-[#C1A972] transition-colors block">+1 650-454-8668</a>
                      <a href="tel:+18312468804" className="hover:text-[#C1A972] transition-colors block">+1 831-246-8804</a>
                    </div>
                  </div>
                </li>

                <li className="flex items-start gap-3 text-[#FEFEFE]">
                  <MapPin className="w-5 h-5 text-[#C1A972] shrink-0 mt-0.5" />
                  <div>
                    <span className="text-xs text-[#93A3B2] block font-semibold uppercase">USA Headquarters</span>
                    <span className="text-xs leading-relaxed text-[#93A3B2] block">
                      6100 Channingway Blvd, Columbus, OH 43232, USA
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
